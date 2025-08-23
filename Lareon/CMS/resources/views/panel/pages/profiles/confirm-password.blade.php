<x-lareon::panel-layout type="update">
    @section('title', __('confirm password'))
    @section('description', __('to continue, please enter your password'))

    <section class="w-11/12 md:2-3/4 mx-auto my-6">
        <x-lareon::box>
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf
                <div class="mb-3">
                    <x-lareon::input.label for="password" :title="__('your password is required to proceed')" class="mb-3"/>
                    <x-lareon::input.text id="password" class="block w-full" type="password" name="password" autocomplete="current-password" required="required"/>
                    <x-lareon::input.error :messages="$errors->get('password')" class="mt-2"/>
                </div>
                <div class="flex justify-end">
                    <x-lareon::button.solid>
                        {{ __('confirm') }}
                    </x-lareon::button.solid>
                </div>
            </form>
        </x-lareon::box>
    </section>
</x-lareon::panel-layout>
