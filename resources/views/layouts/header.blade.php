<header class="header">
    <div class="header__inner main-container">
        <a href="{{ route('home') }}" class="logo header__logo">
            <img class="logo__image" src="{{ asset('img/main/logo.png') }}" alt="Хирад лого">
        </a>

        <nav class="header-nav">
            <ul class="header-nav__ul">
                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Асосӣ</a>
                </li>

                <li class="header-nav__li categories-dropdown">
                    <button class="header-nav__link categories-dropdown__button">Дастабандӣ <span class="material-icons">arrow_drop_down</span></button>

                    <div class="categories-dropdown__content">
                        <ul class="categories-dropdown__list">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('categories.show', $category->slug) }}">{{ $category->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>


                <li class="header-nav__li">
                    <a href="{{ route('books.index') }}" class="header-nav__link">Ҳамаи китобҳо</a>
                </li>

                <li class="header-nav__li">
                    <a href="{{ route('categories.show', 'kitobhoi-horiji') }}" class="header-nav__link">Китобҳои хориҷӣ</a>
                </li>

                <li class="header-nav__li">
                    <a href="{{ route('authors.index') }}" class="header-nav__link">Муаллифон</a>
                </li>

                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Тамос</a>
                </li>
            </ul>
        </nav>

        <form class="header-search" action="/search" method="GET">
            <input class="header-search__input header-search__input--hidden" type="text" list="header-search-datalist" autocomplete="off" name="keyword" placeholder="Ҷӯстуҷӯ..." minlength="3" required>
            <datalist id="header-search-datalist">
                <option value="Bobur Nuridinov">
            </datalist>

            <button class="header-search__button button--transparent" type="button">
                <span class="material-icons-outlined">search</span>
            </button>
        </form>  {{-- global seach end --}}
    </div>
</header>