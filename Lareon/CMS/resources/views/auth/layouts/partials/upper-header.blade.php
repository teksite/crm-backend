<div class="p-0.5 mb-1 flex items-center justify-between bg-white/50 backdrop-blur-lg">
    <div class="min-w-fit">

    </div>
    <div class="min-w-fit flex justify-end items-center gap-6 rounded-lg px-3 py-2">
        <a href="{{route('admin.setlang')}}">
            Fa\En
        </a>
        <a href="/">
            <i class="tkicon" data-icon="world"></i>
        </a>
        @can('admin')
            <a href="{{route('admin.dashboard')}}">
                <i class="tkicon" data-icon="gear" ></i>
            </a>
        @endcan
        <button class="hover:cursor-pointer" type="button" role="switch" @click="togglesSidebar()">
            <i class="tkicon" data-icon="bar-3" ></i>
        </button>
    </div>
</div>
