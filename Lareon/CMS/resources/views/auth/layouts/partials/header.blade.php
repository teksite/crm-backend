<header
    class=" w-full rounded-lg overflow-hidden  bg-[url(/public/uploads/tk-admin/1738641169.webp)] bg-cover bg-no-repeat">
    <div class="bg-blue-600/95 w-full h-full p-3 min-h-64 flex items-center">
        <div class="" :class="{'xl:w-5/6 me-0 ms-auto' : sidebar }">
           <h2 class="mb-3">
               @yield('title' ,  __('dashboard'))
           </h2>
           <p class="text-zinc-600 font-semibold">
               @yield('description' , '')
           </p>
       </div>
    </div>
</header>
