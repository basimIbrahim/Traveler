(function () {
  const payModal = document.getElementById('payment-modal');
  const openButtons = document.querySelectorAll('.room-book-btn');
  const closePayBtn = document.getElementById('closePayment');
  const amountLabel = document.getElementById('paymentAmountLabel');
  const paymentForm = document.getElementById('paymentForm');
  const creditFields = document.getElementById('creditFields');
  const methodRadios = document.querySelectorAll('input[name="payMethod"]');

  function setMethod(method) {
    creditFields.style.display = method === 'credit' ? 'block' : 'none';
  }

  methodRadios.forEach(r => r.addEventListener('change', () => setMethod(r.value)));

  function openModal(price) {
    amountLabel.textContent = price || '$0';
    setMethod(document.querySelector('input[name="payMethod"]:checked')?.value || 'apple');
    payModal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    payModal.style.display = 'none';
    document.body.style.overflow = '';
  }

  openButtons.forEach(btn => {
    btn.addEventListener('click', e => {
      e.preventDefault();
      const price = btn.getAttribute('data-price') || '';
      openModal(price);
    });
  });

  if (closePayBtn) closePayBtn.addEventListener('click', closeModal);
  if (payModal) {
    payModal.addEventListener('click', e => { if (e.target === payModal) closeModal(); });
  }
  document.addEventListener('keyup', e => { if (e.key === 'Escape') closeModal(); });

  if (paymentForm) {
    paymentForm.addEventListener('submit', e => {
      e.preventDefault();
      alert('Payment submitted!'); // replace with your handler
      closeModal();
    });
  }
})();
