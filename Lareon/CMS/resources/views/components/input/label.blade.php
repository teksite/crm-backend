@props(['title'=>null , 'required'=>false])
<label {{$attributes->merge(['class'=>'text-zinc-600 font-bold text-sm mb-1 block select-none flex items-center gap-1' ])}}>
{!! $title ?? $slot ?? '' !!}
    @if($required)
        <span class="text-red-600">*</span>
    @endif
</label>
