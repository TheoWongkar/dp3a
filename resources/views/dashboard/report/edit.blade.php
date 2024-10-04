<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Laporan :') }} <span class="text-blue-200">{{ $report->ticket_number }}</span>
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 space-y-6">
                <div>
                    <!-- Judul -->
                    <h2 class="text-2xl font-bold text-gray-800 mt-6 border-b-2 pb-2 border-gray-300">Detail Laporan</h2>

                    <div class="shadow-lg p-4 mt-6 rounded-lg">
                        <!-- Informasi Laporan -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Informasi Laporan</h2>
                                <div class="mt-4 space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Nomor Tiket:</span>
                                        <span class="text-gray-900 font-semibold">{{ $report->ticket_number }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Tanggal Laporan:</span>
                                        <span class="text-gray-900">{{ $report->date = date('d F Y') }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Jenis Kekerasan:</span>
                                        <span class="text-gray-900">{{ $report->violence_category }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Tempat Kejadian:</span>
                                        <span class="text-gray-900">{{ $report->scene }}</span>
                                    </div>
                                    <div class="flex justify-start">
                                        <span class="font-semibold text-gray-700">Deskripsi Insiden:</span>
                                    </div>
                                    <p class="inline text-gray-900 text-justify">{{ $report->description }}</p>
                                </div>
                            </div>

                            <!-- Bukti Pendukung -->
                            @if ($report->evidence)
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800">Bukti Pendukung</h2>
                                    <div class="mt-4 space-y-3">
                                        <div class="overflow-scroll max-w-xl max-h-64 border  rounded-lg p-2">
                                            <img src="{{ asset('storage/' . $report->evidence) }}" alt="Bukti Pendukung"
                                                class="w-auto h-auto">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Informasi Korban, Pelaku, Pelapor Berderet 3 -->
                        <div class="mt-5 grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Informasi Korban -->
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Informasi Korban</h2>
                                <div class="mt-4 space-y-1.5">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Nama Korban:</span>
                                        <span class="text-gray-900">{{ $report->victim->name }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Usia:</span>
                                        <span class="text-gray-900">{{ $report->victim->age }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Jenis Kelamin:</span>
                                        <span class="text-gray-900">{{ $report->victim->gender }}</span>
                                    </div>
                                    <div class="flex justify-start">
                                        <span class="font-semibold text-gray-700">Deskripsi Korban:</span>
                                    </div>
                                    <p class="inline text-gray-900 text-justify">{{ $report->victim->description }}</p>
                                </div>
                            </div>

                            <!-- Informasi Pelaku -->
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Informasi Pelaku</h2>
                                <div class="mt-4 space-y-1.5">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Nama Pelaku:</span>
                                        <span class="text-gray-900">{{ $report->perpetrator->name }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Usia:</span>
                                        <span class="text-gray-900">{{ $report->perpetrator->age }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Hubungan Dengan Korban:</span>
                                        <span
                                            class="text-gray-900">{{ $report->perpetrator->relationship_between }}</span>
                                    </div>
                                    <div class="flex justify-start">
                                        <span class="font-semibold text-gray-700">Deskripsi Pelaku:</span>
                                    </div>
                                    <p class="inline text-gray-900 text-justify">
                                        {{ $report->perpetrator->description }}
                                    </p>
                                </div>
                            </div>

                            <!-- Informasi Pelapor -->
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">Informasi Pelapor</h2>
                                <div class="mt-4 space-y-3">
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Whatsapp:</span>
                                        <span class="text-gray-900">{{ $report->reporter->whatsapp }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Telegram:</span>
                                        <span class="text-gray-900">{{ $report->reporter->telegram }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Instagram:</span>
                                        <span class="text-gray-900">{{ $report->reporter->instagram }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span class="font-semibold text-gray-700">Email:</span>
                                        <span class="text-gray-900">{{ $report->reporter->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Histori Status Laporan -->
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 mt-6 border-b-2 pb-2 border-gray-300">Histori Status
                        Laporan</h2>
                    <div class="mt-4 space-y-4">
                        @foreach ($report->status as $status)
                            <div
                                class="bg-white rounded-lg p-5 shadow-lg hover:shadow-xl transition-shadow duration-300 ease-in-out transform hover:-translate-y-1">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4m-7 8h12a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                        <span class="font-semibold text-gray-700">Status: {{ $status->status }}</span>
                                    </div>
                                    <span class="text-gray-500 text-sm">{{ $status->created_at }}</span>
                                </div>
                                <p class="mt-2 text-gray-600">{{ $status->description }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Form Tambah Histori Status Laporan -->
                <div class="mt-10 bg-white p-6 rounded-lg shadow-lg">
                    <form action="">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Pilihan Status -->
                            <div>
                                <label for="status" class="block text-gray-700 font-semibold">Status</label>
                                <select name="status" id="status"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    <option value="Diproses">Diproses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <p class="mt-1 text-sm text-gray-500">Ubah status sesuai dengan kenyataan.</p>
                            </div>

                            <!-- Deskripsi Status -->
                            <div>
                                <label for="status_description"
                                    class="block text-gray-700 font-semibold">Deskripsi</label>
                                <textarea name="status_description" id="status_description" rows="4"
                                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end mt-6 gap-4">
                            <a href="{{ route('laporan.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg shadow transition-all duration-300 ease-in-out">
                                Kembali
                            </a>
                            <button type="submit" onclick="return confirm('Yakin ingin menyimpan histori?')"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out">
                                Tambah Status
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


</x-app-layout>
