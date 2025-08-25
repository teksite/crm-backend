<x-lareon::admin-entry-layout>
    @section('title', __(':title list',['title'=>__('departments')]))
    @section('formRoute', route('admin.departments.store'))
    @section('description', __('departments are used to categorize and organize topics and let clients to find related contents'))
    @can('admin.department.create')
        @section('form')
            <x-lareon::sections.text :title="__('title')" name="title" :placeholder="__('enter a unique :title' ,['title'=>__('title')])" :required="true"/>
        @endsection
    @endcan
    @section('list')
        <x-lareon::box>
            <x-lareon::table :headers="['id'=>'#','title'=>__('title') ,]">
                @foreach($departments as $key=>$department)
                    <tr>
                        <td class="p-3">{{$departments->firstItem() + $key}}</td>
                        <td>{{$department->title}}</td>
                        <td>
                            <div class="action">
                                <x-lareon::link.sub :href="route('admin.departments.teams.index' , $department)" can="admin.department.team.edit"/>
                                <x-lareon::link.edit :href="route('admin.departments.edit' , $department)" can="admin.department.edit"/>
                                <x-lareon::link.delete :href="route('admin.departments.destroy' , $department)" can="admin.department.delete"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-lareon::table>
            {{$departments->appends($_GET)->links()}}

        </x-lareon::box>
    @endsection

</x-lareon::admin-entry-layout>
