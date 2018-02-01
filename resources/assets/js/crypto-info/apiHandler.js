require('axios');
require('lodash');

(function () {
  // var assets = document.querySelectorAll("[class^='asset-']");
  var assets = document.querySelectorAll('.crypto-asset');
  var assetsEndCount = assets.length;
  var completedCount = 0;

  var setTotalInt = setInterval(function () {
    if (completedCount === assetsEndCount) {
      clearInterval(setTotalInt);
      setTimeout(function () {
        var totalAll = document.querySelector('.assets-total');
        var total = parseFloat(0);
        for (var j = 0; j < assets.length; j++) {
          var asset = assets[j];
          var assetid = asset.dataset['assetid'];
          var assetTotalSpan = document.querySelector('.total-asset-' + assetid);
          var assetTotal = parseFloat(assetTotalSpan.innerText.split('$')[1]);
          total += assetTotal;
        }
        totalAll.innerText = '$' + total;
      }, 150);
    }
  }, 150);
})();
