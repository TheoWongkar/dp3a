<x-guest-layout>

    <!-- Hero Section -->
    <section class="relative flex items-center justify-center h-screen bg-cover bg-center"
        style="background-image: url('https://png.pngtree.com/background/20230424/original/pngtree-bamboo-pathway-in-the-forest-wallpaper-hd-picture-image_2464509.jpg');">
        <div class="absolute inset-0 bg-opacity-100"></div>

        <!-- Content -->
        <div class="relative z-10 text-center text-white max-w-3xl mx-auto">
            <!-- Logo -->
            <div class="mb-8 flex justify-center">
                <x-application-logo class="w-16 h-16"></x-application-logo>
            </div>

            <!-- Main Heading -->
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold leading-tight tracking-wider">
                JANGAN TAKUT LAPORKAN KEKERASAN PADA ANAK
            </h1>

            <!-- Subtitle -->
            <p class="mt-4 text-lg sm:text-xl lg:text-2xl">
                BERSAMA, KITA LINDUNGI MEREKA!
            </p>

            <!-- Call to Action Button -->
            <a href="#"
                class="mt-6 inline-block border hover:bg-[#141652] font-semibold py-2 px-8 rounded-xl transition duration-300">
                LAPORKAN SEKARANG
            </a>
        </div>

        <!-- AI Chat Bot Icon -->
        <div class="absolute bottom-8 left-8 flex items-center">
            <img src="https://example.com/chat-ai-icon.png" alt="Chat AI" class="w-16 h-16">
        </div>
    </section>


    <!-- Section Content -->
    <section class="max-w-6xl mx-auto py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <img src="https://via.placeholder.com/800x400" alt="Main Image" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">Lorem Ipsum</h2>
                        <div class="text-gray-500 text-sm mb-4">
                            <span>24hr Ago</span> &bull; <span>Admin</span>
                        </div>
                        <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
                            posuere facilisis velit, eu pulvinar ipsum tempus ac.</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar Content -->
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h3 class="text-xl font-bold mb-4">Berita Terbaru</h3>
                <div class="space-y-4">
                    <!-- Repeated Small News Block -->
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100" alt="Thumbnail"
                            class="w-16 h-16 object-cover rounded-lg mr-4">
                        <div>
                            <h4 class="text-md font-semibold">Lorem Ipsum</h4>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100" alt="Thumbnail"
                            class="w-16 h-16 object-cover rounded-lg mr-4">
                        <div>
                            <h4 class="text-md font-semibold">Lorem Ipsum</h4>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100" alt="Thumbnail"
                            class="w-16 h-16 object-cover rounded-lg mr-4">
                        <div>
                            <h4 class="text-md font-semibold">Lorem Ipsum</h4>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100" alt="Thumbnail"
                            class="w-16 h-16 object-cover rounded-lg mr-4">
                        <div>
                            <h4 class="text-md font-semibold">Lorem Ipsum</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Pantau -->
    <section class="w-full bg-gray-300 shadow-md">
        <div class=" py-10 px-5 lg:px-24 rounded-lg grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Text kiri -->
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-4 leading-snug">
                    Pantau Perkembangan Laporan Secara Real-Time!
                </h2>
                <p class="text-gray-700 mb-6">
                    Angka-angka ini bukan hanya data, mereka adalah cerita nyata di balik setiap laporan. Dengan
                    statistik laporan ini, kita bisa merespon dengan cepat dan tepat, menyesuaikan langkah, dan
                    memastikan perlindungan yang lebih baik bagi anak-anak di seluruh negeri. Ambil langkah ini untuk
                    mendapatkan lebih banyak informasi secara real-time dan mendukung keselamatan mereka.
                </p>
                <a href="#"
                    class="inline-block bg-blue-900 text-white py-2 px-2 w-36 rounded-md hover:bg-blue-700 transition duration-300">
                    SELENGKAPNYA
                </a>
            </div>
            <!-- Bingkai kanan -->
            <div class="flex items-center justify-center">
                <div class="w-full h-72 bg-gray-300 border-2 border-gray-800 rounded-md"></div>
            </div>
        </div>
    </section>

    <section class="py-12">
        <div x-data="{ activeSlide: 0, slides: ['img1.jpg', 'img2.jpg', 'img3.jpg'] }" class="relative w-full max-w-4xl mx-auto">

            <!-- Carousel Container -->
            <div class="overflow-hidden relative">
                <div class="flex transition-transform duration-500"
                    :style="`transform: translateX(-${activeSlide * 100}%)`">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div class="min-w-full flex-shrink-0">
                            <img :src="slide" alt="Slide Image"
                                class="w-full h-64 object-cover rounded-lg shadow-lg">
                        </div>
                    </template>
                </div>
            </div>

            <!-- Prev Button -->
            <button @click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1"
                class="absolute left-0 top-1/2 transform -translate-y-1/2 text-2xl text-gray-700 bg-white rounded-full shadow-lg p-2 focus:outline-none">
                &#10094;
            </button>

            <!-- Next Button -->
            <button @click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1"
                class="absolute right-0 top-1/2 transform -translate-y-1/2 text-2xl text-gray-700 bg-white rounded-full shadow-lg p-2 focus:outline-none">
                &#10095;
            </button>

            <!-- Dots Indicator -->
            <div class="absolute bottom-0 left-0 right-0 flex justify-center space-x-2 p-4">
                <template x-for="(slide, index) in slides" :key="index">
                    <button @click="activeSlide = index"
                        :class="{ 'bg-blue-600': activeSlide === index, 'bg-gray-300': activeSlide !== index }"
                        class="w-3 h-3 rounded-full"></button>
                </template>
            </div>
        </div>
    </section>

</x-guest-layout>
