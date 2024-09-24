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
if (time_frame.includes('h')) {
    var hours = parseInt(time_frame);
    timeFrameInMilliseconds = hours * 60 * 60 * 1000; 
} else if (time_frame.includes('m')) {
    var minutes = parseInt(time_frame);
    timeFrameInMilliseconds = minutes * 60 * 1000;
} else if (time_frame.includes('s')) {
    var seconds = parseInt(time_frame);
    timeFrameInMilliseconds = seconds * 1000; 
} else {
    timeFrameInMilliseconds = parseInt(time_frame); // Default case, you may handle it differently
}

// If the time frame has expired, show the full PnL value and stop updating
if (timeDifference >= timeFrameInMilliseconds) {
    $(this).find('.trade_pnl_value').text(pnl_value.toFixed(2));
} else {
    // Time frame is still active, update PnL progressively
    var currentPnl = 0;
    var updateInterval = 100; // Frequency of updates in milliseconds
    var totalTimeRemaining = timeFrameInMilliseconds - timeDifference; // Time left to complete the trade
    var incrementAmount = pnl_value / (totalTimeRemaining / updateInterval); // Calculate how much PnL to add per interval

    var pnlDisplay = $(this).find('.trade_pnl_value'); 

    var interval = setInterval(function() {
        // Update PnL progressively
        currentPnl += incrementAmount;
        

        // Stop updating once the full PnL is reached or time frame is complete
        if (currentPnl >= pnl_value || currentPnl >= pnl_value || timeDifference >= timeFrameInMilliseconds) {
            currentPnl = pnl_value;
            clearInterval(interval); // Stop updating
        }

        pnlDisplay.text(currentPnl.toFixed(2)); // Update the PnL value in the UI
    }, updateInterval);
}

console.log('Trade Created: ' + trade_created);
console.log('Current Date: ' + current_date_time);
console.log('Time frame in ms: ' + timeFrameInMilliseconds);
console.log('Time Difference: ' + timeDifference);
console.log('PNL Value: ' + pnl_value);
console.log('------------------------------------------------------------------------------------------------');

});




});

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
    // trade_logic();
    jQuery(".user-trade-chart-filter .selected-asset").find(".name").text(name);
    jQuery(".user-trade-chart-filter .selected-asset")
      .find(".fullname")
      .text(fullname);
    jQuery("input.asset-unitprice").val(assetPrice);
    jQuery("input.name_input").val(name);

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
    let asset_unit_price = asset_price / contract_size;
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



