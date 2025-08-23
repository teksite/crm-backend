<x-lareon::auth-layout-second>
    @section('title',__('two factor authentication'))

      <div class="w-full">
          <div class="flex items-center justify-center gap-3 mb-6">
              <i class="tkicon"  size="50" data-icon="lock-opened"></i>
              <h2 class="text-center">{{__('two factor authentication')}}</h2>
          </div>
          <div x-data="{tab:1}">
              <div>
                 @include('lareon::auth.pages.twofactor.totp')
                 @include('lareon::auth.pages.twofactor.recovery-code')
                  <div class="slide {{$errors->has('sent_code') ? 'active-slide' : ''}}" id="2" class="slider" x-cloak x-show="tab===3">
                      {{--                          @include('main::pages.auth.twofactor.two-factor-send-code')--}}
                      <h3 class="text-center mb-3">
                          {{__('one time password')}}
                      </h3>
                  </div>
              </div>
              <div class="dots-container">
                  <hr class="my-3">
                  <p class="text-sm font-bold text-white">{{__('other ways')}}</p>
                  <div class="flex justify-between items-center">
                      <button type="button" title="{{__('by :title',['title'=>__('TOTP')])}}" @click="tab=1"
                              class="font-semibold dot text-sm px-3 py-1 cursor-pointer" data-slide="0">
                          {{__('TOTP')}}
                      </button>
                      <button type="button" title="{{__('by :title',['title'=>__('recovery code')])}}" @click="tab=2"
                              class="font-semibold dot text-sm px-3 py-1 cursor-pointer" data-slide="1">
                          {{__('recovery code')}}
                      </button>
                      <button type="button" title="{{__('by :title',['title'=>__('one time code')])}}" @click="tab=3"
                              class="font-semibold dot text-sm px-3 py-1 cursor-pointer" data-slide="2">
                          {{__('one time password')}}
                      </button>
                  </div>
              </div>
          </div>
          <hr>
          <div class="flex justify-between items-center gap-3 mt-3 px-3">
              <div class="w-full">
                  {{--                <x-main::errors-list />--}}
              </div>
              <div class=" w-fit">
                  <a href="/"
                     class="text-sm flex items-center gap-1">
                      <i class="tkicon stroke-current fill-none" size="20" data-icon="home"></i>
                      {{__('back')}}
                  </a>
              </div>
          </div>
      </div>

</x-lareon::auth-layout-second>
