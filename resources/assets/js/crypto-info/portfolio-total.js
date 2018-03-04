(function () {
  var portfolioTotalField = document.querySelector('.assets-total');
  var assetValues = document.querySelectorAll('.asset-value');
  var portfolioTotal = 0;

  for (var i = 0; i < assetValues.length; i++) {
    var assetValueRaw = assetValues[i].innerText;
    var assetValue = parseFloat(assetValueRaw.split('$')[1]);
    portfolioTotal += assetValue;
  }

  portfolioTotalField.innerText = '$' + portfolioTotal;
})();
