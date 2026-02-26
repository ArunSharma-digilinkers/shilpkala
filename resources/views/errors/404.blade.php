@extends('layouts.app')
@section('title', 'Page Not Found - Shilpkala')

@section('content')
<div class="pt-20">
    <div class="max-w-lg mx-auto px-4 py-16 text-center">
        <h1 class="text-8xl font-heading font-bold text-primary mb-4">404</h1>
        <h2 class="text-2xl font-heading font-semibold text-text-dark mb-4">Page Not Found</h2>
        <p class="text-dark-gray mb-8">The page you're looking for doesn't exist or has been moved.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('home') }}" class="btn-primary">Go Home</a>
            <a href="{{ route('shop.index') }}" class="btn-outline">Browse Shop</a>
        </div>
    </div>
</div>
@endsection
