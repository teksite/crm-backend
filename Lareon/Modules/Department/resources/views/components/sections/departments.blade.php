@props(['open'=>true ,'value'=>[]])
@php
    $preTags =count($value) ? $value : [];
    $departments=collect($preTags)->merge(\Lareon\Modules\Department\App\Models\Department::query()->cursor()->pluck('title')->toArray())->unique()
@endphp
<div>
    <x-lareon::accordion.box :title="__('departments')" :open="$open">
        <select aria-label="{{__('departments')}}" id="departments-box" class="block w-full select-box" name="departments[]" multiple data-creation="true" data-plugin="remove_button">
            @foreach($departments as $department)
                <option {{ in_array($department , $preTags) ? 'selected': ''}}  value="{{$department}}">
                    {{$department}}
                </option>
            @endforeach
        </select>
    </x-lareon::accordion.box>
    <x-lareon::input.error :messages="$errors->get('departments')" class="mt-2"/>
</div>
