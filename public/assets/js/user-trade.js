jQuery(document).ready(function () {
  if ($("#trade-and-market-common-table").length > 0) {
    update_crypto_assets(apiUrlCrypto);
  }

  if ($("#market-watch-common-table-area").length > 0) {
    show_crypto_assets_marketwacth(apiUrlCrypto);
  }

  $('#trade-details-summery-current tbody tr').each(function() {
    // Get the trade_id from the data attribute
    var trade_id = $(this).data('id');
    var pnl_value = parseFloat($(this).find('.pnl_value').val());
    var trade_created = $(this).find('.trade_created').val();
    var current_date_time = $(this).find('.current_date_time').val();
    var time_frame = $(this).find('.timeframe').val();

    // Convert trade_created and current_date_time to Date objects
    var tradeCreatedDate = new Date(trade_created);
    var currentDateTime = new Date(current_date_time);

    // Calculate the time difference between the current time and the trade created time
    var timeDifference = currentDateTime - tradeCreatedDate;

    // Convert time_frame to milliseconds
    var timeFrameInMilliseconds;
    switch (time_frame) {
        case '5minutes':
            timeFrameInMilliseconds = 5 * 60 * 1000;
            break;
        case '30minutes':
            timeFrameInMilliseconds = 30 * 60 * 1000;
            break;
        case '1hour':
            timeFrameInMilliseconds = 1 * 60 * 60 * 1000;
            break;
        case '4hours':
            timeFrameInMilliseconds = 4 * 60 * 60 * 1000;
            break;
        case '1day':
            timeFrameInMilliseconds = 24 * 60 * 60 * 1000;
            break;
        case '1week':
            timeFrameInMilliseconds = 7 * 24 * 60 * 60 * 1000;
            break;
        case '1month':
            timeFrameInMilliseconds = 30 * 24 * 60 * 60 * 1000; // Approximation for 1 month
            break;
        case '1year':
            timeFrameInMilliseconds = 365 * 24 * 60 * 60 * 1000; // Approximation for 1 year
            break;
        default:
            timeFrameInMilliseconds = 0; // Handle case where time frame is unknown
            break;
    }

    var sign = (pnl_value < 0) ? '-' : '+';
    pnl_value = Math.abs(pnl_value);

    // Calculate remaining time
    var remainingTime = timeFrameInMilliseconds - timeDifference;

    // Function to format remaining time in MM:SS
    function formatTime(ms) {
        var totalSeconds = Math.floor(ms / 1000);
        var minutes = Math.floor(totalSeconds / 60);
        var seconds = totalSeconds % 60;
        return (minutes < 10 ? '0' : '') + minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }

    // Display initial time
    var timeDisplayElement = $(this).find('.remaining_time'); // Assuming you have a span or div for displaying time
    timeDisplayElement.text(formatTime(remainingTime));

    // If the trade has expired, show the full PnL value and stop updating
    if (timeDifference >= timeFrameInMilliseconds) {
        $(this).find('.trade_pnl_value .amount').text(pnl_value.toFixed(2));
        $(this).find('.trade_pnl_value .sign').text(sign);
        (sign == '-') ? $(this).find('.trade_pnl_value').css('color', '#F32524') : $(this).find('.trade_pnl_value').css('color', '#3AA31A');
      
        // AJAX call for updating the trade status can be added here
        
    } else {
        // Time frame is still active, update PnL progressively
        var currentPnl = 0;
        var updateInterval = 1000; // Frequency of updates in milliseconds

        // Function to create dynamic increments based on pnl_value
        function getDynamicIncrements(pnl_value) {
            let increments = [];
            if (pnl_value <= 1000) {
                increments = [1, 5, 10, 20, 50]; // Small pnl values
            } else if (pnl_value <= 10000) {
                increments = [10, 50, 100, 200, 500]; // Medium pnl values
            } else {
                increments = [100, 500, 1000, 5000, 10000]; // Large pnl values
            }
            return increments;
        }

        $(this).find('.trade_pnl_value .sign').text(sign);

        let increments = getDynamicIncrements(pnl_value);
        var interval = setInterval(function() {
            // Update remaining time
            remainingTime -= 1000; // Decrease by one second

            // Update the remaining time display
            timeDisplayElement.text(formatTime(remainingTime));

            // Select a random increment from the dynamically generated increments
            let randomIncrement = increments[Math.floor(Math.random() * increments.length)];
            currentPnl += randomIncrement;

            if( currentPnl >= pnl_value ) {
               currentPnl = getRandomInRange(pnl_value - 20, pnl_value);
            }

            // Stop updating once the full PnL is reached or time frame is complete
            if (remainingTime <= 0) {
                currentPnl = pnl_value;
                clearInterval(interval); // Stop updating
                timeDisplayElement.text('00:00'); // Ensure to show '00:00' when finished
            }

            $(this).find('.trade_pnl_value .amount').text(currentPnl.toFixed(2)); // Update the PnL value in the UI
            (sign == '-') ? $(this).find('.trade_pnl_value').css('color', '#F32524') : $(this).find('.trade_pnl_value').css('color', '#3AA31A');

        }.bind(this), updateInterval); // Bind 'this' to access the current row context in the interval
    }

});

});


