@props(['type'=>'text' , "disabled"=>false ,'required'=>false])
@php
$class=$disabled ? 'text-zinc-300 cursor-not-allowed' : ''
@endphp
<textarea {{$disabled ? 'disabled':''}} {{$attributes->merge(['class'=>"w-full border border-zinc-300 px-3 py-1 rounded focus:outline-2 focus:outline-blue-600 bg-transparent block w-full $class" ])}} @required($required)>{{$slot ?? ''}}</textarea>
