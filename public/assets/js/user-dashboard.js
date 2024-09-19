
window.addEventListener('load', function() {
    document.querySelectorAll('svg').forEach(function(svg) {
        svg.style.display = 'none';
        svg.offsetHeight; // trigger a reflow, flushing the CSS changes
        svg.style.display = 'block';
    });
});

//* Navigation nav-tab script ===============
document.addEventListener('click', function (e) {
    if (e.target.closest('a[data-toggle="tab"]')) {
        e.preventDefault();
        const $parent = e.target.closest('.nav-item');

        if (true) {
            const tabPane = e.target
                .closest('[data-toggle]')
                .getAttribute('href');
            console.log(tabPane);
            if (!tabPane) return;

            const navTabs = e.target.closest('.nav-tabs');
            const liElements = navTabs.querySelectorAll('li');
            liElements.forEach((li) => {
                li.classList.remove('active');
            });
            $parent.classList.add('active');

            try {
                const tabPaneElement = document.querySelector(tabPane);
                const siblings = tabPaneElement.parentNode.children;
                for (const sibling of siblings) {
                    sibling !== tabPaneElement &&
                        sibling.classList.remove('active', 'in');
                }

                tabPaneElement.classList.add('active');
                setTimeout(() => {
                    tabPaneElement.classList.add('in');
                }, 150);

                localStorage.setItem('activeLeftTab', tabPane);
            } catch (error) {
                console.warn(`Id not found ${tabPane}`);
            }
        }
    }

    if (e.target.closest('a[forward-toggle="tab"]')) {
        const target = e.target
            .closest('[forward-toggle]')
            .getAttribute('href');
        if (target)
            document
                .querySelector(`a[data-toggle="tab"][href="${target}"]`)
                ?.click();
    }
});

// nav-tab script end.

$(document).ready(function () {
    //* admin left navigation active script start =======
    const leftNavOpen = () => {
        $('#btn-nav-toggle').addClass('nav-displayed');
        $('#left-nav').addClass('active');
        $('body').addClass('overflowY-hidden');
    };
    const leftNavClose = () => {
        $('#btn-nav-toggle').removeClass('nav-displayed');
        $('#left-nav').removeClass('active');
        $('body').removeClass('overflowY-hidden');
    };
    $(document).on('click', '#btn-nav-toggle', function () {
        if ($(this).hasClass('nav-displayed')) {
            leftNavClose();
        } else {
            leftNavOpen();
        }
    });
    $(document).on('click', '#left-nav:not(ul > *)', function (e) {
        if (!$(e.target).is('ul')) leftNavClose();
    });



    //! active tab with localStorage ________________
    const activeLeftTab = $('.left-nav .nav-item.active a').attr('href');
    const activeLeftTabLocalStorage = localStorage.getItem('activeLeftTab');
    if (activeLeftTab !== activeLeftTabLocalStorage) {
        const leftActiveNav = $(
            `a[data-toggle="tab"][href="${activeLeftTabLocalStorage}"]`,
        );
        if (leftActiveNav.length) leftActiveNav[0].click();
    } else {
        console.log(activeLeftTabLocalStorage);
    } 

    

    //? active tab with localStorage

    //* attach file form control script start =========
    $(document).on(
        'change',
        '.attach-file-input-group .attach-icon input',
        function () {
            try {
                const placeholder = $(this).prev('[type="placeholder"]');
                const fileName = this.files[0].name;
                if (fileName) {
                    placeholder.text(fileName).attr('hasFile', 'true');
                }

                //* this script for "section.account-verification" start _____↓
                const isParentVerification = $(this).closest(
                    '.account-verification',
                );
                if (!isParentVerification.length) return;
                const target = $(this).closest('.attach-icon').attr('for');
                if (fileName && target) {
                    $(`.check-files-valid-grid [data-label="${target}"]`).attr(
                        'verified',
                        'true',
                    );
                } //? this script for "section.account-verification" end ________↑
            } catch (error) {
                console.warn(error);
            }
        },
    ); //? attach file form control script end ========

    //* Password show/hide icon script start ==========
    $(document).on('click', '.input-group .eye-icon', function () {
        const inputId = $(this).attr('for');
        if ($(this).find('.fa-eye-slash').length) {
            $(this).html(`<i class="fa-regular fa-eye"></i>`);
            $(`#${inputId}`).attr('type', 'text');
        } else {
            $(this).html(`<i class="fa-regular fa-eye-slash"></i>`);
            $(`#${inputId}`).attr('type', 'password');
        }
    }); //? Password show/hide icon script end =========

    //* live Chat script start ========================
    const sendMessage = () => {
        const textBox = (text, imgSrc) => {
            return `
<div class="user-text-box d-flex align-items-start g-8">
    <p class="message">${text}</p>
    <div class="icon-area d-flex justify-content-center align-items-center">
        <img class="user-icon" src="${
            imgSrc ? imgSrc : './assets/img/site-logo.png'
        }" alt="user name">
    </div>
</div>`;
        };
        const message = $('#live-chat-input');
        if (message.val()) {
            try {
                const $newElement = $(textBox(message.val())).css({
                    opacity: 0,
                });
                $('#chat-body').append($newElement);
                $newElement.animate({ opacity: 1 }, 500); // 500 is the duration in milliseconds

                $('#live-chat-section .scroll').animate(
                    {
                        scrollTop: $('#live-chat-section .scroll')[0]
                            .scrollHeight,
                    },
                    1000,
                );
                message.val('');
                message.focus();
            } catch (error) {
                console.warn(error);
            }
        }
    };
    $('#send-message').on('click', sendMessage);
    $(document).on('keypress', '#live-chat-input', function (e) {
        if (e.which === 13) sendMessage();
    });
    //* live Chat script end ===========================

    //* Payment Method collapsible script start ========
    $(document).on(
        'click',
        '[data-toggle="collapse"]:not(.active)',
        function (e) {
            e.preventDefault();
            const target = $(this).addClass('active').attr('href');
            $(target).removeClass('d-none');

            const cardList = $(this).closest('.card').siblings();
            $.each(cardList, function (index, card) {
                $(this).find('[data-toggle="collapse"]').removeClass('active');
                $(this).find('.card-body.collapse').addClass('d-none');
            });
        },
    ); //? Payment Method collapsible script end ==========

    //! Market watch collapsible script start ========
    $(document).on('click', '.market-watch-grid [data-target]', function () {
        if (!$(this).hasClass('active')) {
            const target = $(this).attr('data-target');
            $(this)
                .addClass('active')
                .siblings('a')
                .removeClass('active');
            $(`.market-watch-grid ${target}`)
                .removeClass('d-none')
                .siblings('.collapse')
                .addClass('d-none');
        }
    }); //? Market watch collapsible script end ==========
    //! Deposit area collapsible script start ========
    $(document).on(
        'click',
        '.navigation-card-group [data-target]',
        function () {
            if (!$(this).hasClass('active')) {
                const target = $(this).attr('data-target');
                $(this)
                    .addClass('active')
                    .closest('li')
                    .siblings()
                    .find('a')
                    .removeClass('active');
                $(`#payment-method-and-history ${target}`)
                    .removeClass('d-none')
                    .siblings('.collapse')
                    .addClass('d-none');
            }
        },
    ); //? Deposit area collapsible script end ==========

    //* modal script start ===============================
    $(document).on('click', '[data-toggle="modal"]', function () {
        const target = $(this).attr('href');
        $(target).fadeIn();
        $('body').addClass('overflowY-hidden');

        $(target)
            .find('.btn-modal-close')
            .click(function (e) {
                $(target).fadeOut();
                $('body').removeClass('overflowY-hidden');
            });
    });
});


