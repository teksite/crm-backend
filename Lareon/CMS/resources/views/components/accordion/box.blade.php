@props([
    'title' => null,
    'icon' => null,
    'open' => false,
    'accordion' => true,
    'required' => false
])

@php
    $id = 'acc-box-' . rand(1000, 9999);
@endphp

<div class="x-box" @if($accordion) x-data="{ isExpanded: @js($open) }" @endif>
    @if($accordion)
        <button
            id="{{ $id }}-btn"
            type="button"
            class="flex w-full items-center justify-between gap-3 text-sm font-semibold"
            aria-controls="{{ $id }}"
            x-on:click="isExpanded = !isExpanded"
            x-bind:aria-expanded="isExpanded ? 'true' : 'false'"
        >
            <span class="flex items-center gap-1">
                {{ $title }}
               <span class="text-red-600">*</span>
            </span>
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke-width="2"
                stroke="currentColor"
                class="size-5 shrink-0 transition-transform"
                x-bind:class="isExpanded ? 'rotate-180' : ''"
                aria-hidden="true"
            >
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
            </svg>
        </button>

        <div
            x-cloak
            x-collapse
            x-show="isExpanded"
            id="{{ $id }}"
            role="region"
            aria-labelledby="{{ $id }}-btn"
            class="p-3"
        >
            <hr class="border-zinc-300 mb-3">
            {!! $slot !!}
        </div>
    @else
        @if($title)
            <h4 class="mb-2">{{ __($title) }}</h4>
        @endif
        <div id="{{ $id }}">
            {!! $slot !!}
        </div>
    @endif
</div>
