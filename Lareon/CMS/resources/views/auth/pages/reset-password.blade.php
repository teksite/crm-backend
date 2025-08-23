<x-lareon::auth-layout-second>
    @section('title',__('reset password'))
    <div class="p-3 w-full">
        <div class="flex items-center justify-center gap-3 mb-6">
            <i class="tkicon fill-none block text-center" data-icon="password" size="32"></i>
            <h1 class="text-center !mb-0 text-xl">{{__('reset password form')}}</h1>
        </div>
        <hr class="my-6 border-zinc-300">
        <form method="POST" action="{{ route('password.update') }}" class="formAction">
            @csrf
            <input type="hidden" name="token" value="{{ request()->route('token') }}">
            <div class="mb-3">
                <x-lareon::input.label class="text-white" for="email" :title="__('email')"/>
                <x-lareon::input.text id="email" readonly class="block w-full" type="email" name="email" :value="old('email', request()->email)" :required="true" autofocus dir="ltr" autocomplete="username"/>
                <x-lareon::input.error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <x-lareon::input.label class="text-white" for="password" :title="__('new password')"/>
                <x-lareon::input.password id="password" class="block w-full" type="password" name="password" :required="true" autocomplete="new-password"/>
                <x-lareon::input.error :messages="$errors->get('password')" class="mt-2"/>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <x-lareon::input.label class="text-white" for="password_confirmation" :title="__('confirm new password')"/>
                <x-lareon::input.password id="password_confirmation" class="block w-full" type="password" name="password_confirmation" :required="true" autocomplete="new-password"/>
                <x-lareon::input.error :messages="$errors->get('password_confirmation')" class="mt-2"/>
            </div>

            <div class="flex items-center justify-end mb-3">

                <x-lareon::button.solid class="capitalize">
                    {{ __('reset password') }}
                </x-lareon::button.solid>
            </div>
        </form>
        <div class="flex justify-between items-center gap-3 mt-6">
            <div>
                @if (Route::has('login'))
                    <a href="{{route('login')}}" class="text- underline underline-offset-2 font-bold">
                        {{__('i have an account')}}
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
</x-lareon::auth-layout-second>


