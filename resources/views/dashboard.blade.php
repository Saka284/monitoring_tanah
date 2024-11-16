<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1 p-6 max-sm:w-full">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Weather Card -->
            <div class="inline-flex flex-col bg-blue-100 p-4 rounded-lg shadow space-y-4 w-full h-auto ">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex flex-col space-y-1">
                        <p class="text-gray-600 text-xs md:text-sm" id="currentTime"></p>
                        <p class="text-gray-400 text-xs md:text-sm">Temperature</p>
                        <p class="text-4xl md:text-6xl font-bold">
                            {{ ($sensor->suhu_udara ?? '-') . ' °C' }}
                        </p>
                    </div>
                    <img alt="Weather Icon" class="w-26 h-24 sm:w-24 sm:h-24 md:w-44 md:h-32"
                        src="/assets/img/vector_matahariawan.png" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div class="bg-white p-2 rounded-lg shadow flex items-center space-x-2">
                        <i class="fas fa-tint text-blue-500 text-xl md:text-2xl"></i>
                        <div class="flex-grow flex justify-between">
                            <p class="text-gray-600 text-sm md:text-base">Humidity</p>
                            <p class="text-lg md:text-xl font-bold">
                                {{ ($sensor->kelembapan_udara ?? '-') . ' %' }}
                            </p>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow flex items-center space-x-2">
                        <i class="fas fa-sun text-yellow-500 text-xl md:text-2xl"></i>
                        <div class="flex-grow flex justify-between">
                            <p class="text-gray-600 text-sm md:text-base">Light</p>
                            <p class="text-lg md:text-xl font-bold">
                                {{ ($sensor->intensitas_cahaya ?? '-') . ' lx' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parameter Section -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-bold">Parameter Tanah</h3>
                    <a class="text-slate-600 text-sm" id="latestData">latest data</a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- pH Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">
                                {{ ($sensor->ph_tanah ?? '-') . ' pH' }}
                            </p>
                            <p class="text-gray-600">pH</p>
                        </div>
                        <img alt="pH Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/water.png" />
                    </div>

                    <!-- Temperature Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-red-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">
                                {{ ($sensor->suhu_tanah ?? '-') . ' °C' }}
                            </p>
                            <p class="text-gray-600">Temperature</p>
                        </div>
                        <img alt="Temperature Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/thermometer.png" />
                    </div>

                    <!-- TDS Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-green-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">
                                {{ ($sensor->tds_tanah ?? '-') . ' ppm' }}
                            </p>
                            <p class="text-gray-600">TDS</p>
                        </div>
                        <img alt="TDS Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/bill.png" />
                    </div>

                    <!-- Volume Nutrien Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-yellow-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">
                                {{ ($sensor->volume_nutrient ?? '-') . ' m³' }}
                            </p>
                            <p class="text-gray-600">Volume Nutrien</p>
                        </div>
                        <img alt="Volume Nutrien Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/vitamins.png" />
                    </div>
                </div>
            </div>
        </div>

        <!-- New Row with Two Single Column Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- pH Tanah Card -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-4">pH Tanah</h3>
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <input type="date" id="phTanahDate" class="border rounded p-1 text-[11px] md:text-sm">
                    <select id="phTanahHour" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Hour</option>
                    </select>
                    <select id="phTanahMinute" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Minute</option>
                    </select>
                </div>
                <div id="phTanahChart"></div>
            </div>

            <!-- Suhu Tanah Card -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-4">Suhu Tanah</h3>
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <input type="date" id="suhuTanahDate" class="border rounded p-1 text-[11px] md:text-sm">
                    <select id="suhuTanahHour" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Hour</option>
                    </select>
                    <select id="suhuTanahMinute" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Minute</option>
                    </select>
                </div>
                <div id="suhuTanahChart"></div>
            </div>

            <!-- TDS Tanah Card -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-4">TDS Tanah</h3>
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <input type="date" id="tdsTanahDate" class="border rounded p-1 text-[11px] md:text-sm">
                    <select id="tdsTanahHour" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Hour</option>
                    </select>
                    <select id="tdsTanahMinute" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Minute</option>
                    </select>
                </div>
                <div id="tdsTanahChart"></div>
            </div>

            <!-- Volume Nutrient Card -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold mb-4">Volume Nutrient</h3>
                <div class="grid grid-cols-3 gap-2 mb-4">
                    <input type="date" id="volumeNutrientDate" class="border rounded p-1 text-[11px] md:text-sm">
                    <select id="volumeNutrientHour" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Hour</option>
                    </select>
                    <select id="volumeNutrientMinute" class="border rounded p-1 text-[11px] md:text-sm">
                        <option value="">Select Minute</option>
                    </select>
                </div>
                <div id="volumeNutrientChart"></div>
            </div>
        </div>
    </div>
</x-app-layout>


