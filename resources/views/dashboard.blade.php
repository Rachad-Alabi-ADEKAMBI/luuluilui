@extends ('./layouts/app');

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
</x-app-layout>

<main class="main">
    <div class="row">
        <div class="text text-center">
            <p>
                Bonjour mr <strong> {{ Auth::user()->name }}</strong>, content de vous revoir
            </p>
        </div>
    </div>
    @section('content')
    <h1>About</h1>
    <about />
    @endsection


    <div class="" id="DashbaordAdmin">
        <DashboardAdmin />
    </div>
</main>