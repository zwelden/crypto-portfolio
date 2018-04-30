(function () {
  if (document.querySelector('.asset-pct-change')) {
    var percentChangeEls = document.querySelectorAll('.asset-pct-change');

    for (var i = 0; i < percentChangeEls.length; i++) {
      var prctChangeEl = percentChangeEls[i];
      var changeValue = Number(prctChangeEl.innerText.split('%')[0]);

      prctChangeEl.classList.remove('green');
      prctChangeEl.classList.remove('red');

      if (changeValue < 0) {
        prctChangeEl.classList.add('red');
      } else {
        prctChangeEl.classList.add('green');
      }
    }
  }
})();
