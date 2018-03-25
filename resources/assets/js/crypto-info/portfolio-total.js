(function () {
  var portfolioTotalField = document.querySelector('.assets-total');
  if (portfolioTotalField) {
    var assetItems = document.querySelectorAll('.asset-item');
    var portfolioTotal = 0;
    var assetValueRaw;
    var assetValue;
    for (var i = 0; i < assetItems.length; i++) {
      assetValueRaw = assetItems[i].querySelector('.asset-value').innerText;
      assetValue = parseFloat(assetValueRaw.split('$')[1]);
      portfolioTotal += assetValue;
    }

    portfolioTotalField.innerText = '$' + portfolioTotal.toFixed(2);

    for (var j = 0; j < assetItems.length; j++) {
      assetValueRaw = assetItems[j].querySelector('.asset-value').innerText;
      assetValue = parseFloat(assetValueRaw.split('$')[1]);
      var percentOfPortEl = assetItems[j].querySelector('.asset-port-percent');
      var percentRaw = (assetValue / portfolioTotal) * 100;
      var percent = percentRaw.toFixed(2) + '%';
      percentOfPortEl.innerText = percent;
    }
  }
})();
