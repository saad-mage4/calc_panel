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
if ($guest != 'yes' && !is_loggedin()) {
?><script>
        window.location.href = "login.php";
    </script><?php
            }
            include_once 'includes/header.php';
            // if ($guest != 'yes') {
                include_once 'includes/aside.php';
            // }
                ?>
<link rel="stylesheet" href="dist/css/for-calculator.css">

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row mt-5">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- Flour Calculator -->
                        <div id="flour-calculator">
                            <div class="container" id="flour-calculator-container">
                                <h3 class="text-center">Flour Calculator</h3>
                            <div class="formula-line" id="flour-formula-line"></div>
                            <div class="result-container" id="flour-result-container">
                                <div class="result-box">
                                    <table>
                                        <tr>
                                            <th class="profit">Profit</th>
                                            <th class="remaining">Remaining</th>
                                        </tr>
                                        <tr>
                                            <td id="flour-result1" class="profit">2.000 KG</td>
                                            <td id="flour-result2" class="remaining">38.000 KG</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="input-container">
                                <p class="kgs">Enter the amount (in KGs): </p>
                                <div class="number-container">
                                    <input type="number" id="flour-amountInput" step="0.01">
                                    <span class="clear-input" id="flour-clearInput" onclick="flour_clearInputField()"><span class="fa fa-times"></span></span>
                                </div>
                                <span class="history-icon" id="flour-historyIcon" onclick="flour_showCalculationHistory()"><span class="fas fa-list"></span></span>
                                </p>


                                <div class="search-container">
                                    <i id="flour-addClientButton" class="fas fa-plus-circle" onclick="flour_addNewClientPopup()"></i>
                                    <input type="text" id="flour-clientSearch" placeholder="Clients..." onkeyup="flour_filterClients()" oninput="flour_filterClients()">
                                    <span class="clear-input2" onclick="flour_clearClientInputField()"><span class="fa fa-times"></span></span>
                                    <div id="flour-clientDropdown" class="client-dropdown"></div> <!-- Add this line -->
                                </div>

                                <div id="flour-addClientModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="flour_closeAddClientModal()"><span class="fas fa-times"></span></span>
                                        <h2>Add New Client</h2>
                                        <input type="text" id="flour-clientName" class="input-field" placeholder="Client Name">
                                        <input type="text" id="flour-clientArea" class="input-field" placeholder="Client Area">
                                        <p> <button class="add-btn" onclick="flour_addClient()">Add</button></p>
                                    </div>
                                </div>




                                <button class="calculate-button" onclick="flour_calculateFlour()">Calculate</button>
                            </div>
                            <div class="result-line" id="flour-result-line"></div>

                            </div>

                            <div class="popup" id="flour-historyPopup">
                                <div class="popup-content">
                                    <?php if (is_loggedin()){ ?>
                                    <a href="#!" class="btn btn-md btn-primary position-absolute guest-login-btn"  onclick="data_sync('flour_calculationHistory')">sync</a>
                                    <?php } else { ?>
                                    <a href="login.php" class="btn btn-md btn-primary position-absolute guest-login-btn">Login to sync</a>
                                    <?php } ?>
                                    <span class="popup-close" onclick="flour_closePopup()">&#10006;</span>
                                    <h2>Flour Calculation History</h2>
                                    <table class="popup-table">
                                        <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Client</th> <!-- New Column -->
                                                <th>Original</th>
                                                <th>Profit</th>
                                                <th>Rest</th>
                                            </tr>
                                        </thead>
                                        <tbody id="flour-historyTable">
                                            <!-- History table rows will be added here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                    </div>
                </div>
            </div>
        </section>




<?php include_once './includes/footer.php'; ?>
<script src="./dist/js/price-calculator.js"></script>