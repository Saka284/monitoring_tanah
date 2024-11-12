//Untuk Waktu Realtime di halaman utama
function updateTime() {
    // Ambil elemen dengan ID 'currentTime'
    const timeElement = document.getElementById('currentTime');

    // Dapatkan waktu saat ini dengan timezone Asia/Jakarta
    const now = new Date();
    // Format waktu menjadi dd-mm-yyyy HH:MM:SS
    const options = {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false,
        timeZone: 'Asia/Jakarta'
    };
    const formattedTime = now.toLocaleString('en-GB', options).replace(',', ''); // mengganti koma dengan spasi

    // Perbarui konten elemen dengan waktu baru
    timeElement.textContent = formattedTime;
}
// Update waktu setiap detik
setInterval(updateTime, 1000);
// Panggil fungsi updateTime sekali untuk menampilkan waktu saat halaman dimuat
updateTime();

// fungsi membuat chart
// Declare chart variables in global scope
let phTanahChart;
let suhuTanahChart;
let tdsTanahChart;
let volumeNutrientChart;

function updatePhTanahChart(date, hour = null, minute = null) {
    const chartContainer = document.querySelector("#phTanahChart");
    const params = { date: date };
    if (hour !== null) params.hour = hour;
    if (minute !== null) params.minute = minute;

    $.ajax({
        url: '/chart/ph_tanah',
        method: 'GET',
        data: params,
        success: function (response) {
            if (response.status === 'success' && response.values && response.values.length > 0) {
                chartContainer.innerHTML = '';

                if (!phTanahChart) {
                    const options = {
                        series: [{
                            name: 'pH Tanah',
                            data: response.values
                        }],
                        chart: {
                            height: 300,
                            type: 'line',
                            zoom: { enabled: true },
                            toolbar: { show: true }
                        },
                        dataLabels: { enabled: false },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            }
                        },
                        xaxis: {
                            categories: response.labels,
                            title: {
                                text: hour !== null ? 'Minute' : 'Hour'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'pH'
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val ? `${val} pH` : '0 pH';
                                }
                            }
                        }
                    };
                    phTanahChart = new ApexCharts(chartContainer, options);
                    phTanahChart.render();
                } else {
                    phTanahChart.updateOptions({
                        xaxis: {
                            categories: response.labels,
                            title: { text: hour !== null ? 'Minute' : 'Hour' }
                        }
                    });
                    phTanahChart.updateSeries([{
                        name: 'pH Tanah',
                        data: response.values
                    }]);
                }
            } else {
                if (phTanahChart) {
                    phTanahChart.destroy();
                    phTanahChart = null;
                }
                chartContainer.innerHTML = `<div class="alert alert-warning">No data available for the selected time period</div>`;
            }
        },
        error: function (xhr) {
            if (phTanahChart) {
                phTanahChart.destroy();
                phTanahChart = null;
            }
            console.error('Chart error:', xhr);
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while fetching data';
            chartContainer.innerHTML = `<div class="alert alert-danger">${errorMessage}</div>`;
        }
    });
}

function updateSuhuTanahChart(date, hour = null, minute = null) {
    const chartContainer = document.querySelector("#suhuTanahChart");
    const params = { date: date };
    if (hour !== null) params.hour = hour;
    if (minute !== null) params.minute = minute;

    $.ajax({
        url: '/chart/suhu_tanah',
        method: 'GET',
        data: params,
        success: function (response) {
            if (response.status === 'success' && response.values && response.values.length > 0) {
                chartContainer.innerHTML = '';

                if (!suhuTanahChart) {
                    const options = {
                        series: [{
                            name: 'Suhu Tanah',
                            data: response.values
                        }],
                        chart: {
                            height: 300,
                            type: 'line',
                            zoom: { enabled: true },
                            toolbar: { show: true }
                        },
                        dataLabels: { enabled: false },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            }
                        },
                        xaxis: {
                            categories: response.labels,
                            title: {
                                text: hour !== null ? 'Minute' : 'Hour'
                            }
                        },
                        yaxis: {
                            title: {
                                text: '°C'
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val ? `${val} °C` : '0 °C';
                                }
                            }
                        }
                    };
                    suhuTanahChart = new ApexCharts(chartContainer, options);
                    suhuTanahChart.render();
                } else {
                    suhuTanahChart.updateOptions({
                        xaxis: {
                            categories: response.labels,
                            title: { text: hour !== null ? 'Minute' : 'Hour' }
                        }
                    });
                    suhuTanahChart.updateSeries([{
                        name: 'Suhu Tanah',
                        data: response.values
                    }]);
                }
            } else {
                if (suhuTanahChart) {
                    suhuTanahChart.destroy();
                    suhuTanahChart = null;
                }
                chartContainer.innerHTML = `<div class="alert alert-warning">No data available for the selected time period</div>`;
            }
        },
        error: function (xhr) {
            if (suhuTanahChart) {
                suhuTanahChart.destroy();
                suhuTanahChart = null;
            }
            console.error('Chart error:', xhr);
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while fetching data';
            chartContainer.innerHTML = `<div class="alert alert-danger">${errorMessage}</div>`;
        }
    });
}

