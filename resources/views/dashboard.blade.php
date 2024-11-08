<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex-1 p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Weather Card -->
            <div class="inline-flex flex-col bg-blue-50 p-4 rounded-lg shadow space-y-4 w-full h-auto relative">
                <div class="flex items-center justify-between mb-8">
                    <div class="flex flex-col space-y-1">
                        <p class="text-gray-600 text-xs md:text-sm">03/01/2025 00:28:04</p>
                        <p class="text-gray-400 text-xs md:text-sm">Temperature</p>
                        <p class="text-4xl md:text-6xl font-bold">28°C</p>
                    </div>
                    <img alt="Weather Icon" class="w-16 h-16 sm:w-24 sm:h-24 md:w-44 md:h-32"
                        src="/assets/img/vector_matahariawan.png" />
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 relative">
                    <div class="bg-white p-2 rounded-lg shadow flex items-center space-x-2">
                        <i class="fas fa-tint text-blue-500 text-xl md:text-2xl"></i>
                        <div class="flex-grow flex justify-between">
                            <p class="text-gray-600 text-sm md:text-base">Humidity</p>
                            <p class="text-lg md:text-xl font-bold">28%</p>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow flex items-center space-x-2">
                        <i class="fas fa-sun text-yellow-500 text-xl md:text-2xl"></i>
                        <div class="flex-grow flex justify-between">
                            <p class="text-gray-600 text-sm md:text-base">Light</p>
                            <p class="text-lg md:text-xl font-bold">1028lx</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Parameter Section -->
            <div class="space-y-4">
                <h3 class="text-xl font-bold">Parameter Tanah</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <!-- pH Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-blue-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">7 pH</p>
                            <p class="text-gray-600">pH</p>
                        </div>
                        <img alt="pH Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/water.png" />
                    </div>

                    <!-- Temperature Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-red-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">28 °C</p>
                            <p class="text-gray-600">Temperature</p>
                        </div>
                        <img alt="Temperature Icon" class="w-12 md:w-16 h-12 md:h-16"
                            src="/assets/img/thermometer.png" />
                    </div>

                    <!-- TDS Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-green-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">1201 ppm</p>
                            <p class="text-gray-600">TDS</p>
                        </div>
                        <img alt="TDS Icon" class="w-12 md:w-16 h-12 md:h-16" src="/assets/img/bill.png" />
                    </div>

                    <!-- Volume Nutrien Card -->
                    <div
                        class="bg-white p-4 rounded-lg shadow border-l-4 border-yellow-500 flex items-center justify-between">
                        <div>
                            <p class="text-xl font-bold">65 m³</p>
                            <p class="text-gray-600">Volume Nutrien</p>
                        </div>
                        <img alt="Volume Nutrien Icon" class="w-12 md:w-16 h-12 md:h-16"
                            src="/assets/img/vitamins.png" />
                    </div>
                </div>
            </div>
        </div>

        <!-- New Row with Two Single Column Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <!-- Card 1 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold">Card 1</h3>
                <p class="text-gray-600">iki engko gawe chart yo!!!</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-4 rounded-lg shadow">
                <h3 class="text-lg font-bold">Card 2</h3>
                <p class="text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non rem minima amet voluptatibus quaerat aperiam architecto! Esse necessitatibus laboriosam, ipsum dolor officiis quidem quasi non est animi odio voluptates et culpa iste a maiores dolorum aspernatur quod magnam earum quas suscipit? Neque eos atque molestias distinctio laboriosam est numquam amet alias beatae in minima nemo inventore, hic possimus cupiditate error, velit mollitia sapiente explicabo omnis perferendis culpa, adipisci porro. Nobis rerum enim eveniet asperiores, repellendus repudiandae sed dicta possimus impedit.</p>
            </div>
        </div>
    </div>
</x-app-layout>
