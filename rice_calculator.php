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
                        <!-- Rice Calculator -->
                        <div id="rice-calculator">
                            <div class="container" id="rice-calculator-container">
                                <h3 class="text-center">Rice Calculator</h3>
                            <div class="formula-line" id="rice-formula-line"></div>
                            <div class="result-container" id="rice-result-container">
                                <div class="result-box">
                                    <table>
                                        <tr>
                                            <th class="profit">Profit</th>
                                            <th class="remaining">Remaining</th>
                                        </tr>
                                        <tr>
                                            <td id="rice-result1" class="profit">2.000 KG</td>
                                            <td id="rice-result2" class="remaining">38.000 KG</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="input-container">
                                <p class="kgs">Enter the amount (in KGs): </p>
                                <div class="number-container">
                                    <input type="number" id="rice-amountInput" step="0.01">
                                    <span class="clear-input" id="rice-clearInput" onclick="rice_clearInputField()"><span class="fa fa-times"></span></span>
                                </div>
                                <span class="history-icon" id="rice-historyIcon" onclick="rice_showCalculationHistory()"><span class="fas fa-list"></span></span>
                                </p>


                                <div class="search-container">
                                    <i id="rice-addClientButton" class="fas fa-plus-circle" onclick="rice_addNewClientPopup()"></i>
                                    <input type="text" id="rice-clientSearch" placeholder="Clients..." onkeyup="rice_filterClients()" oninput="rice_filterClients()">
                                    <span class="clear-input2" onclick="rice_clearClientInputField()"><span class="fa fa-times"></span></span>
                                    <div id="rice-clientDropdown" class="client-dropdown"></div> <!-- Add this line -->
                                </div>

                                <div id="rice-addClientModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close" onclick="rice_closeAddClientModal()"><span class="fas fa-times"></span></span>
                                        <h2>Add New Client</h2>
                                        <input type="text" id="rice-clientName" class="input-field" placeholder="Client Name">
                                        <input type="text" id="rice-clientArea" class="input-field" placeholder="Client Area">
                                        <p> <button class="add-btn" onclick="rice_addClient()">Add</button></p>
                                    </div>
                                </div>




                                <button class="calculate-button" onclick="rice_calculateFlour()">Calculate</button>
                            </div>
                            <div class="result-line" id="rice-result-line"></div>

                            </div>

                            <div class="popup" id="rice-historyPopup">
                            <div class="popup-content">
                                <?php if (is_loggedin()){ ?>
                                    <a href="#!" class="btn btn-md btn-primary position-absolute guest-login-btn" onclick="data_sync('rice_calculationHistory')">sync</a>
                                <?php } else { ?>
                                    <a href="login.php" class="btn btn-md btn-primary position-absolute guest-login-btn">Login to sync</a>
                                <?php } ?>
                                <span class="popup-close" onclick="rice_closePopup()">&#10006;</span>
                                <h2>Rice Calculation History</h2>
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
                                    <tbody id="rice-historyTable">
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