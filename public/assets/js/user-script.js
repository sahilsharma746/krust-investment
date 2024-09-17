//* Navigation nav-tab script ===============
document.addEventListener('click', function (e) {
    if (e.target.closest('a[data-toggle="tab"]')) {
        e.preventDefault();
        const $parent = e.target.closest('.nav-item');

        if ($parent) {
            const tabPane = e.target
                .closest('[data-toggle]')
                .getAttribute('href');
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
    //* user left navigation active script start =======
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
    //* user left navigation active script end =======

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
            imgSrc ? imgSrc : 'https://dummyimage.com/40x40/f0b90b/000000'
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
        '.collapsible-card-group [data-toggle="collapse"]:not(.active)',
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

    //! Market watch collapsible script start =============
    $(document).on(
        'click',
        '.market-watch-table-indicators a.btn:not(.active)',
        function () {
            try {
                $(this).addClass('active').siblings().removeClass('active');
                const target = $(this).attr('href');
                $(`${target}`)
                    .removeClass('d-none')
                    .siblings('tbody')
                    .addClass('d-none');
            } catch (err) {
                console.warn(err);
            }
        },
    ); //? Market watch collapsible script end ============
    //! Deposit area collapsible script start =============
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
    ); //? Deposit area collapsible script end ============

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
    }); //? modal script end =================================

    $(document).on('click', '.btn-confirm-info', function () {
        const cardBody = $(
            '.user-deposit-area .collapsible-card-group .card .card-body.collapse.active',
        );
        if (cardBody.length) {
            const amount = cardBody.find('.amount').val();
            $('.depositFinishModal .modal-text').text(
                `You request has been received. Please note that we only receive bank wire transfer for payments above $${amount}. Any lesser payment must be processed via bitcoin`,
            );
        }
    });
});

//* copy to clipboard area start ========================
const copyToClipboard = (id) => {
    // Get the input field
    var copyText = document.querySelector(id);

    if (!copyText) {
        console.warn('Element not found', id);
        return;
    }

    // Create a temporary textarea element to hold the text
    var tempTextArea = document.createElement('textarea');
    tempTextArea.value = copyText.value;
    document.body.appendChild(tempTextArea);

    // Select the text in the textarea
    tempTextArea.select();
    tempTextArea.setSelectionRange(0, tempTextArea.value.length); // For mobile devices

    try {
        // Copy the text to the clipboard
        var successful = document.execCommand('copy');
        if (successful) {
            alert('Copied the text: ' + tempTextArea.value);
        } else {
            console.error('Failed to copy text');
        }
    } catch (err) {
        console.error('Could not copy text: ', err);
    }

    // Remove the temporary textarea element
    document.body.removeChild(tempTextArea);
};
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
                    y: [6632.01, 6650.59, 6620, 6630.11],
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

const userTradeChart = $('#user-trade-chart');
const tradingViewChart =
    userTradeChart.length && new ApexCharts(userTradeChart[0], chartOptions);
if (userTradeChart.length) tradingViewChart.render();

const updateChart = (endPoint, dataLength) => {
    fetch(endPoint)
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            const seriesData = data.slice(0, dataLength || 100).map((item) => {
                return {
                    x: item.date,
                    y: [item.open, item.high, item.low, item.close],
                };
            });

            tradingViewChart.updateSeries([
                {
                    data: seriesData,
                },
            ]);
        })
        .then(() => {
            setTimeout(
                console.log.bind(
                    console,
                    `%ctradingViewChart updated`,
                    `background-color: rgb(58, 163, 26); color: white; font-size: 16px; font-family: Courier; padding:7px 15px; border-radius: 8px;`,
                ),
            );
        })
        .catch((error) => {
            console.error('Error fetching data:', error);
        });
};
let cryptoAPI = `https://financialmodelingprep.com/api/v3/historical-chart/5min/BTCUSD?from=2023-08-10&to=2023-09-10&apikey=Uo8tKd0TfYNSRsuFyTna5QOfeADggd18`;
cryptoAPI = `../assets/demo-trading-data/BTCUSD.json`;

if (userTradeChart.length) updateChart(cryptoAPI, 50);

//* Chart JS end ==========================

