<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SensorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sensor = Sensor::orderby('date', 'desc')->first();
        return view('dashboard', compact('sensor'));
    }

    public function store(Request $request)
    {
        try {
            // Validasi data yang masuk
            $validator = Validator::make($request->all(), [
                'date' => 'nullable|date_format:Y-m-d',
                'suhu_udara' => 'required|numeric|between:-10,100',
                'kelembapan_udara' => 'required|numeric|between:0,100',
                'intensitas_cahaya' => 'required|numeric|min:0',
                'suhu_tanah' => 'required|numeric|between:-10,100',
                'ph_tanah' => 'required|numeric|between:0,14',
                'tds_tanah' => 'required|numeric|between:0,1000',
                'volume_nutrient' => 'required|numeric|between:0,100',
            ]);

            // Cek jika validasi gagal
            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            // Simpan data ke database
            $sensorData = Sensor::create([
                'suhu_udara' => $request->suhu_udara,
                'kelembapan_udara' => $request->kelembapan_udara,
                'intensitas_cahaya' => $request->intensitas_cahaya,
                'suhu_tanah' => $request->suhu_tanah,
                'ph_tanah' => $request->ph_tanah,
                'tds_tanah' => $request->tds_tanah,
                'volume_nutrient' => $request->volume_nutrient,
                'date' => Carbon::now(),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'data' => $sensorData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function chart($type, Request $request)
    {
        try {
            // Validate sensor type
            $validTypes = [
                'ph_tanah',
                'suhu_tanah',
                'tds_tanah',
                'volume_nutrient',
            ];

            if (!in_array($type, $validTypes)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid sensor type'
                ], 400);
            }

            // Validate and parse date
            $date = Carbon::parse($request->input('date', now()));
            $hour = $request->input('hour');
            $minute = $request->input('minute');

            // Check if date-level data exists
            $dateDataExists = DB::table('sensors')
                ->whereDate('date', $date)
                ->exists();

            if (!$dateDataExists) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No data found for the selected date'
                ], 404);
            }

            // Build query based on hour and minute inputs
            $query = DB::table('sensors')->whereDate('date', $date);

            if ($hour !== null) {
                // Check if hour-level data exists
                $hourDataExists = $query->clone()
                    ->whereRaw('HOUR(date) = ?', [$hour])
                    ->exists();

                if (!$hourDataExists) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No data found for the selected hour'
                    ], 404);
                }

                $query->whereRaw('HOUR(date) = ?', [$hour]);

                if ($minute !== null) {
                    // Calculate minute range (0-10, 11-20, etc.)
                    $minuteStart = floor($minute / 10) * 10;
                    $minuteEnd = $minuteStart + 9;

                    // Check if minute-level data exists
                    $minuteDataExists = $query->clone()
                        ->whereRaw('MINUTE(date) BETWEEN ? AND ?', [$minuteStart, $minuteEnd])
                        ->exists();

                    if (!$minuteDataExists) {
                        return response()->json([
                            'status' => 'error',
                            'message' => 'No data found for the selected minute range'
                        ], 404);
                    }

                    $query->whereRaw('MINUTE(date) BETWEEN ? AND ?', [$minuteStart, $minuteEnd])
                        ->select([
                            DB::raw('MINUTE(date) as minute'),
                            DB::raw("$type as value")
                        ])
                        ->orderBy('minute');
                } else {
                    $query->select([
                        DB::raw('MINUTE(date) as minute'),
                        DB::raw("ROUND(AVG($type), 2) as average")
                    ])
                        ->groupBy(DB::raw('MINUTE(date)'))
                        ->orderBy('minute');
                }
            } else {
                $query->select([
                    DB::raw('HOUR(date) as hour'),
                    DB::raw("ROUND(AVG($type), 2) as average")
                ])
                    ->groupBy(DB::raw('HOUR(date)'))
                    ->orderBy('hour');
            }

            $data = $query->get();

            // Format response data based on query type
            if ($hour !== null) {
                if ($minute !== null) {
                    $labels = $data->pluck('minute')->map(function ($min) use ($hour) {
                        return sprintf("%02d:%02d", $hour, $min);
                    })->toArray();
                    $values = $data->pluck('value')->toArray();
                } else {
                    $labels = $data->pluck('minute')->map(function ($min) use ($hour) {
                        return sprintf("%02d:%02d", $hour, $min);
                    })->toArray();
                    $values = $data->pluck('average')->toArray();
                }
            } else {
                $labels = $data->pluck('hour')->map(function ($hour) {
                    return sprintf("%02d:00", $hour);
                })->toArray();
                $values = $data->pluck('average')->toArray();
            }

            return response()->json([
                'status' => 'success',
                'date' => $date->format('d-m-Y'),
                'hour' => $hour,
                'minute_range' => $minute ? sprintf("%02d-%02d", floor($minute / 10) * 10, floor($minute / 10) * 10 + 9) : null,
                'labels' => $labels,
                'values' => $values,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Chart data error for type '$type': " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengambil data grafik',
            ], 500);
        }
    }
}