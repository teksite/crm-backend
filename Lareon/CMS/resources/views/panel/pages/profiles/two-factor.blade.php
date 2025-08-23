<x-lareon::panel-layout type="update"  :instance="$user">
    @section('title', __('edit the :title',['title'=>__('profile')]))
    @section('description', __('in this window you can edit your profile data'))

    @section('header.end')
        <x-lareon::panel.profile-menu />
    @endsection
    @if(auth()->user()->two_factor_secret)
        <div class="grid gap-6 lg:grid-cols-2 mb-6">
            <x-lareon::box>
                <h2>
                    {{__('two factor recovery codes')}}
                </h2>
                <p>
                    {{__('keep the following information in a secure place and DO NOT share it with anyone')}}.
                </p>
                <ul class="space-y-3 mt-3">
                    @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes , true)) as $code)
                        <li class="font-bold">{{trim($code)}}</li>
                    @endforeach
                </ul>
            </x-lareon::box>
            <x-lareon::box class="flex items-center">
                <div class="grid gap-6 md:grid-cols-2 items-center">
                    <div>
                        <h3 class="">
                            {{__('QR code')}}
                        </h3>
                        <p class="p mb-3">
                            {{__('to use the QR code, please download the Google Authenticator app on your phone and scan the code below')}}   </p>
                        <a class="regular flex gap-3 mb-3"
                           href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en&gl=US">
                            <img src="{{asset('/storage/uploads/admin/google-play-icon.png')}}" alt="{{__('google play')}}" width="25" height="25"> {{__('download')}}
                        </a>

                    </div>
                    <div class="flex items-center justify-center">
                        {!! request()->user()->twoFactorQrCodeSvg(); !!}

                    </div>
                </div>
            </x-lareon::box>
        </div>
        <x-lareon::box class="mb-6">
            <div>
                <div class="my-3">
                    <x-lareon::input.label for="phone" value="{{__('phone')}}"/>
                    <x-lareon::input.text id="phone" class="block mt-1 w-full" :disabled="true" type="text" :value="$user->phone"/>
                </div>
                <div class="my-3">
                    <x-lareon::input.label for="email" value="{{__('email')}}"/>
                    <x-lareon::input.text id="email" class="block mt-1 w-full" :disabled="true" type="text" value="{{$user->email}}"/>
                </div>
            </div>
        </x-lareon::box>
        <x-lareon::box class="mb-6">
            <form method="POST" action="{{route('two-factor.disable')}}">
                @csrf
                @method('DELETE')
                <div class="mb-3  flex flex-col md:flex-row items-center justify-between gap-6">
                    <p class="mb-0 w-full">
                        {{__('two-Factor Authentication is currently enabled. to disable it, please click the \'disable\' button')}}
                    </p>
                    <x-lareon::button.solid class="w-64">
                        {{ __('disable') }}
                    </x-lareon::button.solid>
                </div>
            </form>
        </x-lareon::box>
    @else
        <x-lareon::box>
            <form method="POST" action="{{ url('user/two-factor-authentication')}}">
                @csrf
                <div class="mb-3 flex flex-col md:flex-row items-center justify-between gap-6">
                    <p class="mb-0 w-full">
                        {{__('Two-Factor Authentication is currently disabled. To enable it, please click the \'enable\' button')}}
                    </p>
                    <x-lareon::button.solid class="w-64">
                        {{ __('enable') }}
                    </x-lareon::button.solid>
                </div>

            </form>
        </x-lareon::box>
    @endif

</x-lareon::panel-layout>
