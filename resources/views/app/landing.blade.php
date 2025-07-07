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
            transition: opacity 1s ease-in-out;
        }

        .slider-item.active {
            opacity: 1 !important;
        }

        .h-70 {
            height: 280px;
        }

        .cluster-controls {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
        }

        .cluster-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .cluster-dot.active {
            background-color: white;
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
                {{-- <h3 class="text-2xl font-bold text-gray-800 mb-4">Label</h3> --}}
                <div class="grid grid-cols-4 gap-6">
                    @foreach ($label as $v)
                        <div href="#"
                            class="block max-w-sm p-4 bg-green-500 border border-gray-200 rounded-lg shadow-sm hover:bg-green-400">
                            <h5 class=" text-white text-2xl">{{ $v->nama }}</h5>
                            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                            <h6 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ floatval($v->nilai) . '%' }}
                            </h6>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>


        <!-- Cluster Section -->
        {{-- <section class="bg-white col-span-2 space-y-6 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-gray-800 p-3">Data Cluster</h1>

            <!-- Container untuk semua cluster -->
            <div id="clustersContainer" class="space-y-6">
                <!-- Cluster akan ditampilkan di sini secara dinamis -->
            </div>

            <!-- Data Summary -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="text-center space-y-1">
                    <p class="text-lg font-semibold text-gray-700">Total Cluster: <span id="totalCluster">0</span></p>
                    <p class="text-lg font-semibold text-gray-700">Total Anggota: <span id="totalAnggota">0</span></p>
                </div>
            </div>
        </section> --}}

        <section class="bg-white col-span-2 space-y-6">
            <div class="cluster-data">
                {{-- <h1 class="text-3xl font-bold text-gray-800 p-3">Cluster DCC</h1> --}}

                <!-- Main Slider Container -->
                <div class="relative">
                    <!-- Slider untuk setiap cluster -->
                    @foreach ($processCluster as $clusterIndex => $cluster)
                        <div class="cluster-slide {{ $clusterIndex === 0 ? 'block' : 'hidden' }}"
                            data-cluster-slide="{{ $clusterIndex }}">

                            <!-- Cluster Header -->
                            <div class="mb-2 p-3">
                                <h2 class="text-2xl font-bold text-gray-800">{{ $cluster['nama'] }}</h2>
                                <p class="text-lg text-gray-600">Shift: {{ $cluster['shift'] }}</p>
                            </div>

                            <!-- Dua kotak anggota dalam satu slide -->
                            <div class="">
                                @foreach ($cluster['anggota'] as $index => $anggota)
                                    <div class="bg-blue-300 rounded-lg shadow-lg  mb-4">
                                        <div class="relative h-60 overflow-hidden rounded-lg">
                                            <div
                                                class="slider-item absolute inset-0 flex flex-col items-center justify-center opacity-100">
                                                <div
                                                    class="w-full h-full bg-gray-300 rounded-lg mb-4 overflow-hidden shadow-lg">
                                                    <img src="{{ asset('uploads/anggota-cluster/' . $anggota['url_pict']) }}"
                                                        alt="{{ $anggota['nama'] }}"
                                                        class="w-full h-full object-contain">
                                                </div>
                                                <div class="text-center space-y-2">
                                                    <h3 class="text-xl font-semibold text-gray-800">
                                                        {{ $anggota['nama'] }}</h3>
                                                    <p class="text-lg text-gray-600">{{ $anggota['role'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    @endforeach

                    <!-- Navigation Buttons untuk cluster -->
                    {{-- {{dd($processCluster)}} --}}
                    @if (count($processCluster) > 1)
                        <button
                            class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-3 shadow-lg transition-all duration-200 z-10"
                            onclick="previousCluster()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                        </button>
                        <button
                            class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-80 hover:bg-opacity-100 rounded-full p-3 shadow-lg transition-all duration-200 z-10"
                            onclick="nextCluster()">
                            <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    @endif

                    <!-- Dots Indicator untuk cluster -->
                    @if (count($processCluster) > 1)
                        <div class="flex justify-center mt-6 space-x-2">
                            @foreach ($processCluster as $clusterIndex => $cluster)
                                <button
                                    class="w-3 h-3 rounded-full transition-colors duration-200 {{ $clusterIndex === 0 ? 'bg-blue-500' : 'bg-gray-300' }}"
                                    onclick="goToCluster({{ $clusterIndex }})"
                                    data-cluster-dot="{{ $clusterIndex }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Data Summary -->
            <div class="mt-6 pt-4 border-t border-gray-200">
                <div class="text-center space-y-1">
                    <p class="text-lg font-semibold text-gray-700">Total Cluster: {{ count($processCluster) }}</p>
                    <p class="text-lg font-semibold text-gray-700">Total Anggota:
                        {{ $processCluster->sum(function ($cluster) {return count($cluster['anggota']);}) }}</p>
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

    <script>
        let currentClusterIndex = 0;
        let totalClusters = {{ count($processCluster) }};

        function showCluster(clusterIndex) {
            // Hide all cluster slides
            document.querySelectorAll('.cluster-slide').forEach(slide => {
                slide.classList.add('hidden');
                slide.classList.remove('block');
            });

            // Show current cluster slide
            const currentSlide = document.querySelector(`[data-cluster-slide="${clusterIndex}"]`);
            if (currentSlide) {
                currentSlide.classList.remove('hidden');
                currentSlide.classList.add('block');
            }

            // Update dots
            document.querySelectorAll('[data-cluster-dot]').forEach((dot, index) => {
                if (index === clusterIndex) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-blue-500');
                } else {
                    dot.classList.remove('bg-blue-500');
                    dot.classList.add('bg-gray-300');
                }
            });
        }

        function nextCluster() {
            currentClusterIndex = (currentClusterIndex + 1) % totalClusters;
            showCluster(currentClusterIndex);
        }

        function previousCluster() {
            currentClusterIndex = (currentClusterIndex - 1 + totalClusters) % totalClusters;
            showCluster(currentClusterIndex);
        }

        function goToCluster(clusterIndex) {
            currentClusterIndex = clusterIndex;
            showCluster(currentClusterIndex);
        }

        // Auto-slide functionality (optional)
        function startAutoSlide(interval = 5000) {
            if (totalClusters > 1) {
                setInterval(() => {
                    nextCluster();
                }, interval);
            }
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowRight') {
                nextCluster();
            } else if (e.key === 'ArrowLeft') {
                previousCluster();
            }
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Uncomment to enable auto-slide
            console.log('slide it')
            // startAutoSlide(4000);
        });
    </script>


</body>

</html>
