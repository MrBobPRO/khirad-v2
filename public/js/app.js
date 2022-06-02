// initialize components
$(document).ready(function () {
    $('.selectize-singular').selectize({
        //options
    });

    $('.selectize-singular-linked').selectize({
        onChange(value) {
            window.location = value;
        }
    });

    $('.jq-select').styler();
});


// Ajax CSRF-Token initialization
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


// most readable carousel
if (document.querySelector('#most-readable-books-carousel')) {
    let mostReadableBooksCarousel = $('#most-readable-books-carousel').owlCarousel({
        margin: 16,
        loop: true,
        dots: false,
        autoplay: false,
        autoplayHoverPause: true,
        autoplaySpeed: 4000,
        autoplayTimeout: 7000,
        responsive: {
            0: {
                items: 1,
                autoWidth: false,
            },
            991: {
                autoWidth: true,
                items: 3,
            }
        }
    });

    document.querySelector('#most-readable-books-carousel-prev-button').addEventListener('click', () => {
        mostReadableBooksCarousel.trigger('prev.owl.carousel');
    })

    document.querySelector('#most-readable-books-carousel-next-button').addEventListener('click', () => {
        mostReadableBooksCarousel.trigger('next.owl.carousel');
    })
}
