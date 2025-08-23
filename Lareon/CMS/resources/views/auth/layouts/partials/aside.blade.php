<aside class="  p-1 fixed top-0 bottom-0 start-0 w-3/4 md:w-1/2 lg:w-1/3 xl:w-1/6 transition-all duration-100 "
       :class="sidebar ? '{{is_rtl() ? 'translate-x-full' : '-translate-x-full'}} xl:translate-x-0' : 'translate-x-0 {{is_rtl() ? 'xl:translate-x-full' :'xl:-translate-x-full'}}' ">
    <div class="w-full flex flex-col justify-between p-3 py-3 rounded-lg h-full bg-white/50 backdrop-blur-lg">
        <div class="h-full overflow-auto flex flex-col gap-1">
            <div class="mb-6 flex items-center gap-1 min-h-fit h-fit">
                <div class="w-16">
                    <x-lareon::logo/>
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-1 capitalize">
                        LAREON
                    </h1>
                    <span class="text-zinc-600 font-black text-sm">
                        {{__('welcome :title' ,['title'=>'sina'])}}!
                     </span>
                </div>
            </div>
            <hr class="border-zinc-300">
            <nav class=" h-full overflow-y-auto">
                <ul class="menu space-y-6 py-6">
                    @foreach(\Lareon\CMS\App\Services\MenuService::getPanelMenu() as $menu)
                       <li>
                           <a href="{{route($menu['route'])}}" class="flex items-center gap-1 justify-start p-3 rounded-lg {{request()->routeIs($menu['route']) ? 'bg-white' : 'bg-white/50'}}">
                               <i class="tkicon" data-icon="{{$menu['icon']}}"></i>
                               {{__($menu['title'])}}
                           </a>
                       </li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <div class="px-3 pt-6 min-h-fit h-fit">
            <button class="logoutBtn flex w-full items-center justify-between min-h-fit text-red-600 cursor-pointer">
                <i class='tkicon stroke-red-600 stroke-2' data-icon='turn-off'></i>
                <span>
                    {{__('logout')}}
                </span>
            </button>
        </div>
    </div>
</aside>
