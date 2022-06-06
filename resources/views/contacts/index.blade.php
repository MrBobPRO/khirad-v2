@extends('layouts.app')
@section('main')

<div class="main__inner contacts-page">
    <section class="contacts-section">
        <div class="contacts-section__inner main-container">
            <h1 class="main-title contacts-section__title">Ба мо нависед</h1>

            <div class="contacts-form-container">
                <form class="feedback-form" action="#">
                    <div class="form-group">
                        <input class="feedback-form__input" type="text" name="name" placeholder="Номи Шумо">
                        <input class="feedback-form__input" type="text" name="email" placeholder="Почта*">
                    </div>

                    <div class="form-group">
                        <input class="feedback-form__input" type="text" name="theme" placeholder="Мавзуъ">
                    </div>

                    <div class="form-group">
                        <textarea class="feedback-form__textarea" name="body" rows="8" placeholder="Матн*"></textarea>
                    </div>

                    <button class="button button--main feedback-form__button">Фиристодан</button>
                </form>

                <div id="map"></div>
            </div>
        </div>
    </section>
</div>



@endsection