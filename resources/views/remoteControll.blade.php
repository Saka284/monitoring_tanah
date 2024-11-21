<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Controller') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 mx-4 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Kolom pertama -->
                <div class="col-span-1 space-y-4">
                    <!-- Card 1 - Lampu -->
                    <div
                        class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-52 flex flex-col space-y-4 p-4 lg:p-6">
                        <div class="flex justify-between pt-2">
                            <img src="/assets/img/lampu.png" alt="gambar" class="w-10 h-10 lg:w-14 lg:h-14">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden" onchange="toggleDevice('Lampu', this)">
                                    <div class="toggle-path bg-gray-200 w-10 h-5 rounded-full shadow-inner"></div>
                                    <div
                                        class="toggle-circle absolute w-5 h-5 bg-gray-500 rounded-full shadow inset-y-0 left-0 transition-transform duration-200 ease-in-out">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col flex-grow justify-end">
                            <h1 class="text-sm lg:text-lg font-semibold">Lampu</h1>
                            <p class="text-xs">Ruang mayat</p>
                        </div>
                    </div>

                    <!-- Card 4 - Kipas Angin -->
                    <div
                        class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-52 flex flex-col space-y-4 p-4 lg:p-6">
                        <div class="flex justify-between pt-2">
                            <img src="/assets/img/fan.png" alt="gambar" class="w-10 h-10 lg:w-14 lg:h-14">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden" onchange="toggleDevice('Kipas Angin', this)">
                                    <div class="toggle-path bg-gray-200 w-10 h-5 rounded-full shadow-inner"></div>
                                    <div
                                        class="toggle-circle absolute w-5 h-5 bg-gray-500 rounded-full shadow inset-y-0 left-0 transition-transform duration-200 ease-in-out">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col flex-grow justify-end">
                            <h1 class="text-sm lg:text-lg font-semibold">Lampu</h1>
                            <p class="text-xs">Ruang mayat</p>
                        </div>
                    </div>
                </div>

                <!-- Column 2 - Air & Air Conditioner -->
                <div class="col-span-1 space-y-4">
                    <!-- Card 2 - Air -->
                    <div
                        class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-52 flex flex-col space-y-4 p-4 lg:p-6">
                        <div class="flex justify-between pt-2">
                            <img src="/assets/img/faucet.png" alt="gambar" class="w-10 h-10 lg:w-14 lg:h-14">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden" onchange="toggleDevice('Air', this)">
                                    <div class="toggle-path bg-gray-200 w-10 h-5 rounded-full shadow-inner"></div>
                                    <div
                                        class="toggle-circle absolute w-5 h-5 bg-gray-500 rounded-full shadow inset-y-0 left-0 transition-transform duration-200 ease-in-out">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col flex-grow justify-end">
                            <h1 class="text-sm lg:text-lg font-semibold">Air</h1>
                            <p class="text-xs">Kamar mandi lt.2 </p>
                        </div>
                    </div>

                    <!-- Card 5 - Air Conditioner -->
                    <div
                        class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-52 flex flex-col space-y-4 p-4 lg:p-6">
                        <div class="flex justify-between pt-2">
                            <img src="/assets/img/air-conditioner.png" alt="gambar" class="w-10 h-10 lg:w-14 lg:h-14">
                            <label class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="checkbox" class="hidden"
                                        onchange="toggleDevice('Air-Conditioner', this)">
                                    <div class="toggle-path bg-gray-200 w-10 h-5 rounded-full shadow-inner"></div>
                                    <div
                                        class="toggle-circle absolute w-5 h-5 bg-gray-500 rounded-full shadow inset-y-0 left-0 transition-transform duration-200 ease-in-out">
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="flex flex-col flex-grow justify-end">
                            <h1 class="text-sm lg:text-lg font-semibold">Air</h1>
                            <p class="text-xs">Kamar</p>
                        </div>
                    </div>
                </div>

                <!-- Kolom ketiga -->
                <div class="col-span-2 lg:col-span-1 space-y-4">
                    <!-- Card 3 -->
                    <div class="bg-white overflow-hidden rounded-lg shadow-sm  sm:rounded-lg h-[133px]">
                        <div class="bg-green-600 p-3">
                            <h1 class="text-white font-semibold">Threshold Temperature</h1>
                        </div>
                        <div class="p-4">
                            <!-- Konten card disini -->
                            <input type="text" id="slider_treshold" name="temperature_treshold" value="" />
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-[133px]">
                        <div class="bg-green-600 p-3">
                            <h1 class="text-white font-semibold">Threshold Humidity</h1>
                        </div>
                        <div class="p-4">
                            <!-- Konten card disini -->
                            <input type="text" id="slider_humidity" name="humidity_treshold" value="" />
                        </div>
                    </div>
                    <!-- Card 7 -->
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg sm:rounded-lg h-[133px]">
                        <div class="bg-green-600 p-3">
                            <h1 class="text-white font-semibold">Threshold TDS</h1>
                        </div>
                        <div class="p-4">
                            <!-- Konten card disini -->
                            <input type="text" id="slider_tds" name="tds_treshold" value="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function toggleDevice(deviceName, checkbox) {
        const status = checkbox.checked ? 'on' : 'off';
    }
</script>

<!-- Tailwind CSS classes for the switch -->
<style>
    /* Tailwind-based toggle */
    input:checked+.toggle-path {
        background-color: #9afa62;
    }

    input:checked+.toggle-path+.toggle-circle {
        transform: translateX(1.27rem);
        background-color: #fdf9f9;
    }
</style>
<script>
    $("#slider_treshold").ionRangeSlider({
    skin: "flat",
    min: 0,
    max: 100,
    from: 0,
    to: 100,
    type: 'double',
    prefix: "",
    grid: true,
    grid_num: 10
});

$("#slider_humidity").ionRangeSlider({
    skin: "flat",
    min: 0,
    max: 1000,
    from: 0,
    to: 1000,
    type: 'double',
    prefix: "",
    grid: true,
    grid_num: 10
});

$("#slider_tds").ionRangeSlider({
    skin: "flat",
    min: 0,
    max: 1000,
    from: 0,
    to: 1000,
    type: 'double',
    prefix: "",
    grid: true,
    grid_num: 10
});
</script>
