<header class="header">
    <div class="header__inner main-container">
        <a href="{{ route('home') }}" class="logo header__logo">
            <img src="{{ asset('img/main/logo.png') }}" alt="Хирад лого">
        </a>

        <nav class="header-nav">
            <ul class="header-nav__ul">
                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Асосӣ</a>
                </li>

                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Дастабандӣ</a>
                </li>

                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Ҳамаи китобҳо</a>
                </li>

                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Китобҳои хориҷӣ</a>
                </li>

                <li class="header-nav__li">
                    <a href="#" class="header-nav__link">Муаллифон</a>
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