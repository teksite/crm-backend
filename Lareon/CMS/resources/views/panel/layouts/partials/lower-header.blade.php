@if(View::hasSection('header.start') || View::hasSection('header.end') )
    <div class="x-box flex flex-col sm:flex-row items-center justify-between gap-6 -mt-10 w-11/12 mx-auto" :class="{'me-12 ms-auto' : sidebar }">
        <div class="flex items-center justify-start gap-3">
            @yield('header.start')
        </div>
        <div class="flex items-center justify-end gap-3">
            @yield('header.end')
        </div>
    </div>
@endif
