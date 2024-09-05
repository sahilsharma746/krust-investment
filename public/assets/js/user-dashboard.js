//* common script for admin panel =======
typeof NiceSelect !== 'undefined' &&
    NiceSelect.bind &&
    $.each($('select'), function (index, selector) {
        const id = $(selector).attr('id');
        const searchable = $(selector).attr('searchable');
        const options = {
            searchable: searchable == 'true' || false,
            placeholder: 'select',
            searchtext: 'Search',
            selectedtext: 'geselecteerd',
        };

        NiceSelect.bind(document.getElementById(id), options);
    });

    

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
    //* admin left navigation active script end =======

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
    } //? active tab with localStorage
    //* admin left navigation active script end =======

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

    //* modal script end =================================
});

//* copy to clipboard area start ========================
// const copyToClipboard = (id) => {
//     // Get the input field
//     var copyText = document.querySelector(id);

//     if (!copyText) {
//         console.warn('Element not found', id);
//         return;
//     }

//     // Create a temporary textarea element to hold the text
//     var tempTextArea = document.createElement('textarea');
//     tempTextArea.value = copyText.value;
//     document.body.appendChild(tempTextArea);

//     // Select the text in the textarea
//     tempTextArea.select();
//     tempTextArea.setSelectionRange(0, tempTextArea.value.length); // For mobile devices

//     try {
//         // Copy the text to the clipboard
//         var successful = document.execCommand('copy');
//         if (successful) {
//             alert('Copied the text: ' + tempTextArea.value);
//         } else {
//             console.error('Failed to copy text');
//         }
//     } catch (err) {
//         console.error('Could not copy text: ', err);
//     }

//     // Remove the temporary textarea element
//     document.body.removeChild(tempTextArea);
// };


$(document).on('click', '.clone-icon', function () {
    const targetId = $(this).attr('for');
    if (targetId) copyToClipboard(`#${targetId}`);
}); //? copy to clipboard area end =====================

//* search script area start ==========================
$(document).on('keyup', '.search-input-group .search-input', function (e) {
    const value = this.value.toLowerCase();
    console.log(value);
}); //? search script area end ============================

