@extends('layouts.appp')


@section('content')
    <div class="max-w-5xl mx-auto">
        <livewire:post-item :post="$post" />
    </div>
 @endSection

