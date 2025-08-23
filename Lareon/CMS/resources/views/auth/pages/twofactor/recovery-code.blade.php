<div class="slide {{$errors->has('code') ? 'active-slide' : ''}}" id="0" x-cloak x-show="tab===2">
    <section>
        <form method="POST" action="{{route('two-factor.login')}}" class="formAction">
            @csrf
            <div class="text-center mb-6 ">
                <x-lareon::input.label for="code" :title="__('enter the recovery code')" class=""/>
                <div class="flex items-center justify-center gap-1 mt-3" dir="ltr">
                    <x-lareon::input.text type="text" id="recovery_code"  name="recovery_code" title="{{__('recovery code')}}"
                           class="block w-full bg-transparent px-3 py-2 focus:outline-none"
                           placeholder="{{__('enter the recovery code')}}" />
                </div>
                <x-lareon::input.error :messages="$errors->get('recovery_code')" class="mt-2"/>
            </div>
            <div class="">
                <x-lareon::button.solid  id="recoveryCodeFieldSubmit" class="" type="submit" rol="button" title="{{ __('confirm') }}">
                    {{ __('confirm') }}
                </x-lareon::button.solid>
            </div>
        </form>
    </section>

</div>
