const idaContainer = document.getElementById('vuelos-ida');
const vueltaContainer = document.getElementById('vuelos-vuelta');

console.log(idaContainer);

const selectedFlightInput = document.getElementById('vuelo-ida');

const nextButton = document.getElementById('next-button');

function handleFlightSelection(event) {
  const selectedFlight = event.target.value;
  selectedFlightInput.value = selectedFlight;

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

    selectedFlightInput.value = '';
    nextButton.disabled = true;
  } else if (selectedType === 'vuelta') {
    idaContainer.style.display = 'none';
    vueltaContainer.style.display = 'block';
  }
}

const flightTypeRadios = document.querySelectorAll('input[name="flight-type"]');

flightTypeRadios.forEach(function(radioButton) {
  radioButton.addEventListener('change', handleFlightTypeChange);
});