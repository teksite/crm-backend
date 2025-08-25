<x-lareon::admin-entry-layout>
    @section('title', __(':title list',['title'=>__('teams')]))
    @section('formRoute', route('admin.departments.teams.store' , $department))
    @section('description', __('departments are used to categorize and organize topics and let clients to find related contents'))
    @can('admin.department.create')
        @section('form')
            <x-lareon::sections.text :title="__('title')" name="title" :placeholder="__('enter a unique :title' ,['title'=>__('title')])" :required="true"/>
        @endsection
    @endcan
    @section('list')
        <x-lareon::box>
            <x-lareon::table :headers="['id'=>'#','title'=>__('title') ,]">
                @foreach($teams as $key=>$team)
                    <tr>
                        <td class="p-3">{{$teams->firstItem() + $key}}</td>
                        <td>{{$team->title}}</td>
                        <td>
                            <div class="action">
                                <x-lareon::link.edit :href="route('admin.departments.teams.edit' , [$department,$team])" can="admin.department.team.edit"/>
                                <x-lareon::link.delete :href="route('admin.departments.teams.destroy' , [$department,$team])" can="admin.department.team.delete"/>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </x-lareon::table>
            {{$teams->appends($_GET)->links()}}

        </x-lareon::box>
    @endsection

</x-lareon::admin-entry-layout>
