document.getElementById('buyButtonCrypto').addEventListener('click', () => {
  document.dispatchEvent(new Event('openSaleModalCrypto'));
});

document.getElementById('buyButtonCard').addEventListener('click', () => {
  document.dispatchEvent(new Event('openSaleModalCard'));
});
