
jQuery(document).ready(function(){

	// CoinGecko API URL to fetch cryptocurrency data
  // const apiUrlCrypto = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
  // for updating data on the site main nav home page 
	const options = {
	  method: 'GET',
	  headers: {accept: 'application/json', 'x-cg-pro-api-key': 'CG-1zNLqMpJkTYvoZH93HsJUUEJ'}
	};
	// const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
  
  
  update_crypto_assets(apiUrlCrypto, options);
  setInterval(update_crypto_assets, 60000);   


  const $marketwatchElement = $('#market-watch-common-table-area');
  if ($marketwatchElement.length) {
      show_crypto_assets_marketwacth(apiUrlCrypto, options);
  }
  //  else {
  //     console.log('Element with ID "market-watch-common-table-area" not found.');
  // }


  

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



jQuery(document).on('click', '.trade-type', function(){

	var type = jQuery(this).data('type');
	// console.log( type );

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
  jQuery('input.name_input').val(name);

  $('.btn-buy .buy_price').text(assetPrice).attr('value', assetPrice);
  $('.btn-sell .sell_price').text(assetPrice).attr('value', assetPrice);

});
// on updating Margin
jQuery('.user-trade-chart-filter .asset-margin').on('change', function() {
		trade_logic();
});
// on enter trade amountasset-contract-size-hidden
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
    document.querySelector('input.asset-contract-size').value = contract_size;
		jQuery('.user-trade-chart-filter .asset-contract-size').text(contract_size);
	  jQuery('.user-trade-chart-filter .asset-unit-price').val(asset_unit_price);
	  jQuery('.user-trade-chart-filter .asset-payout').text(payout);
    document.querySelector('input.payout').value = payout;


	
	}
}





function update_crypto_assets(apiUrl, options){
	fetch(apiUrl, options)
  .then(response => response.json())
  .then(data => {

  		// console.log( data );

      const container = document.getElementById('trade-and-market-common-table');
      container.innerHTML = '';

      data.forEach(pair => {
        
        const crypto_current_price = pair.current_price; 
        const crypto_name = pair.name; 

          // Create the <dt> element
          const pairElement = document.createElement('dt');
          pairElement.className = 'd-flex justify-content-between align-items-center g-10 asset-data';
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
          nameElement.className = 'details';
          nameElement.textContent = `${pair.symbol.toUpperCase()}/USD`;
          nameElement.setAttribute('data-price', crypto_current_price);
          nameElement.setAttribute('data-name',crypto_name );
          nameElement.setAttribute('data-fullname', `${pair.symbol.toUpperCase()} / U.S Dollar`);

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



function show_crypto_assets_marketwacth(apiUrl, options){
	fetch(apiUrl, options)
  .then(response => response.json())
  .then(data => {


      const container = document.getElementById('user-market-watch-table-crypto');
      container.innerHTML = '';
      data.forEach(pair => {

        const row = document.createElement('tr');

        const changeColor = pair.price_change_percentage_24h < 0 ? 'red' : 'green';
        row.innerHTML = `
        <td>
            <div class="d-flex align-items-center g-8">
                <img src="${pair.image}" class="icon crypto_image" alt="${pair.name}" style="width: 30px; height: 30px;">                <span>${pair.name}</span>
            </div>
        </td>
        <td>${pair.market_cap.toLocaleString()}</td>
        <td>${pair.fully_diluted_valuation.toLocaleString()}</td>
        <td>${pair.current_price.toFixed(2)}</td>
        <td>${pair.total_volume.toLocaleString()}</td>
        <td>${pair.circulating_supply.toLocaleString()}</td>
        <td style="color: ${changeColor};">${pair.price_change_percentage_24h.toFixed(2)}%</td>
        `;
        container.appendChild(row);


      });
  })
  .catch(error => console.error('Error fetching data:', error));
}








