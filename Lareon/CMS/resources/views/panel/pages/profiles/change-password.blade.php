<x-lareon::panel-layout type="update">
    @section('title', __('change password'))
    @section('description', __('in this window you can set a new password'))
    @section('header.end')
        <x-lareon::panel.profile-menu />
    @endsection
    <section class="w-11/12 md:2-3/4 mx-auto my-6">
        <x-lareon::box>
            <form method="POST" action="{{ route('panel.profile.password.update') }}">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <x-lareon::input.label for="password" :title="__('current password')" class="mb-3"/>
                    <x-lareon::input.text id="password" class="block w-full" type="password" name="old_password" autocomplete="current-password" required="required"/>
                    <x-lareon::input.error :messages="$errors->get('old_password')" class="mt-2"/>
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
                <div class="flex justify-end">
                    <x-lareon::button.solid>
                        {{ __('confirm') }}
                    </x-lareon::button.solid>
                </div>
            </form>
        </x-lareon::box>
    </section>
</x-lareon::panel-layout>
