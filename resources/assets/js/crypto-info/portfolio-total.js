(function () {
  var portfolioTotalField = document.querySelector('.assets-total');
  if (portfolioTotalField) {
    var assetValues = document.querySelectorAll('.asset-item .asset-value');
    var portfolioTotal = 0;

    for (var i = 0; i < assetValues.length; i++) {
      var assetValueRaw = assetValues[i].innerText;
      var assetValue = parseFloat(assetValueRaw.split('$')[1]);
      portfolioTotal += assetValue;
    }

    portfolioTotalField.innerText = '$' + portfolioTotal;
  }
})();
