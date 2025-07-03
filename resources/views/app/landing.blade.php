<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>TV Dashboard - Company Info</title>
    {{-- //@vite('resources/css/app.css') --}}

    <style>
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }

        .marquee {
            animation: marquee 20s linear infinite;
        }

        @keyframes fadeInOut {

            0%,
            45% {
                opacity: 1;
            }

            50%,
            95% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .slider-item {
            animation: fadeInOut 6s infinite;
        }

        .slider-item:nth-child(2) {
            animation-delay: 3s;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <!-- Header -->
    <header class="bg-white shadow-md px-8 py-6">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl font-bold text-gray-800">PT. NAMA PERUSAHAAN</h1>
            <div class="text-right">
                <div class="text-2xl font-semibold text-gray-700" id="current-day"></div>
                <div class="text-xl text-gray-600" id="current-date"></div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-8 grid grid-cols-12 gap-8">

        <div class="col-span-6 flex flex-col gap-8">
            <!-- Video Section -->
            <section class=" bg-white rounded-lg shadow-lg overflow-hidden h-full ">
                <div class="relative h-full">
                    <!-- YouTube Video Placeholder -->
                    {{-- <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                        <div class="text-center">
                            <div class="w-32 h-32 bg-gray-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-16 h-16 text-white" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                            <p class="text-2xl text-gray-600">Video Perusahaan</p>
                            <p class="text-lg text-gray-500">YouTube Player</p>
                        </div>
                    </div> --}}
                    <!-- Uncomment and replace with actual YouTube embed -->
                    <iframe class="w-full h-full"
                        src="https://www.youtube.com/embed/tSsWpY7uwpA?autoplay=1&loop=1&controls=1&showinfo=1&rel=0"
                        frameborder="0" allowfullscreen></iframe>
                </div>
            </section>

            <!-- Form Section (Below Video) -->
            <section class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Form Input Data</h3>
                <div class="grid grid-cols-4 gap-6">
                    <!-- Form A -->
                    <div class="space-y-3">
                        <label class="block text-xl font-semibold text-gray-700">A</label>
                        <input type="text"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Input A">
                    </div>

                    <!-- Form B -->
                    <div class="space-y-3">
                        <label class="block text-xl font-semibold text-gray-700">B</label>
                        <input type="text"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Input B">
                    </div>

                    <!-- Form C -->
                    <div class="space-y-3">
                        <label class="block text-xl font-semibold text-gray-700">C</label>
                        <input type="text"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Input C">
                    </div>

                    <!-- Form D -->
                    <div class="space-y-3">
                        <label class="block text-xl font-semibold text-gray-700">D</label>
                        <input type="text"
                            class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Input D">
                    </div>
                </div>
            </section>
        </div>


        <!-- Cluster Section -->
        <section class="bg-white col-span-2 space-y-6">
            <h1 class="text-3xl font-bold text-gray-800 p-3">Cluster A</h1>
            <div class="bg-blue-300 white rounded-lg shadow-lg mt-5 p-6">

                <!-- Slider Container -->
                <div class="relative h-70 overflow-hidden">
                    <!-- Slide 1 -->
                    <div class="slider-item absolute inset-0 flex flex-col items-center opacity-0">
                        <div class="w-32 h-32 bg-gray-300 rounded-lg mb-4 overflow-hidden">
                            <img src="https://via.placeholder.com/128x128/4A5568/FFFFFF?text=Foto+1" alt="Employee 1"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="text-center space-y-2">
                            <h3 class="text-xl font-semibold text-gray-800">John Doe</h3>
                            <p class="text-lg text-gray-600">Manager</p>
                            <p class="text-base text-gray-500">ID: EMP001</p>
                            <p class="text-base text-gray-500">Dept: IT</p>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="slider-item absolute inset-0 flex flex-col items-center opacity-0">
                        <div class="w-32 h-32 bg-gray-300 rounded-lg mb-4 overflow-hidden">
                            <img src="https://via.placeholder.com/128x128/2D3748/FFFFFF?text=Foto+2" alt="Employee 2"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="text-center space-y-2">
                            <h3 class="text-xl font-semibold text-gray-800">Jane Smith</h3>
                            <p class="text-lg text-gray-600">Developer</p>
                            <p class="text-base text-gray-500">ID: EMP002</p>
                            <p class="text-base text-gray-500">Dept: IT</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Second Cluster -->
            <div class="bg-blue-300 rounded-lg shadow-lg p-6">
                <div class="relative h-70 overflow-hidden">
                    <!-- Slide 1 -->
                    <div class="slider-item absolute inset-0 flex flex-col items-center opacity-0">
                        <div class="w-32 h-32 bg-gray-300 rounded-lg mb-4 overflow-hidden">
                            <img src="https://via.placeholder.com/128x128/1A202C/FFFFFF?text=Foto+3" alt="Employee 3"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="text-center space-y-2">
                            <h3 class="text-xl font-semibold text-gray-800">Mike Johnson</h3>
                            <p class="text-lg text-gray-600">Designer</p>
                            <p class="text-base text-gray-500">ID: EMP003</p>
                            <p class="text-base text-gray-500">Dept: Design</p>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="slider-item absolute inset-0 flex flex-col items-center opacity-0">
                        <div class="w-32 h-32 bg-gray-300 rounded-lg mb-4 overflow-hidden">
                            <img src="https://via.placeholder.com/128x128/2A4A5C/FFFFFF?text=Foto+4" alt="Employee 4"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="text-center space-y-2">
                            <h3 class="text-xl font-semibold text-gray-800">Sarah Wilson</h3>
                            <p class="text-lg text-gray-600">Analyst</p>
                            <p class="text-base text-gray-500">ID: EMP004</p>
                            <p class="text-base text-gray-500">Dept: Finance</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Data Summary -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="text-center space-y-1">
                    <p class="text-lg font-semibold text-gray-700">Total Data: 100</p>
                    <p class="text-lg font-semibold text-gray-700">Active: 95</p>
                </div>
            </div>
        </section>

        <!-- Table Section -->
        <section class="col-span-4 bg-white rounded-lg shadow-lg p-6">
            <!-- Search -->
            <div class="mb-6">
                <input type="text" placeholder="Search..."
                    class="w-full px-4 py-3 text-lg border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Table Label -->
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Data Karyawan</h3>

            <!-- Table -->
            <div class="overflow-y-auto max-h-96">
                <table class="w-full">
                    <thead class="bg-gray-50 sticky top-0">
                        <tr>
                            <th class="px-4 py-3 text-left text-lg font-semibold text-gray-700">Cluster</th>
                            <th class="px-4 py-3 text-left text-lg font-semibold text-gray-700">Custody</th>
                            <th class="px-4 py-3 text-left text-lg font-semibold text-gray-700">Driver</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-base text-gray-600">HR</td>
                            <td class="px-4 py-3 text-base text-gray-800">Alice Brown</td>
                            <td class="px-4 py-3 text-base text-gray-800">Pabuno buno</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-base text-gray-600">Marketing</td>
                            <td class="px-4 py-3 text-base text-gray-800">Batta'na</td>
                            <td class="px-4 py-3 text-base text-gray-800">Pabuno buno</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-base text-gray-600">Sales</td>
                            <td class="px-4 py-3 text-base text-gray-800">Carol White</td>
                            <td class="px-4 py-3 text-base text-gray-800">Sampurna</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-base text-gray-600">Operations</td>
                            <td class="px-4 py-3 text-base text-gray-800">David Blue</td>
                            <td class="px-4 py-3 text-base text-gray-800">Surya 16</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 text-base text-gray-600">Finance</td>
                            <td class="px-4 py-3 text-base text-gray-800">Eva Yellow</td>
                            <td class="px-4 py-3 text-base text-gray-800">Classmild</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>


    </main>

    <!-- Footer with Marquee -->
    <footer class="bg-gray-800 text-white py-4 overflow-hidden">
        <div class="flex items-center h-12">
            <div class="text-2xl font-semibold px-8">Pengumuman:</div>
            <div class="flex-1 relative overflow-hidden">
                <div class="marquee whitespace-nowrap text-xl">
                    Selamat datang di PT. Nama Perusahaan - Rapat umum akan dilaksanakan hari Senin pukul 09.00 WIB -
                    Jangan lupa absen kehadiran - Terima kasih atas kerjasama yang baik
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Update date and time
        function updateDateTime() {
            const now = new Date();
            const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];

            const dayName = days[now.getDay()];
            const date = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();

            document.getElementById('current-day').textContent = dayName;
            document.getElementById('current-date').textContent = `${date} ${month} ${year}`;
        }

        // Search functionality
        function initializeSearch() {
            const searchInput = document.querySelector('input[placeholder="Search..."]');
            const tableRows = document.querySelectorAll('tbody tr');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                tableRows.forEach(row => {
                    const name = row.querySelector('td:first-child').textContent.toLowerCase();
                    const dept = row.querySelector('td:last-child').textContent.toLowerCase();

                    if (name.includes(searchTerm) || dept.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            });
        }

        // Auto-refresh data (simulate)
        function autoRefresh() {
            // Simulate data refresh every 30 seconds
            setInterval(() => {
                console.log('Data refreshed at:', new Date().toLocaleTimeString());
                // Add your data refresh logic here
            }, 30000);
        }

        // Initialize everything
        document.addEventListener('DOMContentLoaded', function() {
            updateDateTime();
            initializeSearch();
            autoRefresh();

            // Update time every minute
            setInterval(updateDateTime, 600000);
        });
    </script>
</body>

</html>