//* Chart JS start ==========================
const chartOptions = {
    series: [
        {
            data: [
                {
                    x: new Date(1538778600000),
                    y: [6629.81, 6650.5, 6623.04, 6633.33],
                },
                {
                    x: new Date(1538780400000),
                    y: [6632.01, 6643.59, 6620, 6630.11],
                },
                {
                    x: new Date(1538782200000),
                    y: [6630.71, 6648.95, 6623.34, 6635.65],
                },
                {
                    x: new Date(1538784000000),
                    y: [6635.65, 6651, 6629.67, 6638.24],
                },
                {
                    x: new Date(1538785800000),
                    y: [6638.24, 6640, 6620, 6624.47],
                },
                {
                    x: new Date(1538787600000),
                    y: [6624.53, 6636.03, 6621.68, 6624.31],
                },
                {
                    x: new Date(1538789400000),
                    y: [6624.61, 6632.2, 6617, 6626.02],
                },
                {
                    x: new Date(1538791200000),
                    y: [6627, 6627.62, 6584.22, 6603.02],
                },
                {
                    x: new Date(1538793000000),
                    y: [6605, 6608.03, 6598.95, 6604.01],
                },
                {
                    x: new Date(1538794800000),
                    y: [6604.5, 6614.4, 6602.26, 6608.02],
                },
                {
                    x: new Date(1538796600000),
                    y: [6608.02, 6610.68, 6601.99, 6608.91],
                },
                {
                    x: new Date(1538798400000),
                    y: [6608.91, 6618.99, 6608.01, 6612],
                },
                {
                    x: new Date(1538800200000),
                    y: [6612, 6615.13, 6605.09, 6612],
                },
                {
                    x: new Date(1538802000000),
                    y: [6612, 6624.12, 6608.43, 6622.95],
                },
                {
                    x: new Date(1538803800000),
                    y: [6623.91, 6623.91, 6615, 6615.67],
                },
                {
                    x: new Date(1538805600000),
                    y: [6618.69, 6618.74, 6610, 6610.4],
                },
                {
                    x: new Date(1538807400000),
                    y: [6611, 6622.78, 6610.4, 6614.9],
                },
                {
                    x: new Date(1538809200000),
                    y: [6614.9, 6626.2, 6613.33, 6623.45],
                },
                {
                    x: new Date(1538811000000),
                    y: [6623.48, 6627, 6618.38, 6620.35],
                },
                {
                    x: new Date(1538812800000),
                    y: [6619.43, 6620.35, 6610.05, 6615.53],
                },
                {
                    x: new Date(1538814600000),
                    y: [6615.53, 6617.93, 6610, 6615.19],
                },
                {
                    x: new Date(1538816400000),
                    y: [6615.19, 6621.6, 6608.2, 6620],
                },
                {
                    x: new Date(1538818200000),
                    y: [6619.54, 6625.17, 6614.15, 6620],
                },
                {
                    x: new Date(1538820000000),
                    y: [6620.33, 6634.15, 6617.24, 6624.61],
                },
                {
                    x: new Date(1538821800000),
                    y: [6625.95, 6626, 6611.66, 6617.58],
                },
                {
                    x: new Date(1538823600000),
                    y: [6619, 6625.97, 6595.27, 6598.86],
                },
                {
                    x: new Date(1538825400000),
                    y: [6598.86, 6598.88, 6570, 6587.16],
                },
                {
                    x: new Date(1538827200000),
                    y: [6588.86, 6600, 6580, 6593.4],
                },
                {
                    x: new Date(1538829000000),
                    y: [6593.99, 6598.89, 6585, 6587.81],
                },
                {
                    x: new Date(1538830800000),
                    y: [6587.81, 6592.73, 6567.14, 6578],
                },
                {
                    x: new Date(1538832600000),
                    y: [6578.35, 6581.72, 6567.39, 6579],
                },
                {
                    x: new Date(1538834400000),
                    y: [6579.38, 6580.92, 6566.77, 6575.96],
                },
                {
                    x: new Date(1538836200000),
                    y: [6575.96, 6589, 6571.77, 6588.92],
                },
                {
                    x: new Date(1538838000000),
                    y: [6588.92, 6594, 6577.55, 6589.22],
                },
                {
                    x: new Date(1538839800000),
                    y: [6589.3, 6598.89, 6589.1, 6596.08],
                },
                {
                    x: new Date(1538841600000),
                    y: [6597.5, 6600, 6588.39, 6596.25],
                },
                {
                    x: new Date(1538843400000),
                    y: [6598.03, 6600, 6588.73, 6595.97],
                },
                {
                    x: new Date(1538845200000),
                    y: [6595.97, 6602.01, 6588.17, 6602],
                },
                {
                    x: new Date(1538847000000),
                    y: [6602, 6607, 6596.51, 6599.95],
                },
                {
                    x: new Date(1538848800000),
                    y: [6600.63, 6601.21, 6590.39, 6591.02],
                },
                {
                    x: new Date(1538850600000),
                    y: [6591.02, 6603.08, 6591, 6591],
                },
                {
                    x: new Date(1538852400000),
                    y: [6591, 6601.32, 6585, 6592],
                },
                {
                    x: new Date(1538854200000),
                    y: [6593.13, 6596.01, 6590, 6593.34],
                },
                {
                    x: new Date(1538856000000),
                    y: [6593.34, 6604.76, 6582.63, 6593.86],
                },
                {
                    x: new Date(1538857800000),
                    y: [6593.86, 6604.28, 6586.57, 6600.01],
                },
                {
                    x: new Date(1538859600000),
                    y: [6601.81, 6603.21, 6592.78, 6596.25],
                },
                {
                    x: new Date(1538861400000),
                    y: [6596.25, 6604.2, 6590, 6602.99],
                },
                {
                    x: new Date(1538863200000),
                    y: [6602.99, 6606, 6584.99, 6587.81],
                },
                {
                    x: new Date(1538865000000),
                    y: [6587.81, 6595, 6583.27, 6591.96],
                },
                {
                    x: new Date(1538866800000),
                    y: [6591.97, 6596.07, 6585, 6588.39],
                },
                {
                    x: new Date(1538868600000),
                    y: [6587.6, 6598.21, 6587.6, 6594.27],
                },
                {
                    x: new Date(1538870400000),
                    y: [6596.44, 6601, 6590, 6596.55],
                },
                {
                    x: new Date(1538872200000),
                    y: [6598.91, 6605, 6596.61, 6600.02],
                },
                {
                    x: new Date(1538874000000),
                    y: [6600.55, 6605, 6589.14, 6593.01],
                },
                {
                    x: new Date(1538875800000),
                    y: [6593.15, 6605, 6592, 6603.06],
                },
                {
                    x: new Date(1538877600000),
                    y: [6603.07, 6604.5, 6599.09, 6603.89],
                },
                {
                    x: new Date(1538879400000),
                    y: [6604.44, 6604.44, 6600, 6603.5],
                },
                {
                    x: new Date(1538881200000),
                    y: [6603.5, 6603.99, 6597.5, 6603.86],
                },
                {
                    x: new Date(1538883000000),
                    y: [6603.85, 6605, 6600, 6604.07],
                },
                {
                    x: new Date(1538884800000),
                    y: [6604.98, 6606, 6604.07, 6606],
                },
            ],
        },
    ],
    chart: {
        type: 'candlestick',
        height: '100%',
    },
    title: {
        text: 'Market Watch',
        align: 'left',
    },
    xaxis: {
        type: 'datetime',
        // tickAmount: 5,
    },
    yaxis: {
        tooltip: {
            enabled: true,
        },
        reversed: true,
        labels: {
            show: true,
        },
        opposite: true,
        // tickAmount: 20,
    },
    grid: {
        borderColor: '#ffffff10',
        strokeDashArray: 0,
        xaxis: {
            lines: {
                show: true,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    zoom: {
        enabled: true,
    },
};






if( jQuery( '#trading-history-table' ).length > 0) {
    const chart = new ApexCharts(
        document.querySelector('#market-watch-chart'),
        chartOptions,
    );
    chart.render();
}

//* Chart JS end ==========================

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


$(document).on('click', '#btn-download-trading-history', function () {
    console.log('Downloading init...');
});

//* Data table end ==========================
