<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Berita :') }} <span class="text-blue-200">{{ substr($post->title, 0, 10) }}</span>
        </h2>
    </x-slot>

    <!-- Section Show Post -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <div class="flex flex-col sm:flex-row justify-between items-center mb-4">
                    <div class="mb-2 sm:mb-0">
                        @if ($post->status == 'Arsip')
                            <span
                                class="inline-flex items-center font-bold bg-gradient-to-r from-orange-500 to-orange-600 text-white px-4 py-2 rounded-full shadow-lg text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm0 2a10 10 0 100-20 10 10 0 000 20z" />
                                </svg>
                                {{ $post->status }}
                            </span>
                        @elseif($post->status == 'Terbit')
                            <span
                                class="inline-flex items-center font-bold bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-full shadow-lg text-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M10 18a8 8 0 100-16 8 8 0 000 16zm0 2a10 10 0 100-20 10 10 0 000 20z" />
                                </svg>
                                {{ $post->status }}
                            </span>
                        @endif
                    </div>
                    <div class="space-x-1">
                        <a href="{{ route('berita.index') }}"
                            class="inline-flex items-center bg-blue-600 text-white px-3 py-2 rounded-lg shadow hover:bg-blue-500 transition duration-200 ease-in-out">
                            Kembali
                        </a>
                        <a href="{{ route('berita.edit', $post->slug) }}"
                            class="inline-flex items-center bg-yellow-600 text-white px-3 py-2 rounded-lg shadow hover:bg-yellow-500 transition duration-200 ease-in-out">
                            Ubah
                        </a>
                        <form action="{{ route('berita.destroy', $post->slug) }}" method="POST" class="inline-flex">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center bg-red-600 text-white px-3 py-2 rounded-lg shadow hover:bg-red-500 transition duration-200 ease-in-out">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
                <article>
                    <!-- Post Image -->
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Berita"
                        class="w-full h-full object-cover rounded-lg mb-4">
                    <!-- Post Metadata -->
                    <h1 class="text-2xl font-bold text-gray-800">
                        {{ $post->title }}
                    </h1>
                    <h3 class="text-sm text-gray-600 mb-4">Dibuat :
                        {{ $post->user->name }} | {{ $post->created_at->diffForHumans() }}
                    </h3>
                    <!-- Post Content -->
                    <p>{!! $post->body !!}</p>
                </article>
            </div>
        </div>
    </div>

</x-app-layout>