//* Data table start ========================
const tradingHistoryTable = $('#trading-history-table');
if (tradingHistoryTable.length) {
    let table = new DataTable(tradingHistoryTable, {
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

//? bot-trading-history-data-table ______________ ↓
const botTradingHistoryTable = $('#bot-trading-history-table');
if (botTradingHistoryTable.length) {
    let table = new DataTable(botTradingHistoryTable, {
        responsive: true,
        initComplete: function () {
            // Access the search input field and set a placeholder
            const searchInput = document.querySelector(
                '[type="search"][aria-controls="bot-trading-history-table"]',
            );
            if (searchInput) {
                searchInput.placeholder = 'Search for trade etc...';
                searchInput.previousSibling.innerHTML = `<i class="fa-solid fa-magnifying-glass"></i>`;
                searchInput.previousSibling.classList.add(
                    'bot-trading-history-table-label',
                );

                const btn =
                    '<a class="btn w-max" id="btn-download-bot-trading-history"><i class="fa-solid fa-download"></i>&nbsp;Print As PDF</a>';
                searchInput.parentNode.insertAdjacentHTML('beforeend', btn);
            }
        },
    });
}
$(document).on('click', '#btn-download-bot-trading-history', function () {
    console.log('Downloading init...');
});
//? Data table end ===========================
//* trading bot script start =================
let btnViewHistory = null;
$(document).on('click', '.btn-load-software', function () {
    btnViewHistory = $(this).prev('.btn-view-history');
});
$(document).on(
    'click',
    '.trading-bot-license-modal .btn-license-submit',
    function () {
        btnViewHistory.removeClass('d-none');
        btnViewHistory = null;
    },
);

$(document).on('click', '.btn-view-history', function () {
    $('.trading-bots-area').addClass('d-none');
    $('.bot-trading-history').removeClass('d-none');
});
$(document).on('click', '[href="#trading-bots-area"]', function () {
    $('.trading-bots-area').removeClass('d-none');
    $('.bot-trading-history').addClass('d-none');
});
//* trading bot script end ===================

//* Trading view js start ====================
const watchListTableBuild = ($html) => {
    // console.log($html.innerHTML);
    // fetch('https://www.alphavantage.co/query?function=TIME_SERIES_INTRADAY')
    //     .then((response) => {
    //         if (!response.ok) {
    //             throw new Error('Network response was not ok');
    //         }
    //         return response.json();
    //     })
    //     .then((data) => {
    //         console.log('Fetched data:', data);
    //     })
    //     .catch((error) => {
    //         console.error('Error fetching data:', error);
    //     });
    // setInterval(() => {
    // }, 1000); // Set interval to 60 seconds
};
const tradingViewFunc = async (symbol, watchList) => {
    try {
        const container = $('.tradingview-widget-container');
        if (!container.length) return; //? Check if the widget container exists
        container.html('');

        const script = document.createElement('script');
        script.src = '../assets/tradingview/embed-widget-advanced-chart.js';
        script.async = true;

        // Define the configuration for the TradingView widget
        script.innerHTML = JSON.stringify({
            autosize: true,
            symbol: symbol || 'BITSTAMP:BTCUSD',
            timezone: 'Etc/UTC',
            theme: 'dark',
            style: '1',
            locale: 'en',
            withdateranges: true,
            range: '5D',
            hide_side_toolbar: true,
            allow_symbol_change: true,
            watchlist: watchList || [
                'FX:EURUSD',
                'BITSTAMP:BTCUSD',
                'CAPITALCOM:US100',
                'OANDA:GBPJPY',
                'NASDAQ:QQQ',
                'NASDAQ:NVDA',
                'OANDA:XAUUSD',
            ],
            details: false, // right side widgets
            hotlist: false,
            calendar: false,
            // studies: ['STD;24h%Volume'],
            show_popup_button: true,
            popup_width: '1000',
            popup_height: '650',
            support_host: 'https://www.tradingview.com',
        });

        container[0].append(script); //? Append the script to the container
        watchListTableBuild(script);
    } catch (error) {
        console.warn('Error loading TradingView widget:', error);
    }
};
tradingViewFunc(); //? Execute the function
//? Trading view js end ======================

const getCurrentTime = () => {
    const currentTime = {};
    const now = new Date();
    let hours = now.getHours();
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();
    currentTime.ampm = hours >= 12 ? 'PM' : 'AM';

    // Convert to 12-hour format
    hours = hours % 12;
    currentTime.hours = hours ? (hours <= 9 ? '0' + hours : hours) : 12; // the hour '0' should be '12'

    // Format minutes and seconds to always show two digits
    currentTime.formattedMinutes = minutes < 10 ? '0' + minutes : minutes;
    currentTime.formattedSeconds = seconds < 10 ? '0' + seconds : seconds;

    return currentTime;
};
//* trade-details-summery collapsable script start =====
$(document).on(
    'click',
    '.trade-details-summery .card-header a:not(.active)',
    function () {
        const target = $(this).attr('href');
        if (!target) return;
        $(this).addClass('active').siblings().removeClass('active');
        $(target).removeClass('d-none').siblings().addClass('d-none');
    },
);

//* trade-details-summery collapsable script end =======

$(document).on(
    'click',
    '.trade-and-market-common-card .card-indicators .btn-pill',
    function () {
        if ($(this).hasClass('active')) {
            return;
        }
        $(this).addClass('active').siblings('a').removeClass('active');

        const symbol = $(this).attr('data-label');
        setTimeout(
            console.log.bind(
                console,
                `%c${$(this).text()}%c${symbol}`,
                `background: rgb(86 86 86); color: white; font-size: 16px; font-family: Courier; padding:7px 15px; border-radius: 50px;`,
                `color: red; padding: 7px 15px;`,
            ),
        );
        if ($(this).hasClass('btn-forex')) {
            // tradingViewFunc(symbol || 'FX:EURUSD');
            updateChart(cryptoAPI, 100);
        }
        if ($(this).hasClass('btn-crypto')) {
            // tradingViewFunc(symbol || 'BITSTAMP:BTCUSD');
            updateChart(cryptoAPI, 500);
        }
        if ($(this).hasClass('btn-indices')) {
            // tradingViewFunc(symbol || 'CAPITALCOM:US100');
            updateChart(cryptoAPI, 1000);
        }
    },
); //? onClick to update trading-chart

const tradeWatchListTableUpdate = (symbol, price, changePercent) => {
    const table = $('#trade-and-market-common-table');
    const tr = table.find(`dt[name=${symbol}]`);

    if (tr.length) {
        tr.find('.price').text(price);
        const percentageDiv = tr.find('.percentage');

        percentageDiv.text(`${changePercent}%`);
        if (changePercent <= 0) {
            percentageDiv.addClass('text-danger').removeClass('text-primary');
        } else {
            percentageDiv.removeClass('text-danger').addClass('text-primary');
        }
        return;
    }

    table.append(`
<dt name="${symbol}" class="d-flex justify-content-between align-items-center g-10">
    <div class="country-name d-flex align-items-center g-8">
        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
        <span>${symbol}</span>
    </div>
    <div class="price">${price}</div>
    <div class="percentage ${
        changePercent > 0 ? 'text-success' : 'text-danger'
    }">${changePercent}%</div>
</dt>`);
};
const fetchMarketData = (url) => {
    fetch(url)
        .then((response) => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then((data) => {
            const symbol = data[0].symbol;
            const price = data[0].price.toFixed(4);
            const changePercent = data[0].changesPercentage.toFixed(2);
            tradeWatchListTableUpdate(symbol, price, changePercent);
        })
        .catch((error) => {
            console.error('Error fetching market data:', error);
        });
};
fetchMarketData('../assets/demo-trading-data/watchlist-EURUSD.json'); // Initial fetch
// setInterval(fetchMarketData, 2000);

$(document).on('click', '.trade-and-market-common-table > dt', function () {
    const min = 50;
    const max = 500;
    const randomNum = Math.floor(Math.random() * (max - min + 1) + min);

    updateChart(cryptoAPI, randomNum);
});

//! delete this demo interval ==========
setInterval(() => {
    const min = 1;
    const max = 2.0;
    const randomNum = (Math.random() * (max - min) + min).toFixed(4);
    const randomNumP = (Math.random() * (max - min) + 0.5).toFixed(2);

    // Randomly decide whether to make it positive or negative
    const finalNum = Math.random() < 0.5 ? randomNum : (-randomNum).toFixed(2);

    const maxDT = $('.trade-and-market-common-table > dt').length;
    const randomNumDT = Math.floor(Math.random() * (maxDT - min + 1) + min);

    const randomDT = $('.trade-and-market-common-table > dt').eq(randomNumDT);
    randomDT.find('.price').text(randomNum);
    const percentageDiv = randomDT.find('.percentage');

    if (finalNum <= 0) {
        percentageDiv.addClass('text-danger').removeClass('text-primary');
        percentageDiv.text(`${finalNum}%`);
    } else {
        percentageDiv.removeClass('text-danger').addClass('text-primary');
        percentageDiv.text(`+${(+finalNum).toFixed(2)}%`);
    }
}, 2500 / $('.trade-and-market-common-table > dt').length);