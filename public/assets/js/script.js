$(document).ready(function () {
    //* header marquee script start =============
    try {
        const qtyOfElement = Math.floor($('.marquee').width() / 200) + 1;
        const marqueeContent = $('ul.marquee-content');
        $('.marquee').css(
            '--marquee-elements',
            marqueeContent.children().length,
        );

        for (let i = 0; i < qtyOfElement; i++) {
            $(marqueeContent).append(
                $(marqueeContent).children().eq(i).clone(),
            );
        }
    } catch (error) {
        console.warn(error);
    } 

    //? header marquee script end =============

    //* user left navigation active script start =======
    const leftNavOpen = () => {
        $('.main-header #btn-nav-toggle').addClass('nav-displayed');
        $('.navigation-area .nav-main').addClass('active');
        $('body').addClass('overflowY-hidden');
    };
    const leftNavClose = () => {
        $('.main-header #btn-nav-toggle').removeClass('nav-displayed');
        $('.navigation-area .nav-main').removeClass('active');
        $('body').removeClass('overflowY-hidden');
    };
    $(document).on('click', '.main-header #btn-nav-toggle', function () {
        if ($(this).hasClass('nav-displayed')) {
            leftNavClose();
        } else {
            leftNavOpen();
        }
    });
    $(document).on(
        'click',
        '.navigation-area nav.nav-main:not(dl > *)',
        function (e) {
            if (!$(e.target).is('dt *')) leftNavClose();
        },
    );
    //* user left navigation active script end =======

    $(document).on('click', '.input-group .eye-icon', function () {
        const inputId = $(this).attr('for');
        if ($(this).find('.fa-eye-slash').length) {
            $(this).html(`<i class="fa-regular fa-eye"></i>`);
            $(`#${inputId}`).attr('type', 'text');
        } else {
            $(this).html(`<i class="fa-regular fa-eye-slash"></i>`);
            $(`#${inputId}`).attr('type', 'password');
        }
    });

    // typeof NiceSelect !== 'undefined' &&
    //     NiceSelect.bind &&
    //     $.each($('select'), function (index, selector) {
    //         const id = $(selector).attr('id');
    //         const searchable = $(selector).attr('searchable');
    //         const options = {
    //             searchable: searchable == 'true' || false,
    //             placeholder: 'select',
    //             searchtext: 'Search',
    //             selectedtext: 'geselecteerd',
    //         };

    //         NiceSelect.bind(document.getElementById(id), options);
    //     });

    $(document).on('click', '.faq-section .btn-collapse', function () {
        $(this)
            .toggleClass('active')
            .closest('.card')
            .find('.card-body')
            .slideToggle();

        const svg = $(this).find('svg')[0];
        if (svg.classList.contains('fa-plus')) {
            svg.classList.remove('fa-plus');
            svg.classList.add('fa-minus');
            svg.setAttribute('data-icon', 'minus');
            svg.querySelector('path').setAttribute(
                'd',
                'M400 256H48c-17.7 0-32 14.3-32 32s14.3 32 32 32h352c17.7 0 32-14.3 32-32s-14.3-32-32-32z',
            );
        } else {
            svg.classList.remove('fa-minus');
            svg.classList.add('fa-plus');
            svg.setAttribute('data-icon', 'plus');
            svg.querySelector('path').setAttribute(
                'd',
                'M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z',
            );
        }
    });

    const onVisible = (element, callback) => {
        new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.intersectionRatio > 0) {
                    callback(element);
                    observer.disconnect();
                }
            });
        }).observe(element);
        if (!callback) return new Promise((r) => (callback = r));
    };


    if( $('.trade-counter').length > 0 ) {
        onVisible($('.trade-counter')[0], (e) => {
            $.each($('.trade-counter .item'), function () {
                const $this = $(this).find('span[value]');
                const $thisValue = +$this.attr('value');
                if (!$thisValue || $thisValue <= 0) return;

                const $startWith = $this.attr('startWith');

                let count = 0;
                let count2 = 0;
                const duration = 1500;
                const intervalTime = duration / $thisValue;

                const interval = setInterval(() => {
                    $this.text($startWith ? $startWith + count : count);
                    count++;

                    // Check if the count has reached the maximum value
                    if (count > $thisValue) {
                        clearInterval(interval);
                    }
                }, intervalTime);
            });
        });
    }

});
