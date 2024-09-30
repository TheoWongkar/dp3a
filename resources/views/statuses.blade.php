<x-guest-layout>

    <!-- Section Statuses -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-[#DCE8FF] px-8 py-6 sm:px-10 sm:py-8 lg:px-12 lg:py-py-10 rounded-lg shadow-xl max-w-2xl w-full">
            <!-- Header Text -->
            <h1 class="text-2xl lg:text-3xl font-bold mb-4 text-left">
                Masukkan Nomor Tiket Laporan Anda
            </h1>

            <!-- Description Text -->
            <p class="mb-6 leading-relaxed text-left">
                Mohon masukkan nomor tiket laporan untuk melihat status laporan.
                Nomor tiket laporan seharusnya anda dapatkan setelah anda mengirim
                formulir laporan kekerasan.
            </p>

            <!-- Input Field with Icon -->
            <div class="flex items-center border-2 border-[#141652] rounded-3xl p-2 mb-4 bg-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Masukkan nomor tiket laporan" autofocus
                    class="ml-2 w-full bg-transparent border-none focus:outline-none focus:ring-0 text-gray-700">
            </div>

            <!-- Links -->
            <p class="text-center text-md">
                Belum membuat laporan? <a href="#" class="font-semibold">Buat Laporan Sekarang</a>
            </p>
            <p class="mt-10 text-center text-sm">
                Butuh bantuan? <a href="#" class="font-semibold">Chat virtual asistenmu di sini</a>
            </p>
        </div>
    </div>

</x-guest-layout>
