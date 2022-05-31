<footer class="footer">
    <div class="footer__inner">
        <div class="footer__main">
            <div class="footer__main-inner main-container">
                <div class="footer__about">
                    <a href="{{ route('home') }}" class="logo footer__logo">
                        <img src="{{ asset('img/main/logo.png') }}" alt="Хирад лого">
                    </a>

                    <p class="footer__about-text">
                        Лаҳзае нишастан дар саҳифаи “Хирад”, ҳузур дар маҳзари андешамандони қурун ва фарзонагони замон аст. “Хирад”, маъбади аҳли илм ва меҳроби поки донишҷӯӣ ва илмомӯзӣ аст. Ҳарки аз китоб ва мутолиа бегона аст, ғариб ва бемӯнис аст.
                    </p>

                    <ul class="footer__about-socials">
                        <li>
                            <a href="https://www.facebook.com/%D0%A5%D0%B8%D1%80%D0%B0%D0%B4-106239201477539" target="_blank">
                                <img src="{{asset('img/socials/facebook.png')}}" alt="facebook">
                            </a>
                        </li>

                        <li>
                            <a href="https://www.instagram.com/khirad.21/" target="_blank">
                                <img class="instagram" src="{{asset('img/socials/instagram.png')}}" alt="instagram">
                            </a>
                        </li>

                        <li>
                            <a href="https://www.youtube.com/channel/UCnvlnva3G4JZK9qzH4fkBvQ" target="_blank">
                                <img src="{{asset('img/socials/youtube.png')}}" alt="youtube">
                            </a>
                        </li>

                        <li>
                            <a href="https://t.me/Khirad21" target="_blank">
                                <img src="{{asset('img/socials/telegram.png')}}" alt="telegram">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="footer__additional-links">
                    
                </div>

                <div class="footer__contacts">

                </div>
            </div>
        </div>

        <div class="footer__copyright">© {{ date('Y') }} Хирад. Ҳамаи ҳуқуқҳо ҳифз шудаанд.</div>
    </div>
</footer>