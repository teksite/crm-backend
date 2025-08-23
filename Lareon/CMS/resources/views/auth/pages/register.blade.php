<x-lareon::auth-layout>
    @section('title',__('registration'))
    <div class="p-3">
        <div class="flex items-center justify-center gap-3 mb-6">
            <i class="tkicon fill-none block text-center" data-icon="users" size="32"></i>
            <h1 class="text-center !mb-0 text-xl">{{__('registration')}}</h1>
        </div>
        <hr class="my-6 border-zinc-300">
        <form method="POST" action="{{ route('register') }}" class="formAction">
            @csrf
            <div>
                <div class="grid gap-3 lg:grid-cols-2">
                    <div class="mb-3">
                        <x-lareon::input.label class="" for="name" :title="__('full name').'/'.__('company name')" :required="true"/>
                        <x-lareon::input.text id="name" class="block w-full" type="text" name="name" :value="old('name')"  :required="true"/>
                        <x-lareon::input.error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <div class="mb-3">
                        <x-lareon::input.label class="" for="username" :title="__('username')"/>
                        <x-lareon::input.text id="name" class="block w-full" type="text" name="username" :value="old('username')" :required="true"/>
                        <x-lareon::input.error :messages="$errors->get('username')" class="mt-2"/>
                    </div>

                </div>
                <div class="">

                    <div class="mb-3">
                        <x-lareon::input.label class="" for="email" :title="__('email')" :required="true"/>
                        <x-lareon::input.text id="email" class="block w-full" type="email" name="email" :value="old('email')" :required="true"/>
                        <x-lareon::input.error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <div class="mb-3">
                        <x-lareon::input.label class="" for="phone" :title="__('phone')" :required="true"/>
                        <x-lareon::input.text id="phone" class="block w-full" type="tel" name="phone" :value="old('phone')" :required="true"/>
                        <x-lareon::input.error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>
                </div>
                <div class="grid gap-3 lg:grid-cols-2">

                    <div class="mb-3">
                        <x-lareon::input.label class="" for="password" :title="__('password')" :required="true"/>
                        <x-lareon::input.text id="password" class="block w-full" type="password" name="password" :required="true" autocomplete="new-password" />
                        <x-lareon::input.error :messages="$errors->get('password')" class="mt-2"/>
                    </div>
                    <div class="mb-3">
                        <x-lareon::input.label class="" for="password_confirmation" :title="__('password conformation')" :required="true"/>
                        <x-lareon::input.text id="password_confirmation" class="block w-full" type="password" name="password_confirmation" :required="true"  />
                        <x-lareon::input.error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                </div>
                <div class="mb-3 w-full text-left">
                    <x-lareon::button.solid class="w-full block">
                        {{__('register')}}
                    </x-lareon::button.solid>
                </div>
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
</x-lareon::auth-layout>
