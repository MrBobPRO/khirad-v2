@props(['books'])

<ul class="books-list">
    @foreach ($books as $book)
        <li class="books-list__item">
            <x-books-card :book="$book" />
        </li>
    @endforeach
</ul>