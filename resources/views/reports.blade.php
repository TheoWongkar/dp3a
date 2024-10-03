<x-guest-layout>

    <!-- Section Laporkan -->
    <div
        class="bg-[#E9F0FF] min-h-screen flex flex-col items-center justify-start pt-24 pb-10 px-4 md:px-8 lg:px-16 space-y-6">
        <!-- Header Container -->
        <div class="bg-white w-full max-w-6xl py-4 px-6 rounded-md">
            <h1 class="text-lg font-bold">LAPORAN KEKERASAN</h1>
        </div>

        <div class="bg-white w-full max-w-6xl p-8 rounded-md shadow-md" x-data="{ step: 1 }">
            <div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Step 1: Laporan Kekerasan -->
                    <div x-show="step === 1" x-cloak>
                        <h2 class="text-lg font-bold mb-6">Formulir Laporan Kekerasan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                            <!-- Jenis Kekerasan -->
                            <label for="jenis-kekerasan" class="block text-sm font-medium text-left">
                                Jenis Kekerasan <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <select id="jenis-kekerasan" name="jenis-kekerasan"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                                    <option selected disabled>Pilih jenis kekerasan</option>
                                    <option>Kekerasan fisik</option>
                                    <option>Kekerasan psikis</option>
                                    <option>Kekerasan seksual</option>
                                    <option>Penelantaran anak</option>
                                    <option>Eksploitasi anak</option>
                                </select>
                            </div>

                            <!-- Deskripsi Insiden -->
                            <label for="deskripsi" class="block text-sm font-medium text-left">
                                Deskripsi Insiden <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400"></textarea>
                            </div>

                            <!-- Tanggal Kejadian -->
                            <label for="tanggal-kejadian" class="block text-sm font-medium text-left">
                                Tanggal Kejadian <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <input type="date" id="tanggal-kejadian" name="tanggal-kejadian"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Tempat Kejadian -->
                            <label for="tempat-kejadian" class="block text-sm font-medium text-left">
                                Tempat Kejadian <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <textarea id="tempat-kejadian" name="tempat-kejadian" rows="4"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400"></textarea>
                            </div>

                            <!-- Supporting Evidence -->
                            <label for="bukti-pendukung" class="block text-sm font-medium text-left">
                                Bukti Pendukung
                            </label>
                            <div class="md:col-span-1 mb-5">
                                <div x-data="{ files: null }"
                                    class="border-4 p-6 text-center bg-white rounded-md border-[#DCE8FF]">
                                    <input type="file" id="bukti-pendukung" name="bukti-pendukung" class="hidden"
                                        accept="image/png, image/jpeg" x-ref="file"
                                        x-on:change="files = $event.target.files">
                                    <div x-on:click="$refs.file.click()" class="cursor-pointer inline">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="size-8 mx-auto text-gray-500 inline">
                                            <path fill-rule="evenodd"
                                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="inline text-gray-500 text-xl font-bold">Image</p>
                                        <p class="text-gray-500 font-semibold"
                                            x-text="files ? files[0].name : 'Drop Image to Upload'"></p>
                                        <p class="text-xs text-red-500 mt-1">JPG/PNG</p>
                                        <p class="text-xs text-red-500 mt-1">Ukuran File 40 KB - 100 KB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Data Korban -->
                    <div x-show="step === 2" x-cloak>
                        <h2 class="text-lg font-bold mb-6">Formulir Data Korban</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                            <!-- Nama Korban -->
                            <label for="nama-korban" class="block text-sm font-medium text-left">
                                Nama Korban <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-korban" name="nama-korban"
                                    placeholder="Masukkan nama korban"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Usia Korban -->
                            <label for="usia-korban" class="block text-sm font-medium text-left">
                                Usia Korban <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <input type="number" id="usia-korban" name="usia-korban"
                                    placeholder="Masukkan usia korban"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Jenis Kelamin Korban -->
                            <label for="usia-korban" class="block text-sm font-medium text-left">
                                Jenis Kelamin Korban <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <select id="jenis-kekerasan" name="jenis-kekerasan"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                                    <option selected disabled>Pilih jenis kelamin korban</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <!-- Alamat Korban -->
                            <label for="alamat-korban" class="block text-sm font-medium text-left">
                                Deskripsi Tambahan Mengenai Korban <span class="text-red-500">*</span>
                            </label>
                            <div class="md:col-span-2">
                                <textarea id="alamat-korban" name="alamat-korban" rows="4"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Data Pelaku -->
                    <div x-show="step === 3" x-cloak>
                        <h2 class="text-lg font-bold mb-6">Formulir Data Pelaku</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                            <!-- Nama Pelaku -->
                            <label for="name" class="block text-sm font-medium text-left">
                                Nama Pelaku
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-pelaku" name="nama-pelaku"
                                    placeholder="Masukkan nama pelaku"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Usia Pelaku -->
                            <label for="usia-pelaku" class="block text-sm font-medium text-left">
                                Usia Pelaku
                            </label>
                            <div class="md:col-span-2">
                                <input type="number" id="usia-pelaku" name="usia-pelaku"
                                    placeholder="Masukkan usia pelaku"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Hubungan Antara Pelaku Dengan Korban -->
                            <label for="usia-korban" class="block text-sm font-medium text-left">
                                Hubungan Pelaku Dengan Korban
                            </label>
                            <div class="md:col-span-2">
                                <select id="jenis-kekerasan" name="jenis-kekerasan"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                                    <option selected>Pilih hubungan pelaku dengan korban</option>
                                    <option value="Laki-Laki">Orang Tua</option>
                                    <option value="Perempuan">Saudara</option>
                                    <option value="Perempuan">Guru</option>
                                    <option value="Perempuan">Teman</option>
                                    <option value="Perempuan">Lainnya</option>
                                </select>
                            </div>

                            <!-- Deskripsi Tambahan Mengenai Pelaku -->
                            <label for="alamat-korban" class="block text-sm font-medium text-left">
                                Deskripsi Tambahan Mengenai Pelaku
                            </label>
                            <div class="md:col-span-2">
                                <textarea id="alamat-korban" name="alamat-korban" rows="4"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 4: Data Pelapor -->
                    <div x-show="step === 4" x-cloak>
                        <h2 class="text-lg font-bold mb-6">Formulir Data Pelapor</h2>
                        <!-- Nama Pelaku -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-start">
                            <!-- Whatsapp -->
                            <label for="name" class="block text-sm font-medium text-left">
                                Whatsapp
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-pelaku" name="nama-pelaku" placeholder="08XXXXXXXXXX"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Telegram -->
                            <label for="name" class="block text-sm font-medium text-left">
                                Telegram
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-pelaku" name="nama-pelaku" placeholder="08XXXXXXXXXX"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Instagram -->
                            <label for="name" class="block text-sm font-medium text-left">
                                Instagram
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-pelaku" name="nama-pelaku" placeholder="@xxx123"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>

                            <!-- Email -->
                            <label for="name" class="block text-sm font-medium text-left">
                                Instagram
                            </label>
                            <div class="md:col-span-2">
                                <input type="text" id="nama-pelaku" name="nama-pelaku"
                                    placeholder="xxxxx@email.com"
                                    class="w-full bg-[#DCE8FF] rounded-lg border-[#DCE8FF] focus:border-blue-400">
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Kirim Laporan -->
                    <div x-show="step === 5" x-cloak>
                        <h2 class="text-lg font-bold mb-6">Formulir Laporan Kekerasan</h2>
                        <div class="text-sm md:text-lg">
                            <h3 class="font-bold text-center">Terima Kasih Telah Melakukan
                                Pelaporan!</h3>
                            <h3 class="font-bold text-center">Apakah Anda Yakin Ingin
                                Mengirimkan
                                Laporan Ini
                                Sekarang?</h3>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-6 text-sm">
                        <button type="button" x-show="step > 1 && step <= 4" @click="step--"
                            class="bg-gray-800 text-white py-2 px-6 rounded-md font-semibold hover:bg-gray-700 transition">
                            KEMBALI
                        </button>

                        <button type="button" x-show="step <= 4" @click="step++"
                            class="bg-[#141652] text-white py-2 px-6 rounded-md font-semibold hover:bg-blue-900 transition">
                            SELANJUTNYA
                        </button>

                    </div>
                    <div class="flex items-center justify-center text-sm">
                        <button type="submit" x-show="step === 5"
                            class="bg-[#141652] text-white py-2 px-6 rounded-md font-semibold hover:bg-blue-900 transition">
                            KIRIM LAPORAN
                        </button>
                    </div>

                    <p class="text-sm text-red-500 mt-4" x-show="step <= 4">* Bertanda Pertanyaan yang wajib diisi
                    </p>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>
