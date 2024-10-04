<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Laporan') }}
        </h2>
    </x-slot>

    <!-- Section Laporan -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <div class="flex flex-col md:flex-row justify-end items-center mb-6 space-y-4 md:space-y-0">
                    <!-- Cari Laporan -->
                    <div class="flex space-x-2 w-full md:w-1/3">
                        <form action="{{ route('laporan.index') }}" method="GET" class="flex w-full">
                            <select name="status"
                                class="bg-[#141652] text-white rounded-l-full px-4 py-2 border border-[#141652] focus:ring-0 focus:border-blue-800">
                                <option value="">Status</option>
                                <option value="Diajukan" {{ $status === 'Diajukan' ? 'selected' : '' }}>Diajukan
                                <option value="Diproses" {{ $status === 'Diproses' ? 'selected' : '' }}>Diproses
                                </option>
                                <option value="Selesai" {{ $status === 'Selesai' ? 'selected' : '' }}>Selesai
                                </option>
                            </select>
                            <input type="text" name="search" value="{{ $search }}"
                                class=" px-4 py-2 w-full border border-[#141652] focus:ring-0 focus:border-blue-800"
                                placeholder="Cari laporan..." autocomplete="off" autofocus />
                            <button type="submit"
                                class="bg-[#141652] hover:bg-blue-800 text-white rounded-r-full px-4 py-2 flex items-center transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-5">
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
                    @if ($reports->count())
                        <table class="min-w-full bg-gray-100 rounded-xl shadow-md">
                            <thead class="bg-[#141652] text-white">
                                <tr>
                                    <th
                                        class="text-center py-3 px-2 sm:px-2 uppercase font-semibold text-xs sm:text-sm">
                                        #
                                    </th>
                                    <th class="text-left py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        TICKET
                                    </th>
                                    <th class="text-left py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        JENIS KEKERASAN</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        STATUS</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        DIBUAT</th>
                                    <th
                                        class="text-center py-3 px-2 sm:px-4 uppercase font-semibold text-xs sm:text-sm">
                                        AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $report)
                                    <tr class="border-t hover:bg-blue-100 transition duration-200">
                                        <td class="py-4 px-2 sm:px-4 text-center">{{ $loop->iteration }}</td>
                                        <td class="py-4 px-2 sm:px-4">{{ $report->ticket_number }}</td>
                                        <td class="py-4 px-2 sm:px-4">{{ $report->violence_category }}</td>
                                        @if ($report->latestStatus)
                                            <td class="py-4 px-2 sm:px-4 text-center">
                                                @if ($report->latestStatus->status == 'Diajukan')
                                                    <span
                                                        class="inline-block bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-red-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                        {{ $report->latestStatus->status }}
                                                    </span>
                                                @elseif($report->latestStatus->status == 'Diproses')
                                                    <span
                                                        class="inline-block bg-orange-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-orange-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                        {{ $report->latestStatus->status }}
                                                    </span>
                                                @elseif($report->latestStatus->status == 'Selesai')
                                                    <span
                                                        class="inline-block bg-green-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-green-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                                        {{ $report->latestStatus->status }}
                                                    </span>
                                            </td>
                                        @endif
                                @endif
                                <td class="py-4 px-2 sm:px-4 text-center">
                                    {{ $report->created_at->format('d M Y') }}
                                </td>
                                <td class="py-4 px-2 sm:px-4 flex space-x-2 justify-center">
                                    <a href="{{ route('laporan.edit', $report->ticket_number) }}"
                                        class="inline-flex items-center bg-blue-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-blue-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-4 mr-1">
                                            <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                            <path fill-rule="evenodd"
                                                d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 0 1 0-1.113ZM17.25 12a5.25 5.25 0 1 1-10.5 0 5.25 5.25 0 0 1 10.5 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        Lihat
                                    </a>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="inline-flex items-center bg-red-600 text-white px-2 py-1 sm:px-3 sm:py-1 rounded-full hover:bg-red-500 transition duration-200 ease-in-out shadow-md text-xs sm:text-sm"
                                            onclick="return confirm('Yakin ingin menghapus?');">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="size-4 mr-1">
                                                <path fill-rule="evenodd"
                                                    d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                                </tr>
                    @endforeach
                    </tbody>
                    </table>
                @else
                    <div class="flex flex-col items-center justify-center h-36">
                        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                            <h1 class="text-xl font-bold text-red-600">Maaf, laporan tidak ada</h1>
                            <p class="mt-2 text-gray-600">Silakan cek kembali nanti!</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{-- {{ $reports->links() }} --}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
