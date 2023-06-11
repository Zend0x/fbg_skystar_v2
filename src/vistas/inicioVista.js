
var oneWayRadio = document.getElementById("one-way");
let departureDateInput = document.getElementById("fecha-salida");
let departureDate = document.getElementById("fecha-salida");
var returnDateLabel = document.getElementById("vuelta-label");
var returnDateInput = document.getElementById("fecha-vuelta");
let departureAirport = document.getElementById("dep_apt");
let arrivalAirport = document.getElementById("arr_apt");
let form = document.getElementById("search-form");

function selectValues(targetSelect, currentValue){
    var select = document.getElementById(targetSelect);
    var options = select.getElementsByTagName('option');

    for(let i = 1; i<options.length; i++){
        if(options[i].value===currentValue){
            options[i].disabled=true
        }else{
            options[i].disabled=false
        }
    }
}

oneWayRadio.addEventListener("change", function () {
  if (this.checked) {
    returnDateLabel.style.display = "none";
    returnDateInput.style.display = "none";
  }
});

var roundTripRadio = document.getElementById("round-trip");

roundTripRadio.addEventListener("change", function () {
  if (this.checked) {
    returnDateLabel.style.display = "inline-block";
    returnDateInput.style.display = "inline-block";
  }
});

function intercambiarValores() {
  
  var valorSelect1 = departureAirport.value;
  var valorSelect2 = arrivalAirport.value;
  
  departureAirport.value = valorSelect2;
  arrivalAirport.value = valorSelect1;
}