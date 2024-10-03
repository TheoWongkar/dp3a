<x-guest-layout>

    <!-- Section Konten -->
    <section class="container mx-auto px-4 pt-24 pb-10 sm:px-6 lg:px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Semua Postingan -->
            <div class="md:col-span-2 space-y-8">
                <div class="bg-white rounded-lg shadow-lg border-2 overflow-hidden">
                    @foreach ($posts as $post)
                        <div class="p-6 flex items-start">
                            <div class="flex-1">
                                <h2 class="text-2xl font-bold mb-2">{{ substr($post->title, 0, 30) }}</h2>
                                <div class="text-sm mb-4">
                                    <span>{{ $post->created_at->diffForHumans() }}</span> &bull;
                                    <span>{{ $post->user->name }}</span>
                                </div>
                                <p>{!! substr($post->body, 0, 300) !!}</p>
                                <a href="{{ url('berita/post/' . $post->slug) }}"
                                    class="text-blue-500 hover:text-blue-800">Selengkapnya...</a>
                            </div>
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Berita"
                                class="w-24 h-24 object-cover aspect-square rounded-lg ml-auto">
                        </div>

                        <!-- Pembatas -->
                        <div class="border-b-2 shadow-lg w-1/2 mx-auto"></div>
                    @endforeach
                </div>
            </div>

            <!-- Postingan Terbaru -->
            <div class="bg-white rounded-lg border-2 shadow-lg p-6 flex flex-col space-y-4"
                style="max-height: 500px; overflow-y: auto;">
                <h3 class="text-xl font-bold mb-4">Berita Terbaru</h3>
                <div class="space-y-4">
                    @foreach ($posts as $post)
                        <div class="flex items-center">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Thumbnail Berita"
                                class="w-16 h-16 object-cover rounded-lg mr-4 aspect-square">
                            <div>
                                <h4 class="text-md font-semibold">{{ substr($post->title, 0, 15) }}</h4>
                                <p>{{ substr($post->body, 0, 50) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Section Pengumuman Lainnya -->
    <section class="container mx-auto my-10 px-4 sm:px-6 md:px-7 lg:px-4">
        <h1 class="text-2xl font-bold mb-4">Pengumuman Lainnya</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($announcements as $announcement)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img src="{{ asset('storage/' . $announcement->image) }}" alt="Gambar Pengumuman"
                        class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold">{{ substr($announcement->title, 0, 30) }}</h2>
                        <p class="text-gray-600">{!! substr($announcement->body, 0, 300) !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-guest-layout>
