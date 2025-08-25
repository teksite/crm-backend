<x-lareon::admin-editor-layout type="update"  :instance="$department">
    @section('title', __('edit the :title',['title'=>__('department'). " ($department->title)"]))
    @section('description', __('in this window you can edit the :title' ,['title'=>__('department') . " ($department->title)"]))
    @section('formRoute', route('admin.departments.update', $department))
    @section('header.start')
        <x-lareon::link.btn-outline :href="route('admin.departments.index')" :title="__('all :title',['title'=>__('departments')])" color="index"/>
    @endsection
    @section('header.end')
        @parent
        <x-lareon::link.delete :href="route('admin.departments.destroy', $department)" can="admin.department.delete"/>
    @endsection
    @section('form')
        <x-lareon::box>
            <x-lareon::sections.text :value="$department->title" :title="__('title')" name="title" :placeholder="__('enter a unique :title',['title'=>__('title')])" :required="true"/>
        </x-lareon::box>
        <x-lareon::sections.textarea :value="$department->description" :title="__('description')" name="description" :placeholder="__('write a :title',['title'=>__('description')])" :accordion="false" :required="true"/>

    @endsection
    @section('aside')
        <x-lareon::sections.ajax.users :accordion="false" name="head_id" :title="__('head')" :multiple="false"  dataLabel="name" dataValue="id" :dataSearch="['name','lastname']" :url="route('admin.ajax.users.get')" :model="\Lareon\CMS\App\Models\User::class"/>
    @endsection
</x-lareon::admin-editor-layout>
