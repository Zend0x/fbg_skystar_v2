const vueloIdaRadio = document.getElementById('flight-ida');
const vueloVueltaRadio = document.getElementById('flight-vuelta');
const vueloIdaInputs = document.querySelectorAll('input[name="vuelo-ida"]');
const vueloVueltaInputs = document.querySelectorAll('input[name="vuelo-vuelta"]');
const vueloIdaInput = document.getElementById('vuelo-ida');
const vueloVueltaSelect = document.getElementById('vuelo-vuelta');
const nextButton = document.getElementById('next-button');

vueloIdaRadio.addEventListener('change', mostrarVuelosIda);
if(vueloVueltaRadio){
    vueloVueltaRadio.addEventListener('change', mostrarVuelosVuelta);
}
function mostrarVuelosIda() {
    document.getElementById('vuelos-ida').style.display = 'block';
    document.getElementById('vuelos-vuelta').style.display = 'none';
    vueloVueltaSelect.required = false;
}

function mostrarVuelosVuelta() {
    document.getElementById('vuelos-ida').style.display = 'none';
    document.getElementById('vuelos-vuelta').style.display = 'block';
    vueloVueltaSelect.required = true;
}

const vuelosIdaCards = document.querySelectorAll('#vuelos-ida .flight-card.ida');
vuelosIdaCards.forEach(card => {
    card.addEventListener('click', seleccionarVueloIda);
});

const vuelosVueltaCards = document.querySelectorAll('#vuelos-vuelta .flight-card.vuelta');
vuelosVueltaCards.forEach(card => {
    card.addEventListener('click', seleccionarVueloVuelta);
});

function seleccionarVueloIda(event) {
    const vueloIdaSeleccionado = event.currentTarget.querySelector('input[name="vuelo-ida"]');
    vueloIdaSeleccionado.checked = true;
}
function seleccionarVueloVuelta(event) {
    const vueloVueltaSeleccionado = event.currentTarget.querySelector('input[name="vuelo-vuelta"]');
    vueloVueltaSeleccionado.checked = true;
}
nextButton.addEventListener('click', guardarSeleccion);

function guardarSeleccion() {
    let vueloIdaSeleccionado = '';
    let vueloVueltaSeleccionado = '';

    for (let i = 0; i < vueloIdaInputs.length; i++) {
        if (vueloIdaInputs[i].checked) {
            vueloIdaSeleccionado = vueloIdaInputs[i].value;
            break;
        }
    }
    for (let i = 0; i < vueloVueltaInputs.length; i++) {
        if (vueloVueltaInputs[i].checked) {
            vueloVueltaSeleccionado = vueloVueltaInputs[i].value;
            break;
        }
    }
    vueloIdaInput.value = vueloIdaSeleccionado;
    vueloVueltaSelect.value = vueloVueltaSeleccionado;
}