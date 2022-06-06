@extends('layouts.app')
@section('main')

<div class="main__inner books-show-page">
    <section class="books-info">
        <div class="books-info__inner main-container">
            <div class="books-info__image-container">
                <figure class="books-info__figure shiny-effect">
                    <img class="books-info__image" src="{{ asset('img/books/' . $book->image) }}" alt="{{ $book->title }}">
                </figure>
            </div>

            <div class="books-info__main">
                <h1 class="books-info__title">{{ $book->title }} |
                    @foreach ($book->authors as $author)
                        {{ $author->name }}
                    @endforeach
                </h1>
                <p class="book-info__description">{{ $book->description }}</p>

                <table class="book-properties-table">
                    <tbody>
                        <tr>
                            <th>Нарх:</th>
                            <td class="main-color text-bold">{{ $book->price == '0' ? 'Ройгон' : $book->price }}</td>
                        </tr>
    
                        <tr>
                            <th>Муаллиф:</th>
                            <td>
                                @foreach ($book->authors as $author)
                                    <a href="#">
                                        {{ $author->name }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
    
                        <tr>
                            <th>Ношир:</th>
                            <td>{{ $book->publisher }}</td>
                        </tr>
    
                        <tr>
                            <th>Соли табъ:</th>
                            <td>{{ $book->publish_year }}</td>
                        </tr>

                        <tr>
                            <th>Дастабандӣ:</th>
                            <td>
                                @foreach ($book->categories as $category)
                                    <a href="{{ route('categories.show', $category->slug) }}">
                                        {{ $category->title }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Шумори саҳифаҳо:</th>
                            <td>{{ $book->pages }} саҳифа</td>
                        </tr>

                        <tr>
                            <th>Шумори мутолиа:</th>
                            <td>{{ $book->views }} маротиба</td>
                        </tr>

                        <tr>
                            <th>Ба иштирок гузоштан:</th>
                            <td>
                                <div class="ya-share2" data-curtain data-shape="round" data-services="vkontakte,facebook,telegram,twitter,viber"></div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection