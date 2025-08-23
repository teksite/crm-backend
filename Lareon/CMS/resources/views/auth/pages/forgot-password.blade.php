<x-lareon::auth-layout>
    @section('title',__('request resetting password'))

    <div class="w-full">
        <div class="flex items-center justify-center gap-3 mb-6">
            <i class="tkicon fill-none block text-center" data-icon="key" size="32"></i>
            <h1 class="text-center !mb-0 text-xl"> {{__('reset password form')}}</h1>
        </div>
        <p class="mb-6 text-sm">
            {{ __('to reset your password, fill the below field. we will be sent you an reset password link') }}
        </p>
        <hr class="my-6 border-zinc-300">
        <form method="POST" action="{{ route('password.request') }}" class="formAction">
                @csrf
                <div class="mb-3">
                    <x-lareon::input.label for="email" :title="__('email')"/>
                    <x-lareon::input.text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" :required="true" autofocus placeholder="{{__('write your email registered when you signed up')}}"/>
                    <x-lareon::input.error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <div class="flex items-center justify-end mt-6">
                    <x-lareon::button.solid class="capitalize">
                        {{ __('send password reset link') }}
                    </x-lareon::button.solid>
                </div>
            </form>
        <div class="flex justify-between items-center gap-3 mt-6">
            <div>
                @if (Route::has('register'))
                    <a href="{{route('register')}}" class="text- underline underline-offset-2 font-bold">
                        {{__('i dont have an account')}}
                    </a>
                @endif
            </div>
            <div>
                <a href="/" class="text-sm flex items-center gap-1">
                    <i class="tkicon fill-none stroke-current" size="20" data-icon="home"></i>
                    {{__('back to home')}}
                </a>
            </div>
        </div>
    </div>
</x-lareon::auth-layout>
