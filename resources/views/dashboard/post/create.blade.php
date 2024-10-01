<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <!-- Section Tambah Berita -->
    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <!-- Form Tambah Berita -->
                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Judul Berita -->
                    <div class="mb-4">
                        <label for="title" class="block text-md font-medium text-gray-700">Judul Berita</label>
                        <input type="text" name="title" id="title" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                            placeholder="Masukkan judul berita" value="{{ old('title') }}">

                        @error('title')
                            <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Berita -->
                    <div class="mb-4">
                        <label for="status" class="block text-md font-medium text-gray-700">Status Berita</label>
                        <select name="status" id="status" required
                            class="text-gray-500 mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]">
                            <option selected disabled>Status postingan</option>
                            <option value="Terbit" {{ old('status') === 'Terbit' ? 'selected' : '' }}>Terbit</option>
                            <option value="Arsip" {{ old('status') === 'Arsip' ? 'selected' : '' }}>Arsip</option>
                        </select>

                        @error('status')
                            <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="{ imagePreview: null }" class="mb-4">
                        <label for="image" class="block text-md font-medium text-gray-700 mb-2">Gambar Berita</label>

                        <input id="image" type="file" name="image"
                            class="block w-full text-gray-500 mt-1 border border-gray-300 rounded-md shadow-sm focus:border focus:border-[#141652] file:mr-4 file:py-2.5 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-[#141652] file:text-white hover:file:bg-blue-800 transition ease-in-out duration-200"
                            @change="if ($event.target.files.length) { 
                                const file = $event.target.files[0]; 
                                const reader = new FileReader(); 
                                reader.onload = (e) => { imagePreview = e.target.result; }; 
                                reader.readAsDataURL(file); 
                            } else { imagePreview = null; }">

                        @error('image')
                            <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                        @enderror

                        <!-- Preview Image -->
                        <div class="mt-4" x-show="imagePreview" style="display: none;">
                            <div class="overflow-auto max-w-full h-64 rounded-md shadow-md border border-gray-300">
                                <!-- Set a fixed height -->
                                <img :src="imagePreview" class="w-full h-auto" alt="Image Preview">
                            </div>
                        </div>
                    </div>


                    <!-- Isi Berita -->
                    <div class="mb-4">
                        <label for="body" class="block text-md font-medium text-gray-700 mb-1">Isi Berita</label>
                        <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                        <trix-editor
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:border focus:border-[#141652]"
                            input="body"></trix-editor>

                        @error('body')
                            <p class="text-red-500 text-md mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Aksi Berita -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('berita.index') }}"
                            class="text-md text-[#141652] hover:text-blue-800 hover:underline">Kembali Ke Daftar</a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-[#141652] rounded-md shadow-sm text-white hover:bg-blue-800">
                            Tambah Berita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
