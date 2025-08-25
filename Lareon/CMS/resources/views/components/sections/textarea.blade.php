@props(['name' ,'title' ,'value'=>null, 'placeholder'=>null, 'required'=>false , 'type'=>'text' ,'open'=>false ,'accordion'=>true] )
@php
    $random='textarea__'.strtolower(\Illuminate\Support\Str::random(4)).rand(1000 ,9999);
    $stringifiedName=dotToArray($name);
@endphp

<x-lareon::accordion.box :title="__($title)" :open="$open" :accordion="$accordion" :requried="$required">
    <x-lareon::input.textarea :name="$name" id="{{$random}}" placeholder="{{$placeholder}}" :required="$required" {{$attributes}}>{{ $value ?? $slot ?? ''}}</x-lareon::input.textarea>
    <x-lareon::input.error :messages="$errors->get($stringifiedName)"/>
</x-lareon::accordion.box>