$(document).on('click', '.clone-icon', function () {
    const targetId = $(this).attr('for');
    if (targetId) copyToClipboard(`#${targetId}`);
}); 


$(document).on('keyup', '.search-input-group .search-input', function (e) {
    const value = this.value.toLowerCase();
    console.log(value);
}); 


//* Data table start ========================
if( jQuery( '#trading-history-table' ).length > 0) {
    let table = new DataTable('#trading-history-table', {
        responsive: true,
        initComplete: function () {
            // Access the search input field and set a placeholder
            const searchInput = document.querySelector(
                '[type="search"][aria-controls="trading-history-table"]',
            );
            if (searchInput) {
                searchInput.placeholder = 'Search for trade etc...';
                searchInput.previousSibling.innerHTML = `<i class="fa-solid fa-magnifying-glass"></i>`;
                searchInput.previousSibling.classList.add(
                    'trading-history-table-label',
                );

                const btn =
                    '<a class="btn w-max" id="btn-download-trading-history"><i class="fa-solid fa-download"></i>&nbsp;Print As PDF</a>';
                searchInput.parentNode.insertAdjacentHTML('beforeend', btn);
            }
        },
    });
}

//* Data table end ==========================




// when user click yes on first popup
jQuery(document).on( 'click',  '.btn-confirm-deposit', function() {
    var payment_method_id = jQuery(this).data('gatewayid');
    jQuery('#depositSecondModal').show();
    jQuery('#depositSecondModal').find('.confirm-deposit-success').data('gatewayid', payment_method_id );
});

// when user click no on second popup
jQuery(document).on( 'click',  '.deposit-use-bitcoin', function() {
    var bitcoin_tab_id = jQuery(this).data('bitcointabid');
    jQuery('#depositSecondModal').hide();
    jQuery('.deposit-'+bitcoin_tab_id).trigger('click');
});

// when user click yes on second popup
jQuery(document).on( 'click',  '.confirm-deposit-success', function() {
    var payment_method_id = jQuery(this).data('gatewayid');
    window.location.href = 'deposit-transfer/'+payment_method_id;
});







// // for updating data on the site main nav home page 
//     const options = {
//       method: 'GET',
//       headers: {accept: 'application/json', 'x-cg-pro-api-key': 'CG-1zNLqMpJkTYvoZH93HsJUUEJ'}
//     };
//     // const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
//     const apiUrl = 'crypto.json';

//     var main_nav_li = '';
//     fetch(apiUrl, options)
//         .then(response => {
//             if (!response.ok) {
//              // Error('Network response was not ok');
//                 return false;
//            }
//             return response.json();  
//         })
//         .then(data => {

//             console.log( );

            


//         })
//         .catch(error => {
//             console.error('There was a problem with the fetch operation:', error);
//         });












