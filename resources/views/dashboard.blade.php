<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Section Dashboard -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Berita -->
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <!-- Header Section -->
                    <div class="mb-2">
                        <h1 class="text-2xl font-semibold text-gray-800">Statistik Berita</h1>
                        <p class="text-gray-500">Menampilkan statistik mengenai berita.</p>
                    </div>

                    <!-- Statistik Berita -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Card Total Berita -->
                        <div class="bg-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-600 rounded-full text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Berita Tersedia</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $totalPosts }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Berita Terbit -->
                        <div class="bg-green-200 p-4 rounded-lg shadow-md hover:bg-green-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-600 rounded-full text-white">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Berita Diterbitkan</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $publishedPosts }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Berita Diarsipkan -->
                        <div class="bg-yellow-200 p-4 rounded-lg shadow-md hover:bg-yellow-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-yellow-600 rounded-full text-white">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m7-7l-7 7 7 7" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Berita Diarsipkan</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $archivedPosts }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aktifitas Berita -->
                    <div class="mt-5">
                        <h2 class="text-xl font-semibold text-gray-800">Aktifitas Berita</h2>
                        <p class="text-gray-500">Menampilkan aktifitas berita terbaru.</p>
                        <div class="bg-white shadow rounded-lg p-4 mt-2">
                            <ul class="divide-y divide-gray-200">
                                @foreach ($posts as $post)
                                    <li class="py-2">
                                        <div class="flex items-center justify-between">
                                            <p class="text-gray-700 text-sm md:text-md">{{ $post->title }}</p>
                                            <span
                                                class="text-gray-500 text-xs md:text-sm">{{ $post->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Pengumuman -->
                <div class="bg-white shadow-lg rounded-lg p-8">
                    <!-- Header Section -->
                    <div class="mb-2">
                        <h1 class="text-2xl font-semibold text-gray-800">Statistik Pengumuman</h1>
                        <p class="text-gray-500">Menampilkan statistik mengenai pengumuman.</p>
                    </div>

                    <!-- Statistik Pengumuman -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Card Total Pengumuman -->
                        <div class="bg-blue-200 p-4 rounded-lg shadow-md hover:bg-blue-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-blue-600 rounded-full text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="h-5 w-5">
                                        <path fill-rule="evenodd"
                                            d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Pengumuman Tersedia</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $totalAnnouncements }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Pengumuman Terbit -->
                        <div class="bg-green-200 p-4 rounded-lg shadow-md hover:bg-green-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-green-600 rounded-full text-white">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Pengumuman Diterbitkan</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $publishedAnnouncements }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Card Pengumuman Diarsipkan -->
                        <div class="bg-yellow-200 p-4 rounded-lg shadow-md hover:bg-yellow-300 transition duration-300">
                            <div class="flex items-center">
                                <div class="p-2 bg-yellow-600 rounded-full text-white">
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 11H5m7-7l-7 7 7 7" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h2 class="text-sm font-semibold text-gray-800">Pengumuman Diarsipkan</h2>
                                    <p class="text-xl font-bold text-gray-900">{{ $archivedAnnouncements }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Aktifitas Pengumuman -->
                    <div class="mt-5">
                        <h2 class="text-xl font-semibold text-gray-800">Aktifitas Pengumuman</h2>
                        <p class="text-gray-500">Menampilkan aktifitas pengumuman terbaru.</p>
                        <div class="bg-white shadow rounded-lg p-4 mt-2">
                            <ul class="divide-y divide-gray-200">
                                @foreach ($announcements as $announcement)
                                    <li class="py-2">
                                        <div class="flex items-center justify-between">
                                            <p class="text-gray-700 text-sm md:text-md">{{ $announcement->title }}</p>
                                            <span
                                                class="text-gray-500 text-xs md:text-sm">{{ $announcement->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
