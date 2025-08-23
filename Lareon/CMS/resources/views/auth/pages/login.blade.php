<x-lareon::auth-layout>
    @section('title',__('login'))
    <div class="w-full">
        <div class="flex items-center justify-center gap-3">
            <i class="tkicon fill-none block text-center" data-icon="user" size="32"></i>
            <h1 class="text-center !mb-0 text-xl">{{__('login')}}</h1>
        </div>
        <hr class="my-6 border-zinc-300">
        <form method="POST" action="{{ route('login') }}" class="formAction ">

            @csrf
            <div class="mb-6 ">
                <div class="flex items-stretch mb-3">
                    <x-lareon::input.label for="username" title="<i class='tkicon fill-none stroke-gray-700' size='20' stroke-width='2' data-icon='user'></i>"
                                         class="flex !mb-0 rounded w-fit border border-zinc-300 aspect-square p-1"/>

                    <x-lareon::input.text type="text" id="username" :value="old('email')" name="email" :title="__('username') .'/'. __('email')" class="block w-full border border-slate-600"
                                        :placeholder="__('enter your username')" :required="true"/>
                </div>
                <x-lareon::input.error :messages="$errors->get('email')" class="mt-2"/>
            </div>
            <div class="mb-6">
                <div class="flex items-stretch mb-3">
                    <x-lareon::input.label for="password" title="<i class='tkicon fill-none stroke-gray-700' size='20' stroke-width='2' data-icon='lock-closed'></i>"
                                           class="flex !mb-0 rounded w-fit border border-zinc-300 aspect-square p-1"/>
                    <x-lareon::input.text type="password" id="password" name="password" title="{{__('password')}}" :required="true" class="block w-full" placeholder="{{__('enter your password')}}"/>
                </div>
                <x-lareon::input.error :messages="$errors->get('password')" class="mt-2"/>

                @if (Route::has('password.request'))
                    <div class="flex justify-end">
                        <a href="{{route('password.request')}}" class="text-orange-600 text-xs mt-3 text-end  font-semibold">
                            {{__('do you forget your password?')}}
                        </a>
                    </div>
                @endif
            </div>
            <div class="mb-3 flex justify-start items-center gap-3">
                <x-lareon::input.checkbox id="remember" name="remember"/>
                <x-lareon::input.label for="remember" :title="__('remember me')" class="!mb-0 !text-base "/>
            </div>
          <div class="mb-3">
              <x-captcha::load />
          </div>

            <div class="">
                <x-lareon::button.solid class="block w-full">
                    {{__('sign in')}}
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