function updateTdsTanahChart(date, hour = null, minute = null) {
    const chartContainer = document.querySelector("#tdsTanahChart");
    const params = { date: date };
    if (hour !== null) params.hour = hour;
    if (minute !== null) params.minute = minute;

    $.ajax({
        url: '/chart/tds_tanah',
        method: 'GET',
        data: params,
        success: function (response) {
            if (response.status === 'success' && response.values && response.values.length > 0) {
                chartContainer.innerHTML = '';

                if (!tdsTanahChart) {
                    const options = {
                        series: [{
                            name: 'TDS Tanah',
                            data: response.values
                        }],
                        chart: {
                            height: 300,
                            type: 'line',
                            zoom: { enabled: true },
                            toolbar: { show: true }
                        },
                        dataLabels: { enabled: false },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            }
                        },
                        xaxis: {
                            categories: response.labels,
                            title: {
                                text: hour !== null ? 'Minute' : 'Hour'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'ppm'
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val ? `${val} ppm` : '0 ppm';
                                }
                            }
                        }
                    };
                    tdsTanahChart = new ApexCharts(chartContainer, options);
                    tdsTanahChart.render();
                } else {
                    tdsTanahChart.updateOptions({
                        xaxis: {
                            categories: response.labels,
                            title: { text: hour !== null ? 'Minute' : 'Hour' }
                        }
                    });
                    tdsTanahChart.updateSeries([{
                        name: 'TDS Tanah',
                        data: response.values
                    }]);
                }
            } else {
                if (tdsTanahChart) {
                    tdsTanahChart.destroy();
                    tdsTanahChart = null;
                }
                chartContainer.innerHTML = `<div class="alert alert-warning">No data available for the selected time period</div>`;
            }
        },
        error: function (xhr) {
            if (tdsTanahChart) {
                tdsTanahChart.destroy();
                tdsTanahChart = null;
            }
            console.error('Chart error:', xhr);
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while fetching data';
            chartContainer.innerHTML = `<div class="alert alert-danger">${errorMessage}</div>`;
        }
    });
}

function updateVolumeNutrientChart(date, hour = null, minute = null) {
    const chartContainer = document.querySelector("#volumeNutrientChart");
    const params = { date: date };
    if (hour !== null) params.hour = hour;
    if (minute !== null) params.minute = minute;

    $.ajax({
        url: '/chart/volume_nutrient',
        method: 'GET',
        data: params,
        success: function (response) {
            if (response.status === 'success' && response.values && response.values.length > 0) {
                chartContainer.innerHTML = '';

                if (!volumeNutrientChart) {
                    const options = {
                        series: [{
                            name: 'Volume Nutrient',
                            data: response.values
                        }],
                        chart: {
                            height: 300,
                            type: 'line',
                            zoom: { enabled: true },
                            toolbar: { show: true }
                        },
                        dataLabels: { enabled: false },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        title: {
                            text: '',
                            align: 'left'
                        },
                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            }
                        },
                        xaxis: {
                            categories: response.labels,
                            title: {
                                text: hour !== null ? 'Minute' : 'Hour'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'L'
                            }
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val ? `${val} L` : '0 L';
                                }
                            }
                        }
                    };
                    volumeNutrientChart = new ApexCharts(chartContainer, options);
                    volumeNutrientChart.render();
                } else {
                    volumeNutrientChart.updateOptions({
                        xaxis: {
                            categories: response.labels,
                            title: { text: hour !== null ? 'Minute' : 'Hour' }
                        }
                    });
                    volumeNutrientChart.updateSeries([{
                        name: 'Volume Nutrient',
                        data: response.values
                    }]);
                }
            } else {
                if (volumeNutrientChart) {
                    volumeNutrientChart.destroy();
                    volumeNutrientChart = null;
                }
                chartContainer.innerHTML = `<div class="alert alert-warning">No data available for the selected time period</div>`;
            }
        },
        error: function (xhr) {
            if (volumeNutrientChart) {
                volumeNutrientChart.destroy();
                volumeNutrientChart = null;
            }
            console.error('Chart error:', xhr);
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while fetching data';
            chartContainer.innerHTML = `<div class="alert alert-danger">${errorMessage}</div>`;
        }
    });
}

