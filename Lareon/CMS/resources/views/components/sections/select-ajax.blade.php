@props([
    'name', 'title', 'required' => false, 'open' => false, 'accordion' => true,
    'multiple' => false, 'selected' => [], 'model', 'dataLabel', 'dataValue', 'dataSearch', 'url'
])

@php
    $random = 'select_dynamic__'.strtolower(\Illuminate\Support\Str::random(4)).rand(1000,9999);
    $stringifiedName = arrayToDot($name);
    $data = old($stringifiedName) ?? $selected ?? [];

    $searchFields = is_array($dataSearch) ? $dataSearch : explode(',', $dataSearch);
    $columns = array_merge([$dataValue], $searchFields);

    $items = (new $model)->query()
        ->whereIn($dataValue, $data)
        ->select($columns)
        ->get();
@endphp

<div>
    <x-lareon::accordion.box :title="__($title)" :open="$open" :accordion="$accordion">
        <x-lareon::input.select
            data-value-field="{{ $dataValue }}"
            data-label-field="text"
            data-search-field="text"
            data-url="{{ $url }}"
            :multiple="$multiple"

            :name="$name"
            id="{{ $random }}"
            :required="$required"
            {{ $attributes->merge(['class' => 'ajax_select']) }}
            :multiple="$multiple"
        >
            @foreach($items as $item)
                @php
                    $labelText = collect($searchFields)
                        ->map(fn($f) => $item->{$f})
                        ->filter()
                        ->implode(' ');
                @endphp
                <option value="{{ $item->$dataValue }}" selected>{{ $labelText }}</option>
            @endforeach
        </x-lareon::input.select>
    </x-lareon::accordion.box>

    <x-lareon::input.error :messages="$errors->get($stringifiedName)"/>
</div>
