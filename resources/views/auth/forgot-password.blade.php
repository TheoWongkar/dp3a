<x-guest-layout>
    <!-- Section Lupa Password -->
    <div class="flex items-center justify-center min-h-screen bg-gray-100 p-4 sm:p-0">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <!-- Logo Aplikasi -->
            <div class="flex justify-center mb-4">
                <x-application-logo class="h-16 w-16"></x-application-logo>
            </div>

            <!-- Informative Message -->
            <div class="mb-4 text-sm text-gray-600">
                {{ __('Lupa kata sandi Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan email berisi tautan pengaturan ulang kata sandi sehingga Anda dapat memilih yang baru.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Tombol Submit -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Email Password Reset Link') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
