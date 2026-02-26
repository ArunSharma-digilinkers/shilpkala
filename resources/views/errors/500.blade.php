@extends('layouts.app')
@section('title', 'Server Error - Shilpkala')

@section('content')
<div class="pt-20">
    <div class="max-w-lg mx-auto px-4 py-16 text-center">
        <h1 class="text-8xl font-heading font-bold text-primary mb-4">500</h1>
        <h2 class="text-2xl font-heading font-semibold text-text-dark mb-4">Something Went Wrong</h2>
        <p class="text-dark-gray mb-8">We're sorry, something unexpected happened. Please try again later.</p>
        <a href="{{ route('home') }}" class="btn-primary">Go Home</a>
    </div>
</div>
@endsection
