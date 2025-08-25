@props([
    'name',
    'title',
    'required' => false,
    'open' => false,
    'accordion' => true,
    'multiple' => false,
    'selected' => [],
    'model',
    'dataLabel',
    'dataValue',
    'dataSearch' => [], // حالا میشه آرایه باشه
    'url',
])

@php
    $random = 'select_dynamic__' . strtolower(\Illuminate\Support\Str::random(4)) . rand(1000, 9999);
    $stringifiedName = arrayToDot($name);
    $data = old($stringifiedName, $selected ?? []);

    $items = $model::query()
        ->whereIn($dataValue, (array)$data)
        ->get([$dataValue, $dataLabel]);
@endphp

<div>
    <x-lareon::accordion.box :title="__($title)" :open="$open" :accordion="$accordion" :required="$required">
        <select
            id="{{ $random }}"
            name="{{ dotToArray($stringifiedName) }}{{ $multiple ? '[]' : '' }}"
            {{ $multiple ? 'multiple' : '' }}
            data-url="{{ $url }}"
            data-label-field="{{ $dataLabel }}"
            data-value-field="{{ $dataValue }}"
            data-search-field="{{ is_array($dataSearch) ? implode(',', $dataSearch) : $dataSearch }}"
            {{ $attributes->merge(['class' => 'ajax_select w-full border rounded p-2']) }}
        >
            @foreach($items as $item)
                <option value="{{ $item->{$dataValue} }}" selected>
                    {{ $item->{$dataLabel} }}
                </option>
            @endforeach
        </select>
    </x-lareon::accordion.box>

    <x-lareon::input.error :messages="$errors->get($stringifiedName)"/>
</div>
