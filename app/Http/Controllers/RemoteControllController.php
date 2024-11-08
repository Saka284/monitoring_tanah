<?php

namespace App\Http\Controllers;

use App\Models\remoteControll;
use Illuminate\Http\Request;

class RemoteControllController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('remoteControll');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(remoteControll $remoteControll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(remoteControll $remoteControll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, remoteControll $remoteControll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(remoteControll $remoteControll)
    {
        //
    }
}
