<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Krust-Investments | User Dashboard</title>
    <link rel="icon" href="./assets/img/site-logo.png">
    <meta name="description" content="Open up a world of possibilities with Krust Investments">
    <meta name="keywords" content="Investments, krust, trade">

    <!-- nice select 2 -->
    <link rel="stylesheet" href="../assets/nice-select-2/nice-select2.css">

    <!-- style added here ================ -->
    <link rel="stylesheet" href="../assets/css/trade-and-market.min.css">

    <!-- font-awesome added here ================ -->
    <link rel="stylesheet" href="../assets/font-awesome-6.6.6-web/css/all.min.css">

    <!-- jQuery added here ================ -->
    <script src="../assets/jQuery/jquery-3.7.1.min.js"></script>
</head>

<body class="">
    <header>
        <div class="main-header">
            <div class="container d-flex flex-wrap justify-content-between align-items-center g-10">
                <div>
                    <a href="./index.html" class="logo-area d-flex align-items-center g-4">
                        <img src="./assets/img/site-logo.png" alt="Site Logo" class="site-logo">
                        <span class="site-name">Krust-Investments</span>
                    </a>
                    <div class="account-status-header d-flex align-items-center g-10">
                        <span class="dot"></span>
                        <span class="account-status text-primary">Active Account</span>
                    </div>
                </div>

                <a id="btn-nav-toggle" class="btn-nav-toggle">
                    <img src="./assets/img/icon-menu-category.png">
                </a>
                <dl class="header-btns d-flex flex-wrap g-8">
                    <dt>
                        <a class="btn btn-deposit g-8" href="#">
                            <i class="fa-regular fa-credit-card"></i>
                            <span>Deposit</span>
                        </a>
                    </dt>
                    <dt class="dropdown">
                        <a class="btn btn-account-balance">
                            <span class="text">Account Balance</span>
                            <span class="account-amount">$100,000.00</span>
                            <span class="icon"><i class="fa-solid fa-angle-down"></i></span>
                        </a>

                        <dl class="dropdown-menu d-flex flex-column">
                            <dt class="dropdown-item">Current Plan: <span class="user-plan-name">Tier 1</span> </dt>
                            <dt class="dropdown-item">
                                <div class="account-status-header d-flex align-items-center g-10">
                                    <span class="dot"></span>
                                    <span class="account-status text-primary">Active Account</span>
                                </div>
                                <div class="account-amount-header">
                                    $100,000.00
                                </div>
                            </dt>
                            <dt class="dropdown-item">
                                <a href="./login.html">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>&nbsp;
                                    <span>Logout</span>
                                </a>
                            </dt>
                        </dl>
                    </dt>
                </dl>
            </div>
        </div>
    </header>

    <main>
        <nav id="left-nav" class="left-nav">
            <ul class="nav nav-tabs scroll">
                <li class="nav-item">
                    <a data-toggle="tab" href="#admin-account-grid">
                        <i class="fa-regular fa-circle-user"></i>
                        <span>Account</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#payment-method-and-history">
                        <i class="fa-regular fa-credit-card"></i>
                        <span>Deposits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#trading-history">
                        <i class="fa-solid fa-clock-rotate-left"></i>
                        <span>Trading History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./user-market-watch.html">
                        <i class="fa-solid fa-list-ul"></i>
                        <span>Market Watch</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="./user-trade.html">
                        <i class="fa-solid fa-arrow-down-up-across-line"></i>
                        <span>Trade</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Education</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#market-news-section">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>Market News</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./login.html">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <article class="tab-content trade-article">
            <section id="trade-and-market-common-grid" class="trade-and-market-common-grid d-grid">
                <div class="card trade-and-market-common-card">
                    <div class="card-header">
                        <a href="./user-market-watch.html" class="btn-tab">Market Watch</a>
                        <a href="./user-trade.html" class="btn-tab active">Tradable Assets</a>
                    </div>
                    <div class="card-body">
                        <div class="card-indicators scroll">
                            <a href="" class="btn-pill active">Crypto</a>
                            <a href="" class="btn-pill">Forex</a>
                            <a href="" class="btn-pill">Indices</a>
                            <a href="" class="btn-pill">Test</a>
                        </div>
                        <div class="trade-and-market-common-table-area">
                            <div class="input-group search-input-group">
                                <input id="searchTableAssets" class="form-control search-input" type="search"
                                    placeholder="Search for assets etc...">
                                <label for="searchTableAssets" class="search-icon"><i
                                        class="fa-solid fa-magnifying-glass"></i></label>
                            </div>
                            <dl class="trade-and-market-common-table scroll" id="crypto-pairs-container">
                            </dl>
                        </div>
                    </div>
                </div>

                <div id="user-trade-chart-area" class="user-trade-chart-area d-grid scroll">
                    <div class="user-trade-chart-parent">
                        <div id="user-trade-charts" class="user-trade-charts">
                        </div>
                    </div>
                    <div class="user-trade-chart-filter scroll">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="d-flex g-8">
                                    <img src="./assets/img/country-eur.png" alt="country flag" class="flag">
                                    <div class="d-grid">
                                        <span class="name">eurusd</span>
                                        <span class="details">Euro / U.S Dollar</span>
                                    </div>
                                </div>

                                <div class="icon">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </div>
                            </div>
                            <div class="card-body d-grid g-10">
                                <div class="input-group">
                                    <label class="form-label">Amount</label>
                                    <input class="form-control" type="number" min="0" placeholder="Enter Amount">
                                </div>
                                <div class="input-group">
                                    <label class="form-label">Time Frame</label>
                                    <select class="form-control small" id="marketViewChartTimeFrame">
                                        <option value="0">Select Time Frame</option>
                                        <option value="">1</option>
                                        <option value="">2</option>
                                        <option value="">3</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label class="form-label">Margin</label>
                                    <select class="form-control small" id="marketViewChartFrame">
                                        <option value="0">Select Margin</option>
                                        <option value="">5x</option>
                                        <option value="">10x</option>
                                        <option value="">15x</option>
                                    </select>
                                </div>
                                <table class="user-trade-short-history w-100">
                                    <tbody>
                                        <tr>
                                            <td>Strike Rate</td>
                                            <td>-</td>
                                            <td class="text-end">70%</td>
                                        </tr>
                                        <tr>
                                            <td>Contract Size</td>
                                            <td>-</td>
                                            <td class="text-end">1M</td>
                                        </tr>
                                        <tr>
                                            <td>Leverage</td>
                                            <td>-</td>
                                            <td class="text-end">1:50</td>
                                        </tr>
                                        <tr>
                                            <td>Fees</td>
                                            <td>-</td>
                                            <td class="text-end">$0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">
                                <div class="btn-area d-flex g-10">
                                    <a href="" class="btn d-grid btn-buy">
                                        <span class="name">buy</span>
                                        <span>1.5647</span>
                                    </a>
                                    <a href="" class="btn d-grid btn-sell">
                                        <span class="name">Sell</span>
                                        <span>1.5402</span>
                                    </a>
                                </div>

                                <div class="payout-area d-grid">
                                    <span>Your Payout</span>
                                    <span class="text-center">=</span>
                                    <span class="text-end">$320.45</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="trade-details-summery-card-group d-flex justify-content-between">
                        <div class="last-closed-trades">
                            <p>Last Closed Trades</p>
                            <div class="d-flex">
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">ASSETS</div>
                                    <div class="value">EUR/USD</div>
                                </div>
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">TIMEFRAME</div>
                                    <div class="value">10 Hrs</div>
                                </div>
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">Capital</div>
                                    <div class="value">$100k</div>
                                </div>
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">Profit</div>
                                    <div class="value">+ $1,000</div>
                                </div>
                            </div>
                        </div>
                        <div class="last-open-trades">
                            <p class="text-end">Last Open Trades</p>
                            <div class="d-flex">
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">ASSETS</div>
                                    <div class="value">EUR/USD</div>
                                </div>
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">TIMEFRAME</div>
                                    <div class="value">10 Hrs</div>
                                </div>
                                <div class="card d-flex flex-column justify-content-center">
                                    <div class="key">CURRENT TIME</div>
                                    <div id="currentTime" interval="true" class="value">1:42 PM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </article>
    </main>




    <!-- font-awesome added here ================ -->
    <script src="../assets/font-awesome-6.6.6-web/js/all.min.js"></script>
    <!-- nice select 2 -->
    <script src="../assets/nice-select-2/nice-select2.js"></script>

    <!-- apex charts js added here ======================= -->
    <script type="text/javascript" src="../assets/apexcharts/apexcharts.js"></script>

    <!-- script added here ======================= -->
    <script src="../assets/js/user-dashboard.js"></script>

    <!-- font added here (ital + Merriweather) ================ -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
    <script>
        // CoinGecko API URL to fetch cryptocurrency data
        const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
    
        function updatePairData() {
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const container = document.getElementById('crypto-pairs-container');
                    container.innerHTML = '';
    
                    data.forEach(pair => {
                        // Create the <dt> element
                        const pairElement = document.createElement('dt');
                        pairElement.className = 'd-flex justify-content-between align-items-center g-10';
                        pairElement.dataset.symbol = pair.symbol.toUpperCase() + 'USD'; // Add symbol for click handling
    
                        // Create the logo and name container
                        const nameContainer = document.createElement('div');
                        nameContainer.className = 'country-name d-flex align-items-center g-8';
    
                        // Create the logo element
                        const logoElement = document.createElement('img');
                        logoElement.className = 'flag';
                        logoElement.src = pair.image;
                        logoElement.alt = `${pair.name} logo`;
    
                        // Create the name element
                        const nameElement = document.createElement('span');
                        nameElement.className = 'pair-name';
                        nameElement.textContent = `${pair.symbol.toUpperCase()}/USD`;
    
                        // Append the logo and name to the name container
                        nameContainer.appendChild(logoElement);
                        nameContainer.appendChild(nameElement);
    
                        // Create the price element
                        const priceElement = document.createElement('div');
                        priceElement.className = 'pair-price';
                        priceElement.textContent = `$${pair.current_price.toFixed(2)}`;
    
                        // Create the percentage change element
                        const percentageElement = document.createElement('div');
                        percentageElement.className = 'percentage';
                        percentageElement.textContent = `${pair.price_change_percentage_24h.toFixed(2)}%`;
    
                        // Change the text color based on the percentage
                        if (pair.price_change_percentage_24h < 0) {
                            percentageElement.classList.add('text-danger');
                        } else {
                            percentageElement.classList.add('text-success');
                        }
    
                        // Append everything to the <dt> element
                        pairElement.appendChild(nameContainer);
                        pairElement.appendChild(priceElement);
                        pairElement.appendChild(percentageElement);
    
                        // Append the <dt> element to the container
                        container.appendChild(pairElement);
    
                        // Add click event listener to update the TradingView chart
                        pairElement.addEventListener('click', function() {
                            const symbol = this.dataset.symbol;
                            loadTradingViewChart(symbol);
                        });
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        function loadTradingViewChart(symbol) {
            // Get the container element
            const container = document.getElementById('user-trade-charts');
            // Set the chart width and height based on the container's size
            const chartWidth = container.offsetWidth;
            const chartHeight = window.innerHeight * 0.7; // 70% of the window height, adjust as needed

            new TradingView.widget({
                "width": chartWidth,
                "height": chartHeight,
                "symbol": symbol,
                "interval": "D",
                "timezone": "Etc/UTC",
                "theme": "light",
                "style": "1",
                "locale": "en",
                "toolbar_bg": "#f1f3f6",
                "enable_publishing": false,
                "allow_symbol_change": true,
                "container_id": "user-trade-charts"
            });
        }

        // Fetch and update data on page load
        window.onload = function() {
            updatePairData();
            loadTradingViewChart('BTCUSD');
            // Refresh data every 60 seconds
            setInterval(updatePairData, 60000);
        };

    </script>



</body>

</html>