function getRandomInRange(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}


jQuery(document).on("click", ".trade-type", function () {
  var type = jQuery(this).data("type");
  if (type == "forex") {
    const container = document.getElementById("trade-and-market-common-table");
    container.innerHTML = "";
  } else if (type == "crypto") {
    update_crypto_assets(apiUrl);
  } else if (type == "indices") {
    const container = document.getElementById("trade-and-market-common-table");
    container.innerHTML = "";
  }
  jQuery(".trade-type").removeClass("active");
  jQuery(this).addClass("active");
});

// on selecting the assets
jQuery(document).on(
  "click",
  "#trade-and-market-common-table .asset-data",
  function () {
    let name = jQuery(this).find("span").data("name");
    let fullname = jQuery(this).find("span").data("fullname");
    let assetPrice = jQuery(this).find("span").data("price"); 
    let assetImage = jQuery(this).find("span").data("image");

    console.log( assetImage );

    // trade_logic();
    jQuery(".user-trade-chart-filter .selected-asset").find(".name").text(name);
    jQuery(".user-trade-chart-filter .selected-asset")
      .find(".fullname")
      .text(fullname);
    jQuery("input.asset-unitprice").val(assetPrice);
    jQuery("input.name_input").val(name);
    jQuery("input.image").val(assetImage);

    jQuery(".flag_image").attr("src", assetImage).show();

    $(".btn-buy .buy_price").text(assetPrice).attr("value", assetPrice);
    $(".btn-sell .sell_price").text(assetPrice).attr("value", assetPrice);

    document.querySelector("input.asset-contract-size").value = 0;
    jQuery(".user-trade-chart-filter .asset-contract-size").text(0);
    jQuery(".user-trade-chart-filter .asset-unit-price").val(0);
    jQuery(".user-trade-chart-filter .asset-payout").text(0);
    document.querySelector("input.payout").value = 0;
    jQuery(".user-trade-chart-filter .asset-trade-amount").val(0);
  }
);

// on updating Margin
jQuery(".user-trade-chart-filter .asset-margin").on("change", function () {
  trade_logic();
});

// on enter trade amountasset-contract-size-hidden
jQuery(document).on(
  "input",
  ".user-trade-chart-filter .asset-trade-amount",
  function () {
    trade_logic();
  }
);

function trade_logic() {
  let asset_price = jQuery(".user-trade-chart-filter .asset-unitprice").val();
  let margin = jQuery(".user-trade-chart-filter .asset-margin").val();
  let asset_trade_amount = jQuery(
    ".user-trade-chart-filter .asset-trade-amount"
  ).val();
  let trade_percentage = jQuery(
    ".user-trade-chart-filter .asset-trade_result_percentage"
  ).val();

  let contract_size, asset_unit_price, payout;

  if (asset_trade_amount > 0) {
    let contract_size = asset_trade_amount * margin;
    let asset_unit_price =contract_size / asset_price ;
    let payout =(parseFloat(contract_size) * parseFloat(trade_percentage)) / 100 +
      parseFloat(asset_trade_amount);
    document.querySelector("input.asset-contract-size").value = contract_size;

    jQuery(".user-trade-chart-filter .asset-contract-size").text(contract_size);
    jQuery(".user-trade-chart-filter .asset-unit-price").val(asset_unit_price);
    jQuery(".user-trade-chart-filter .asset-payout").text(payout);

    document.querySelector("input.payout").value = payout;
  } else {
    contract_size = "0";
    asset_unit_price = "0";

    jQuery(".user-trade-chart-filter .asset-contract-size").text(contract_size);
    jQuery(".user-trade-chart-filter .asset-unit-price").val(asset_unit_price);
  }
}

