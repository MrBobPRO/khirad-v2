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


// scroll top button
document.querySelector('#scroll-top-button').addEventListener('click', () => {
    document.body.scrollIntoView({ block: 'start', behavior: 'smooth' });
})


// Header search
document.querySelector('#header-search-button').addEventListener('click', () => {
    let input = document.querySelector('#header-search-input');

    // submit form if value is givven
    if (!input.classList.contains('header-search__input--hidden') && input.value.length > 2) {
        document.querySelector('#header-search-form').submit();
    // else hide search input
    } else {
        input.classList.toggle('header-search__input--hidden');
        input.focus();
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


// google maps
if (document.querySelector('#map')) {
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 38.578065, lng: 68.750778},
            zoom: 16,
            mapTypeControl: false,
            streetViewControl: false
      });
    
      marker = new google.maps.Marker({
        map: map,
        draggable: false,
        animation: google.maps.Animation.BOUNCE,
        position: {lat: 38.578065, lng: 68.750778},
            icon: '/img/main/marker.png'
      });
      marker.addListener('click', toggleBounce);
    }
    
    function toggleBounce() {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }   
}


// --------------Accordion start----------------
document.querySelectorAll('.accordion__button').forEach((item) => {
    item.addEventListener('click', (evt) => {
        let button = evt.target;
        let parent = button.closest('.accordion__item');
        let accordion = button.closest('.accordion');
        let collapse = parent.getElementsByClassName('accordion__collapse')[0];

        // close any other active collapses
        let activeCollapses = accordion.getElementsByClassName('accordion__collapse--show');
        for (i = 0; i < activeCollapses.length; i ++) {
            if (activeCollapses[i] !== collapse) { // remove active class from collapse button
                let activeCollapseParent = activeCollapses[i].closest('.accordion__item');
                let activeButton = activeCollapseParent.getElementsByClassName('accordion__button')[0];
                activeButton.classList.remove('accordion__button--active');
                // remove show class from collapse
                activeCollapses[i].style.height = null;
                activeCollapses[i].classList.remove('accordion__collapse--show');
            }
        }

        // hide collapse body if its active
        if (collapse.clientHeight) {
            collapse.style.height = 0;
            collapse.classList.remove('accordion__collapse--show');
            button.classList.remove('accordion__button--active');
        // else show collapse body if its hidden
        } else {
            collapse.style.height = collapse.scrollHeight + "px";
            collapse.classList.add('accordion__collapse--show');
            button.classList.add('accordion__button--active');
        }
    });
});
// --------------Accordion end----------------