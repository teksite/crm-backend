<header
    class=" w-full rounded-lg overflow-hidden bg-theme-2 bg-cover bg-no-repeat bg-fixed">
    <div class="w-full h-full p-3 min-h-64 flex items-center bg-zinc-900/75">
        <div class="" :class="{'xl:w-5/6 me-0 ms-auto' : sidebar }">
           <h2 class="mb-3 text-zinc-50">
               @yield('title' ,  __('dashboard'))
           </h2>
           <p class="text-zinc-200 font-semibold">
               @yield('description' , '')
           </p>
       </div>
    </div>
</header>
