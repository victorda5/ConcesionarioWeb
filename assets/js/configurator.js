const botonOcultar = document.querySelector('.button-div');
const buttonCancel = document.querySelector('.cancel');
const contenidoAocultar = document.querySelector('.panel-column-content');
const purchaseContent = document.querySelector('.purchase-content');

purchaseContent.style.display = 'none';

botonOcultar.addEventListener('click', () => {
  contenidoAocultar.style.display = 'none';
  purchaseContent.style.display = 'block';
  sr.reveal('.purchase-content', { delay: 100, origin: 'right' })
});

buttonCancel.addEventListener('click', () => {
  contenidoAocultar.style.display = 'block';
  purchaseContent.style.display = 'none';
});

/*=============== SCROLL REVEAL ANIMATION ===============*/
const sr = ScrollReveal({
  origin: 'top',
  distance: '60px',
  duration: 2500,
  delay: 400,
  //reset: true;
})

//sr.reveal('.first-car-img', { delay: 500, origin: 'left' })
//sr.reveal('.title', { delay: 600, origin: 'right' })
//sr.reveal('.paint', { delay: 700, origin: 'right' })
//sr.reveal('.wheel', { delay: 800, origin: 'right' })
//sr.reveal('.extras', { delay: 900, origin: 'right' })
//sr.reveal('.button-div', { delay: 1000, origin: 'right' })

var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

function getWheelSize() {
  // Obtener todos los elementos input de tipo radio con el mismo nombre
  var wheel_radios = document.getElementsByName('wheel-radio');

  // Recorrer los elementos para encontrar el seleccionado
  for (var i = 0; i < wheel_radios.length; i++) {
    if (wheel_radios[i].checked) {
      // Mostrar el valor seleccionado en un alert
      radioValue = wheel_radios[i].value;
      return radioValue;
    }
  }
}

function getColor() {
  // Obtener todos los elementos input de tipo radio con el mismo nombre
  var color_radios = document.getElementsByName('color-radio');

  // Recorrer los elementos para encontrar el seleccionado
  for (var i = 0; i < color_radios.length; i++) {
    if (color_radios[i].checked) {
      // Mostrar el valor seleccionado en un alert
      radioValue = color_radios[i].value;
      return radioValue;
    }
  }
}

function displayColor() {
  const colorDisplay = document.querySelector('.colorDisplay');
  const color = getColor();
  colorDisplay.innerHTML = color;
}

function displayWheelSize() {
  const wheelSizeDisplay = document.querySelector('.wheelSizeDisplay');
  const wheelSize = getWheelSize();
  wheelSizeDisplay.innerHTML = wheelSize;
}

function displayExtras() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
  const extras = document.querySelector('.extrasDisplay');
  const precioExtras = document.querySelector('.extrasPrice')
  var valoresSeleccionados = [];
  var precioTotal = 0;

  for (var i = 0; i < checkboxes.length; i++) {
    valoresSeleccionados.push(checkboxes[i].value);
    precioTotal += 1000;
  }

  extras.innerHTML = valoresSeleccionados.join(" <br>");
  precioExtras.innerHTML = "$a" + precioTotal;
}