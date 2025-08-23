<div class="slide {{$errors->has('code') ? 'active-slide' : ''}}" id="0" x-cloak x-show="tab===1">
    <section>
        <form method="POST" action="{{route('two-factor.login')}}" class="formAction">
            @csrf
            <div class="text-center mb-6 ">
                <x-lareon::input.label for="code" :title="__('enter the code from your authentication app')" class=""/>
                <div class="flex items-center justify-center gap-1 mt-3" dir="ltr">
                  @for($i=0 ;$i<6 ; $i++)
                        <input class="totpField totpField1 border border-zinc-300 p-1 w-12 h-12 font-bold {{$i==2 ? 'me-3' : ''}} {{$i==3 ? 'ms-3': ''}}" name="code[]" type="text"  maxlength=1 >
                  @endfor
                </div>
                <x-lareon::input.error :messages="$errors->get('code')" class="mt-2"/>
            </div>
            <div class="">
                <x-lareon::button.solid :disabled="true" id="totpFieldSubmit" class="" type="submit" rol="button" title="{{ __('confirm') }}">
                    {{ __('confirm') }}
                </x-lareon::button.solid>
            </div>
        </form>
    </section>

</div>
