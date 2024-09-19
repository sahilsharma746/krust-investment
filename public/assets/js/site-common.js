// Add nice 2 select for all the selects in the site
jQuery( document ).ready(function(){

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


if( jQuery('#site-main-nav').length > 0 ) {
	// for updating data on the site main nav home page 
	const options = {
	  method: 'GET',
	  headers: {accept: 'application/json', 'x-cg-pro-api-key': 'CG-1zNLqMpJkTYvoZH93HsJUUEJ'}
	};
	// const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
	const apiUrl = 'crypto.json';

    var main_nav_li = '';
	fetch(apiUrl, options)
	  	.then(response => {
	    	if (!response.ok) {
	      	 // Error('Network response was not ok');
	    		return false;
	       }
	    	return response.json();  
	  	})
	  	.then(data => {
	    	const container = document.getElementById('site-main-nav');
	      	container.innerHTML = '';
	      	data.forEach(pair => {
	  		 	main_nav_li += '<li>';
	  			main_nav_li += '<div class="price-card d-flex flex-column">';
	  			main_nav_li += '<div class="d-flex justify-content-between align-items-center g-10">';
	  			main_nav_li += '<div class="country-name d-flex align-items-center g-8">';
	  			main_nav_li += '<img src="'+pair.image+'" alt="'+pair.name+' logo" class="flag">';
	  			main_nav_li += '<span>'+pair.symbol.toUpperCase()+'/USD</span>';
	  			main_nav_li += '</div>';
	  			main_nav_li += '<div class="price">$'+pair.current_price.toFixed(2)+'</div>';
	  			main_nav_li += '</div>';
	  			main_nav_li += '<div class="percentage-area d-flex align-items-center g-8">';
				main_nav_li += '<i class="fa-solid ' + (pair.price_change_percentage_24h >= 0 ? 'fa-chevron-up' : 'fa-chevron-down') + '"></i>';
				main_nav_li += '<span class="percentage ' + (pair.price_change_percentage_24h >= 0 ? 'text-success' : 'text-danger') + '">'+ pair.price_change_percentage_24h.toFixed(2) + '%</span>';	
				main_nav_li += '</div>';
	  			main_nav_li += '</div>';
	  			main_nav_li += '</li>';
	  		});
	  		container.innerHTML = main_nav_li;
	  	})
	  	.catch(error => {
	    	console.error('There was a problem with the fetch operation:', error);
	  	});
	}

	//   // for updating data on the site main nav home page 
	//     const options = {
	// 	  method: 'GET',
	// 	  headers: {accept: 'application/json', 'x-cg-pro-api-key': 'CG-1zNLqMpJkTYvoZH93HsJUUEJ'}
	// 	};
	//   	var main_nav_li = '';
	//   	// const apiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd&order=market_cap_desc&per_page=50&page=1&sparkline=false';
	  	
	//   		fetch('https://api.coingecko.com/api/v3/coins/markets?vs_currency=usd', options)
	//   		.then(response => response.json())
	//   		.then(data => {

	//   		 console.log( data );
	// 	      const container = document.getElementById('site-main-nav');
	// 	      container.innerHTML = '';
	// 	      data.forEach(pair => {
	// 	  		 	main_nav_li += '<li>';
	// 	  			main_nav_li += '<div class="price-card d-flex flex-column">';
	// 	  			main_nav_li += '<div class="d-flex justify-content-between align-items-center g-10">';
	// 	  			main_nav_li += '<div class="country-name d-flex align-items-center g-8">';
	// 	  			main_nav_li += '<img src="'+pair.image+'" alt="'+pair.name+' logo" class="flag">';
	// 	  			main_nav_li += '<span>'+pair.symbol.toUpperCase()+'/USD</span>';
	// 	  			main_nav_li += '</div>';
	// 	  			main_nav_li += '<div class="price">$'+pair.current_price.toFixed(2)+'</div>';
	// 	  			main_nav_li += '</div>';
	// 	  			main_nav_li += '<div class="percentage-area d-flex align-items-center g-8">';
	// 	  			main_nav_li += '<i class="fa-solid fa-chevron-up"></i>';
	// 	  			main_nav_li += '<span class="percentage">'+pair.price_change_percentage_24h.toFixed(2)+'%</span>';
	// 	  			main_nav_li += '</div>';
	// 	  			main_nav_li += '</div>';
	// 	  			main_nav_li += '</li>';
	//       	});
	//       	container.innerHTML = main_nav_li;
	//   	})
	//   	.catch(error => console.error('Error fetching data:', error));
});


