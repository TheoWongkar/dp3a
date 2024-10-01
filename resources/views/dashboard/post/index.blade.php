<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Berita') }}
        </h2>
    </x-slot>

    <!-- Section Berita -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <!-- Tambah dan Cari -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <!-- Tambah Berita -->
                    <a href="/posts/create"
                        class="flex items-center bg-[#141652] hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition duration-200 text-sm md:text-base w-full md:w-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="size-5 mr-1">
                            <path fill-rule="evenodd"
                                d="M17.663 3.118c.225.015.45.032.673.05C19.876 3.298 21 4.604 21 6.109v9.642a3 3 0 0 1-3 3V16.5c0-5.922-4.576-10.775-10.384-11.217.324-1.132 1.3-2.01 2.548-2.114.224-.019.448-.036.673-.051A3 3 0 0 1 13.5 1.5H15a3 3 0 0 1 2.663 1.618ZM12 4.5A1.5 1.5 0 0 1 13.5 3H15a1.5 1.5 0 0 1 1.5 1.5H12Z"
                                clip-rule="evenodd" />
                            <path
                                d="M3 8.625c0-1.036.84-1.875 1.875-1.875h.375A3.75 3.75 0 0 1 9 10.5v1.875c0 1.036.84 1.875 1.875 1.875h1.875A3.75 3.75 0 0 1 16.5 18v2.625c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625v-12Z" />
                            <path
                                d="M10.5 10.5a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963 5.23 5.23 0 0 0-3.434-1.279h-1.875a.375.375 0 0 1-.375-.375V10.5Z" />
                        </svg>
                        Tambah Pengumuman
                    </a>

                    <!-- Cari Berita -->
                    <div class="flex space-x-2 w-full md:w-1/3">
                        <form action="{{ route('berita.index') }}" method="GET" class="flex w-full">
                            <input type="text" name="search" value="{{ $search }}"
                                class="rounded-l-full px-4 py-2 w-full" placeholder="Cari Berita...">
                            <button type="submit"
                                class="bg-[#141652] border border-[#141652] hover:bg-blue-800 text-white rounded-r-full p-2 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-5 h-5">
                                    <path fill-rule="evenodd"
                                        d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Tabel Berita -->
                <div class="overflow-x-auto">
                    @if ($posts->count())
                        <table class="min-w-full bg-gray-100 rounded-xl shadow-md">
                            <thead class="bg-[#141652] text-white">
                                <tr>
                                    <th
                                        class="text-center py-3 px-2 sm:px-2 uppercase font-semibold text-xs sm:text-sm">
                                        #
                                    </th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        JUDUL
                                    </th>
                                    <th class="text-left py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        PENULIS</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        DIBUAT</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        STATUS</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="border-t hover:bg-blue-100 transition duration-200">
                                        <td class="py-4 px-2 sm:px-4 text-center">{{ $loop->iteration }}</td>
                                        <td class="py-4 px-2 sm:px-4">{{ substr($post->title, 0, 20) }}</td>
                                        <td class="py-4 px-2 sm:px-4">{{ $post->user->name }}</td>
                                        <td class="py-4 px-2 sm:px-4 text-center">
                                            {{ $post->created_at->format('d M Y') }}
                                        </td>
                                        <td class="py-4 px-2 sm:px-4 text-center">Status</td>
                                        <td class="py-4 px-2 sm:px-4 flex space-x-2 justify-center">
                                            <a href="/posts/1/edit"
                                                class="inline-flex items-center bg-yellow-500 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-yellow-600 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                <!-- Edit Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 sm:h-5 sm:w-5 mr-1" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 010 2.828l-10 10a2 2 0 01-.878.478l-4 1a1 1 0 01-1.225-1.225l1-4a2 2 0 01.478-.878l10-10a2 2 0 012.828 0z" />
                                                </svg>
                                                Edit
                                            </a>
                                            <a href="/posts/1/delete"
                                                class="inline-flex items-center bg-red-500 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-red-600 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                <!-- Delete Icon -->
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4 sm:h-5 sm:w-5 mr-1" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path
                                                        d="M6.5 4a1 1 0 00-1 1v1h-1v1h11v-1h-1V5a1 1 0 00-1-1H6.5zM7 9a1 1 0 00-1 1v7a1 1 0 001 1h6a1 1 0 001-1v-7a1 1 0 00-1-1H7z" />
                                                </svg>
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>postingan tidak ada</p>
                    @endif
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
