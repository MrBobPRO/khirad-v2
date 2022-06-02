@extends('layouts.app')
@section('main')

<div class="main__inner home-page">
    {{-- Most Readable Books start --}}
    <section class="most-readable-books">
        <div class="most-readable-books__inner main-container">
            <div class="most-readable-books__title-container">
                <a href="#"><h1 class="secondary-title most-readable-books__title">Серхондатарин китобҳои ҷаҳон</h1></a>

                <div class="most-readable-books__navs-container">
                    <button class="most-readable-books__nav" id="most-readable-books-carousel-prev-button"><span class="material-icons-outlined">arrow_back_ios</span></button>
                    <button class="most-readable-books__nav" id="most-readable-books-carousel-next-button"><span class="material-icons-outlined">arrow_forward_ios</span></button>
                </div>
            </div>

            <div class="owl-carousel-container">
                <div class="owl-carousel most-readable-books-carousel" id="most-readable-books-carousel">
                    @foreach ($mostReadableBooks as $book)
                        <div class="most-readable-books-carousel__item horizontal-card">
                            <h2 class="horizontal-card__title">{{ $book->title }}</h2>

                            <div class="horizontal-card__row">
                                <div class="horizontal-card__text-content">
                                    <p class="horizontal-card__author">
                                        <span class="material-icons">account_circle</span> {{ $book->authors()->first()->name }}
                                    </p>
                                    <p class="horizontal-card__description">{{ $book->description }}</p>                                
                                    <a href="#" class="horizontal-card__button">
                                        Муфассал <span class="material-icons-outlined">east</span>
                                    </a>
                                </div>

                                <div class="horizontal-card__image-container">
                                    <figure class="horizontal-card__figure shiny-effect">
                                        <img class="horizontal-card__image" src="{{ asset('img/books/thumbs/' . $book->image) }}" alt="{{ $book->title }}">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>  {{-- Most Readable Books end --}}

    {{-- Home Books start --}}
    <section class="home-books">
        <div class="home-books__inner main-container">
            {{-- Extensive search start --}}
            <h1 class="extensive-search-title secondary-title">Пайдо кардани китобҳои лозима</h1>
            <div class="extensive-search">
                
            </div>  {{-- Extensive search end --}}
        </div>
    </section>  {{-- Home Books end --}}
</div>

@endsection