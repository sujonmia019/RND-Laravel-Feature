<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h2 class="text-center mb-5">Two-Factor Authentication</h2>
    <form method="POST" action="{{ route('2fa.verify') }}">
        @csrf
        <div class="mb-3">
            <x-input-label for="two_factor_code" :value="__('Enter the code sent to your email:')" />

            <x-text-input id="two_factor_code" class="block mt-1 w-full"
                            type="text"
                            name="two_factor_code"
                         autocomplete="off" />

            <x-input-error :messages="$errors->get('two_factor_code')" class="mt-2" />
        </div>
        <x-primary-button>
            {{ __('Verify') }}
        </x-primary-button>
    </form>

</x-guest-layout>
