const idaContainer = document.getElementById('vuelos-ida');
const vueltaContainer = document.getElementById('vuelos-vuelta');

const flightCards = document.getElementsByClassName('flight-card');

console.log(idaContainer);

const selectedFlightInput = document.getElementById('vuelo-ida');
let vueloIdaSeleccionado = '';

const nextButton = document.getElementById('next-button');

function handleFlightSelection(event) {
  vueloIdaSeleccionado = event.target.value;
  selectedFlightInput.value = vueloIdaSeleccionado;

  nextButton.disabled = false;
}

const radioButtonsIda = document.querySelectorAll('.ida input[type="radio"]');

radioButtonsIda.forEach(function(radioButton) {
  radioButton.addEventListener('change', handleFlightSelection);
});

function handleFlightTypeChange(event) {
  const selectedType = event.target.value;

  if (selectedType === 'ida') {
    idaContainer.style.display = 'block';
    vueltaContainer.style.display = 'none';
  } else if (selectedType === 'vuelta') {
    idaContainer.style.display = 'none';
    vueltaContainer.style.display = 'block';
  }
}

const flightTypeRadios = document.querySelectorAll('input[name="flight-type"]');

flightTypeRadios.forEach(function(radioButton) {
  radioButton.addEventListener('change', handleFlightTypeChange);
});

for (let i = 0; i < flightCards.length; i++) {
  const flightCard = flightCards[i];

  const radioButton = flightCard.querySelector('input[type="radio"]');

  flightCard.addEventListener('click', () => {
    radioButton.checked = true;
    handleFlightSelection({ target: radioButton });
    flightCard.style.backgroundColor = 'rgb(239, 205, 255)';
  });
  radioButton.addEventListener('change', function() {
    if (!this.checked) {
      flightCard.style.backgroundColor = 'rgba(255, 255, 255, 0.795)';
    }
  });
}

const formElement = document.getElementById('flight-selection-form');
