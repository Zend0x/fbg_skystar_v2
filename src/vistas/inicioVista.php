<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../css/index.css">
    <title>Skystar Airways</title>
    <?php
    ini_set('display_errors', 1);
    ini_set('html_errors', 1);

    require("../negocio/aeropuertosReglasNegocio.php");

    $aeropuertoBL = new AeropuertosReglasNegocio();
    $datosAeropuertos = $aeropuertoBL->obtener();
    ?>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-center">
            <span class="navbar-brand">Skystar Airways</span>
        </div>
        <div class="navbar-right">
            <button class="login-button">Iniciar sesión</button>
        </div>
    </nav>
    <div class="content">
        <div class="search">
            <form action="buscadorVista.php" method="post" id="search-form">
                <div class="trip-type">
                    <input type="radio" name="trip-type" id="one-way" id="one-way" value="oneway">
                    <label for="one-way">Solo ida</label>
                    <input type="radio" name="trip-type" id="round-trip" id="round-trip" value="roundtrip" checked>
                    <label for="round-trip">Ida y vuelta</label>
                </div>
                <div class="airport-selectors">
                    <select name="dep_apt" id="dep_apt">
                        <option value="null" disabled selected>Seleccione un aeropuerto de salida</option>
                        <?php
                        foreach ($datosAeropuertos as $aeropuerto) {
                            echo '<option value="' . $aeropuerto->getICAO() . '">' . $aeropuerto->getICAO() . '</option>';
                        }
                        ?>
                    </select>
                    <select name="arr_apt" id="arr_apt">
                        <option value="null" disabled selected>Seleccione un aeropuerto de llegada</option>
                        <?php
                        foreach ($datosAeropuertos as $aeropuerto) {
                            echo '<option value="' . $aeropuerto->getICAO() . '">' . $aeropuerto->getICAO() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="date-selectors-search">
                    <div class="dep-arrival">
                        <div class="departure">
                            <label for="fecha-salida">Fecha de salida:</label><br>
                            <input type="date" id="fecha-salida">
                        </div>
                        <div class="arrival">
                            <label for="fecha-llegada" id="vuelta-label">Fecha de vuelta:</label><br>
                            <input type="date" id="fecha-vuelta">
                        </div>
                    </div>
                    <input id="submit-button" class="disabled-button" disabled type="submit" value="Buscar vuelos">
                </div>
                <script>
                    var oneWayRadio = document.getElementById("one-way");
                    let departureDateInput = document.getElementById("fecha-salida");
                    let departureDate = docuemtn.getElementById("fecha-salida");
                    var returnDateLabel = document.getElementById("vuelta-label");
                    var returnDateInput = document.getElementById("fecha-vuelta");
                    let submitButton = document.getElementById("submit-button");
                    let departureAirport = document.getElementById("dep_apt");
                    let arrivalAirport = document.getElementById("arr_apt");
                    let form = document.getElementById("search-form");

                    function checkAirports() {
                        if (departureAirport.value && arrivalAirport.value) {
                            return true
                        }
                        return false
                    }

                    function checkDates() {
                        if (returnDateInput.value && departureDateInput.value) {
                            return true
                        }
                        return false
                    }

                    function checkFormValues() {
                        if (checkAirports() && checkDates()) {
                            submitButton.setAttribute("class", "search-button")
                            submitButton.removeAttribute("disabled")
                        }
                        if (!checkAirports() || !checkDates()) {
                            submitButton.setAttribute("class", "disabled-button")
                            submitButton.setAttribute("disabled", true)
                        }
                        return
                    }

                    form.addEventListener("change", checkFormValues);

                    oneWayRadio.addEventListener("change", function() {
                        if (this.checked) {
                            returnDateLabel.style.display = "none";
                            returnDateInput.style.display = "none";
                        }
                    });

                    var roundTripRadio = document.getElementById("round-trip");

                    roundTripRadio.addEventListener("change", function() {
                        if (this.checked) {
                            returnDateLabel.style.display = "inline-block";
                            returnDateInput.style.display = "inline-block";
                        }
                    });
                </script>
            </form>
        </div>
    </div>
</body>

</html>