function update_crypto_assets(apiUrl) {
  fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
      const container = document.getElementById(
        "trade-and-market-common-table"
      );
      container.innerHTML = ""; // Clear the existing content

      data.forEach((pair) => {
        const crypto_current_price = pair.current_price;
        const crypto_name = pair.name;

        // Create a <dt> element
        const dtElement = document.createElement("dt");
        dtElement.className =
          "d-flex justify-content-between align-items-center g-10 asset-data";
        dtElement.dataset.symbol = pair.symbol.toUpperCase() + "USD"; // Add symbol for click handling

        // Create the inner HTML content
        let cryptoassetdata =
          '<div class="country-name d-flex align-items-center g-8">';
        cryptoassetdata +=
          '<img class="flag" src="' +
          pair.image +
          '" alt="' +
          pair.name +
          ' logo">';
        cryptoassetdata += '<span class="details"';
        cryptoassetdata += ' data-price="' + crypto_current_price + '"';
        cryptoassetdata += ' data-name="' + crypto_name + '"';
        cryptoassetdata += ' data-image="' + pair.image + '"';
        cryptoassetdata +=
          ' data-fullname="' + pair.symbol.toUpperCase() + ' / U.S Dollar">';
        cryptoassetdata += pair.symbol.toUpperCase() + "/USD";
        cryptoassetdata += "</span>";
        cryptoassetdata += "</div>";
        cryptoassetdata +=
          '<div class="pair-price">$' +
          pair.current_price.toFixed(2) +
          "</div>";
        cryptoassetdata +=
          '<div class="percentage ' +
          (pair.price_change_percentage_24h < 0
            ? "text-danger"
            : "text-success") +
          '">';
        cryptoassetdata += pair.price_change_percentage_24h.toFixed(2) + "%";
        cryptoassetdata += "</div>";

        // Set the inner HTML of the dtElement
        dtElement.innerHTML = cryptoassetdata;

        // Append the dtElement to the container
        container.appendChild(dtElement);

        // Add click event listener to the dtElement
        dtElement.addEventListener("click", function () {
          loadTradingViewChart(pair.symbol.toUpperCase() + "USD");
        });
      });

      // Trigger click on the first <dt> element to load the chart by default
      jQuery("#trade-and-market-common-table").find("dt:first").click();
    })
    .catch((error) => console.error("Error fetching data:", error));
}

function loadTradingViewChart(symbol) {
  // Get the container element
  const container = document.getElementById("market-watch-chart");
  // Set the chart width and height based on the container's size
  const chartWidth = container.offsetWidth;
  const chartHeight = window.innerHeight * 0.7; // 70% of the window height, adjust as needed

  new TradingView.widget({
    width: chartWidth,
    height: chartHeight,
    symbol: symbol,
    interval: "D",
    timezone: "Etc/UTC",
    theme: "light",
    style: "1",
    locale: "en",
    toolbar_bg: "#f1f3f6",
    enable_publishing: false,
    allow_symbol_change: true,
    container_id: "market-watch-chart",
  });
}

function show_crypto_assets_marketwacth(apiUrl) {
  fetch(apiUrl)
    .then((response) => response.json())
    .then((data) => {
      const container = document.getElementById("user-market-watch-table-data");
      container.innerHTML = ""; // Clear existing data

      data.forEach((pair) => {
        var table_row_html = "<tr>";
        table_row_html += "<td>";
        table_row_html += '<div class="d-flex align-items-center g-8">';
        table_row_html +=
          '<img src="' +
          pair.image +
          '" class="icon crypto_image" alt="' +
          pair.name +
          '" style="width: 30px; height: 30px;">';
        table_row_html += "<span>" + pair.name + "</span>";
        table_row_html += "</div>";
        table_row_html += "</td>";
        table_row_html += "<td>" + pair.market_cap.toLocaleString() + "</td>";
        table_row_html +=
          "<td>" + pair.fully_diluted_valuation.toLocaleString() + "</td>";
        table_row_html += "<td>" + pair.current_price.toFixed(2) + "</td>";
        table_row_html += "<td>" + pair.total_volume.toLocaleString() + "</td>";
        table_row_html +=
          "<td>" + pair.circulating_supply.toLocaleString() + "</td>";
        table_row_html +=
          '<td style="color: ' +
          (pair.price_change_percentage_24h < 0 ? "red" : "green") +
          ';">' +
          pair.price_change_percentage_24h.toFixed(2) +
          "%</td>";
        table_row_html += "</tr>";

        container.innerHTML += table_row_html;
      });
    })
    .catch((error) => console.error("Error fetching data:", error));
}

jQuery("#tradeForm").on("submit", function (event) {
  var userBalance = parseFloat($(".asset-user_balance").val());
  var amount = parseFloat($(".asset-trade-amount").val());

  if (amount > userBalance) {
    event.preventDefault(); 
    document.getElementById("insufficientBalanceModal").style.display = "block"; 
  }
});


document.querySelector(".close-button").onclick = function () {
  document.getElementById("insufficientBalanceModal").style.display = "none";
};

window.onclick = function (event) {
  var modal = document.getElementById("insufficientBalanceModal");
  if (event.target == modal) {
    modal.style.display = "none";
  }
};



