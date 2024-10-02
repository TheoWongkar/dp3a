<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Section Dashboard -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">

                <!-- Header Section -->
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Statistik Berita</h1>
                    <p class="text-gray-500">Menampilkan statistik mengenai berita.</p>
                </div>

                <!-- Statistik Berita -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Card Total Berita -->
                    <div class="bg-blue-200 p-6 rounded-lg shadow-md hover:bg-blue-300 transition duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-600 rounded-full text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 3.75a.75.75 0 0 1 .75.75v6.75h6.75a.75.75 0 0 1 0 1.5h-6.75v6.75a.75.75 0 0 1-1.5 0v-6.75H4.5a.75.75 0 0 1 0-1.5h6.75V4.5a.75.75 0 0 1 .75-.75Z"
                                        clip-rule="evenodd" />
                                </svg>

                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg font-semibold text-gray-800">Total Berita</h2>
                                <p class="text-2xl font-bold text-gray-900">{{ $totalPosts }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Berita Terbit -->
                    <div class="bg-green-200 p-6 rounded-lg shadow-md hover:bg-green-300 transition duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-green-600 rounded-full text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg font-semibold text-gray-800">Berita Diterbitkan</h2>
                                <p class="text-2xl font-bold text-gray-900">{{ $publishedPosts }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Card Berita Diarsipkan -->
                    <div class="bg-yellow-200 p-6 rounded-lg shadow-md hover:bg-yellow-300 transition duration-300">
                        <div class="flex items-center">
                            <div class="p-3 bg-yellow-600 rounded-full text-white">
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m7-7l-7 7 7 7" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-lg font-semibold text-gray-800">Berita Diarsipkan</h2>
                                <p class="text-2xl font-bold text-gray-900">{{ $archivedPosts }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Aktifitas Berita -->
                <div class="mt-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Aktifitas Berita</h2>
                    <div class="bg-white shadow rounded-lg p-6">
                        <ul class="divide-y divide-gray-200">
                            @foreach ($posts as $post)
                                <li class="py-4">
                                    <div class="flex items-center justify-between">
                                        <a href="{{ route('berita.show', $post->slug) }}"
                                            class="text-gray-700 hover:text-blue-500 hover:underline">{{ $post->title }}</a>
                                        <span
                                            class="text-gray-500 text-sm">{{ $post->updated_at->diffForHumans() }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
