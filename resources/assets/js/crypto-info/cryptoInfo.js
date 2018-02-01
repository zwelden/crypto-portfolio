(function () {
  window.cryptoApiInfo = {
    'Bitcoin': {
      'apiUrlPrefix': 'https://blockchain.info/q/addressbalance/',
      'apiUrlPostfix': '',
      'apiDivisor': 100000000.00,
      'apiObjPath': 'data'
    },
    'Ethereum': {
      'apiUrlPrefix': 'https://api.blockcypher.com/v1/eth/main/addrs/',
      'apiUrlPostfix': '/balance',
      'apiDivisor': 1000000000000000000.00,
      'apiObjPath': 'data.balance'
    },
    'Ripple': {
      'apiUrlPrefix': 'https://data.ripple.com/v2/accounts/',
      'apiUrlPostfix': '/balances?&limit=1',
      'apiDivisor': 1,
      'apiObjPath': 'data.balances[0].value'
    },
    'Litecoin': {
      'apiUrlPrefix': 'https://chain.so/api/v2/get_address_balance/LTC/',
      'apiUrlPostfix': '',
      'apiDivisor': 1,
      'apiObjPath': 'data.data.confirmed_balance'
    },
    'Cardano': {
      'apiUrlPrefix': 'https://cardanoexplorer.com/api/addresses/summary/',
      'apiUrlPostfix': '',
      'apiDivisor': 1000000.00,
      'apiObjPath': 'data.right.caBalance.getCoin'
    }
  };
})();