function updateDashboardChart(type) {
    const date = document.getElementById(`${type}Date`).value;
    const hour = document.getElementById(`${type}Hour`).value;
    const minute = document.getElementById(`${type}Minute`).value;

    // Reset minute select if hour is cleared
    if (!hour) {
        document.getElementById(`${type}Minute`).value = '';
    }

    switch (type) {
        case 'phTanah':
            updatePhTanahChart(date, hour || null, minute || null);
            break;
        case 'suhuTanah':
            updateSuhuTanahChart(date, hour || null, minute || null);
            break;
        case 'tdsTanah':
            updateTdsTanahChart(date, hour || null, minute || null);
            break;
        case 'volumeNutrient':
            updateVolumeNutrientChart(date, hour || null, minute || null);
            break;
    }
}

// Function to initialize all new sensor charts
function initializeNewSensorCharts() {
    // Initialize date inputs with today's date
    const today = new Date().toISOString().split('T')[0];
    ['phTanah', 'suhuTanah', 'tdsTanah', 'volumeNutrient'].forEach(type => {
        const dateElement = document.getElementById(`${type}Date`);
        if (dateElement) {
            dateElement.value = today;
        }

        // Initialize hour and minute selects
        populateHourSelect(`${type}Hour`);
        populateMinuteSelect(`${type}Minute`);

        // Add event listeners for dashboard filters
        document.getElementById(`${type}Date`)?.addEventListener('change', function () {
            updateDashboardChart(type);
        });

        document.getElementById(`${type}Hour`)?.addEventListener('change', function () {
            updateDashboardChart(type);
        });

        document.getElementById(`${type}Minute`)?.addEventListener('change', function () {
            updateDashboardChart(type);
        });
    });

    // Initial update of charts with today's date
    updatePhTanahChart(today);
    updateSuhuTanahChart(today);
    updateTdsTanahChart(today);
    updateVolumeNutrientChart(today);

    // Set up auto-refresh for today's data (continued)
    setInterval(() => {
        const currentDate = new Date().toISOString().split('T')[0];

        // Get selected hours and minutes for each sensor
        const sensors = ['phTanah', 'suhuTanah', 'tdsTanah', 'volumeNutrient'];

        sensors.forEach(sensor => {
            const date = document.getElementById(`${sensor}Date`)?.value;
            const hour = document.getElementById(`${sensor}Hour`)?.value;
            const minute = document.getElementById(`${sensor}Minute`)?.value;

            // Only update if viewing today's data
            if (date === currentDate) {
                switch (sensor) {
                    case 'phTanah':
                        updatePhTanahChart(currentDate, hour || null, minute || null);
                        break;
                    case 'suhuTanah':
                        updateSuhuTanahChart(currentDate, hour || null, minute || null);
                        break;
                    case 'tdsTanah':
                        updateTdsTanahChart(currentDate, hour || null, minute || null);
                        break;
                    case 'volumeNutrient':
                        updateVolumeNutrientChart(currentDate, hour || null, minute || null);
                        break;
                }
            }
        });
    }, 5 * 60 * 1000); // Update every 5 minutes
}

// Initialize new sensor charts when document is ready
document.addEventListener('DOMContentLoaded', function () {
    initializeNewSensorCharts();
});

//fungsi untuk mendeteksi waktu terakhir yang terekam dari sensor
function latestDataTime() {
    $.ajax({
        url: '/getLatestMonitoring',
        method: 'GET',
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            const now = moment().format('DD-MM-YYYY HH:mm:ss');
            $('#lastCheck').text(`${now}`);
            $('#latestData').text(data.data.date);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}
setInterval(() => {
    latestDataTime();
}, 2000)