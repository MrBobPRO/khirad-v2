@extends('layouts.app')
@section('main')

<div class="main__inner categories-show-page">
    <section class="category-books">
        <div class="category-books__inner main-container">
            <h1 class="category-books__title  main-title">{{ $title }}</h1>
            @if($description && $description != '')
                <div class="category-books__description">
                    <span class="material-icons">info</span>
                    <p>{{ $description }}</p>
                </div>
            @endif

            <x-books-list :books="$books" />
        </div>
    </section>
</div>

@endsection