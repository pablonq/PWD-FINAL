

// Función para abrir el modal y cargar el botón de pago de MercadoPago
function abrirModal() {
  var modal = document.getElementById("merkPago");
  modal.style.display = "block";
  
  const mp = new MercadoPago('TEST-9c5026e5-50a5-40c0-9203-6a14199c474b', {
    locale: 'es-AR',
  });

  const checkout = mp.checkout({
    preference: {
      id: pagar
    },
    render: {
      container: '.checkout-btn',
      label: 'PAGAR'
    }
  });
}



