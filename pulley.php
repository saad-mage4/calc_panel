<?php
$guest = '';
if(isset($_GET['guest'])){
    $guest = $_GET['guest'];
}
if($guest == 'yes') {
    $data = '';
    $role = '';
}
require_once 'core/database.php';
// if ($guest != 'yes' && !is_loggedin()) {
?><script>
        // window.location.href = "login.php";
    </script><?php
            // }
            include_once 'includes/header.php';
            // if ($guest != 'yes') {
                include_once 'includes/aside.php';
            // }
                ?>
        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row mt-3">
                    <!-- left column -->
                    <div class="col-md-8 mx-auto">
                        <div class="pulley-calculator">
                            <h2 class="mt-2 mb-3 text-center">Pulley Calculator</h2>
                        <form id="calculatorForm">
                            <div class="row">
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="driveRPM">Enter the RPM of the drive motor:</label>
                                    <input class="form-control" type="number" id="driveRPM" name="driveRPM" placeholder="Drive Motor RPM">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="drivePulley">Enter the drive pulley size:</label>
                                    <input class="form-control" type="number" id="drivePulley" name="drivePulley" placeholder="Driven Pulley Size">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="drivenPulley">Enter the driven pulley size:</label>
                                    <input class="form-control" type="number" id="drivenPulley" name="drivenPulley" placeholder="Driven Pulley Size">
                                </div>
                                <div class="col-12 col-lg-6 mb-3">
                                    <label for="desiredRPM">Enter the desired driven pulley RPM:</label>
                                    <input class="form-control" type="number" id="desiredRPM" name="desiredRPM" placeholder="Desired Driven Pulley RPM">
                                </div>
                                <div class="col-12 col-lg-6 mb-3 result">
                                    <h3 class="font-weight-bold">Result:</h3>
                                    <p class="font-weight-bold" id="resultValue">Enter 3 values to calculate the 4th.</p>
                                </div>
                                <div class="col-12 col-lg-6 mb-3 d-flex align-items-center">
                                    <button type="button" class="btn btn-primary w-100" onclick="calculate()">Calculate</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<?php include_once './includes/footer.php'; ?>

<script>
        function calculate() {
            let driveRPM = parseFloat(document.getElementById('driveRPM').value);
            let drivePulley = parseFloat(document.getElementById('drivePulley').value);
            let drivenPulley = parseFloat(document.getElementById('drivenPulley').value);
            let desiredRPM = parseFloat(document.getElementById('desiredRPM').value);
            
            let result = "";
            
            if (isNaN(driveRPM)) {
                result = `Drive Motor RPM: <span class="text-success">${(desiredRPM * drivenPulley / drivePulley).toFixed(2)}</span>`;
            } else if (isNaN(drivePulley)) {
                result = `Drive Pulley Size: <span class="text-success">${(drivenPulley * driveRPM / desiredRPM).toFixed(2)}</span>`;
            } else if (isNaN(drivenPulley)) {
                result = `Driven Pulley Size: <span class="text-success">${(drivePulley * driveRPM / desiredRPM).toFixed(2)}</span>`;
            } else if (isNaN(desiredRPM)) {
                result = `Desired Driven Pulley RPM: <span class="text-success">${(driveRPM * drivePulley / drivenPulley).toFixed(2)}</span>`;
            } else {
                result = '<span class="text-danger">Please leave one field empty for calculation.</span>';
            }
            
            document.getElementById('resultValue').innerHTML = result;
        }
    </script>