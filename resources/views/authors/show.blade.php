@extends('layouts.app')
@section('main')

<div class="main__inner authors-show-page">
    <section class="authors-biography-section">
        <div class="authors-biography-section__inner main-container">
            <img class="authors-biography__image" src="{{ asset('img/authors/' . $author->image) }}" alt="{{ $author->image }}">

            <div class="authors-biography__text-container">
                <h2 class="authors-biography__title">{{ $author->name }}</h2>
                <p class="authors-biography__text">{{ $author->biography }}</p>
            </div>
        </div>
    </section>

    <section class="authors-books">
        <div class="authors-books__inner main-container">
            <h1 class="main-title">Китобҳои муаллиф</h1>
            <x-books-list :books="$author->books()->paginate(30)" />
        </div>
    </section>
</div>

@endsection