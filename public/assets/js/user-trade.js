// all the trade logic for user goes here 

// init chart data here 

jQuery(document).ready(function(){

	// CoinGecko API URL to fetch cryptocurrency data
  const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
  update_crypto_assets(apiUrl);

  // loadTradingViewChart('SPX');
  
  // Refresh data every 60 seconds
  setInterval(update_crypto_assets, 60000);

	if( jQuery('#trading-history-table').length > 0 ) {
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

});


// on clkick on the headers forx crypto or indices
jQuery(document).on('click', '.trade-type', function(){

	var type = jQuery(this).data('type');
	console.log( type );

	if( type == 'forex' ) {

 			const container = document.getElementById('trade-and-market-common-table');
      container.innerHTML = '';

	}else if( type == 'crypto' ) {

		// CoinGecko API URL to fetch cryptocurrency data
	  const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
	  update_crypto_assets(apiUrl);

	}else if( type == 'indices' ) {

 			const container = document.getElementById('trade-and-market-common-table');
      container.innerHTML = '';
		
	}

	jQuery('.trade-type').removeClass('active');
	jQuery(this).addClass('active');

})


// on selecting the assets
jQuery(document).on('click', '#trade-and-market-common-table .asset-data', function(){
	let name = jQuery(this).find('span').data('name');
	let fullname =  jQuery(this).find('span').data('fullname');
	let assetPrice = jQuery(this).find('span').data('price');
	trade_logic();

	jQuery('.user-trade-chart-filter .selected-asset').find('.name').text(name);
	jQuery('.user-trade-chart-filter .selected-asset').find('.fullname').text(fullname);
	jQuery('input.asset-unitprice').val(assetPrice);
})


// on updating Margin
jQuery('.user-trade-chart-filter .asset-margin').on('change', function() {
		trade_logic();
});


// on enter trade amount
jQuery(document).on('input', '.user-trade-chart-filter .asset-trade-amount', function(){
		trade_logic();
});


// trade contract , payout and Unit calculation function
function trade_logic(){
	let asset_price = jQuery('.user-trade-chart-filter .asset-unitprice').val();
	let margin = jQuery('.user-trade-chart-filter .asset-margin').val();
	let asset_trade_amount = jQuery('.user-trade-chart-filter .asset-trade-amount').val();
	let trade_percentage = jQuery('.user-trade-chart-filter .asset-trade_result_percentage').val();
	if( asset_trade_amount > 0 ) {
		let contract_size = asset_trade_amount * margin;
		let asset_unit_price = asset_price / contract_size;
		let payout = ( (parseFloat(contract_size) * parseFloat(trade_percentage)) / 100 ) + parseFloat(asset_trade_amount);
		jQuery('.user-trade-chart-filter .asset-contract-size').text(contract_size);
	  jQuery('.user-trade-chart-filter .asset-unit-price').val(asset_unit_price);
	  jQuery('.user-trade-chart-filter .asset-payout').text(payout);
	
	}
}





function update_crypto_assets(apiUrl){
	fetch(apiUrl)
  .then(response => response.json())
  .then(data => {

  		console.log( data );

      const container = document.getElementById('trade-and-market-common-table');
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

              console.log( symbol );

              loadTradingViewChart(symbol);
          });

          jQuery('#trade-and-market-common-table').find('dt:first').click();

      });
  })
  .catch(error => console.error('Error fetching data:', error));
}


 function loadTradingViewChart(symbol) {
    // Get the container element
    const container = document.getElementById('market-watch-chart');
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
        "container_id": "market-watch-chart"
    });
}









