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
            if ($guest != 'yes') {
                include_once 'includes/aside.php';
            }
                ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>Basic Calculator</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer basic-calc">Calculate <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Flour Calculator</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer flour-cal">Calculate <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rice Calculator</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer rice-calc">Calculate <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>Sugar Calculator</h3>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer sugar-calc">Calculate <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php if ($data->role == 'admin') { ?>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin | Pet Sitter Approval</h3>
                                <h3 class="card-title position-absolute text-success h3 msg-table" style="left:50%;transform:translateX(-50%)"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Admin | Active Services</h3>
                                <h3 class="card-title position-absolute text-success h3" style="left:50%;transform:translateX(-50%)"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pet Sitter Info</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <h5 class="name">Name: <span></span></h5>
                        <h5 class="email">Email: <span></span></h5>
                        <h5 class="contact">Contact: <span></span></h5>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    <?php } ?>


    <?php if ($data->role == 'member' || $guest=='yes') { ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- Basic Calculator -->
                        <div class="container-calc" style="display: none;">
                            <div class="calculator-basic">
                                <form>
                                    <div class="display">
                                        <input type="text" name="display" id="display">
                                    </div>
                                    <div>
                                        <input type="button" value="CE" onclick="clearDisplay()" style="background-color: #DF908A; border-bottom: 2px solid #C13A33; border-right: 2px solid #C13A33; border-left: 2px solid #C13A33;">

                                        <input type="button" value="%" onclick="addPercentage()" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                        <input type="button" value="+/-" onclick="toggleSign()" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                        <input type="button" value="÷" onclick="addToDisplay('÷')" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input type="button" value="7" onclick="addToDisplay('7')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="8" onclick="addToDisplay('8')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="9" onclick="addToDisplay('9')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="×" onclick="addToDisplay('×')" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input type="button" value="4" onclick="addToDisplay('4')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="5" onclick="addToDisplay('5')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="6" onclick="addToDisplay('6')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="-" onclick="addToDisplay('-')" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">
                                    </div>
                                    <div>
                                        <input type="button" value="1" onclick="addToDisplay('1')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="2" onclick="addToDisplay('2')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="3" onclick="addToDisplay('3')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="+" onclick="addToDisplay('+')" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input type="button" value="0" onclick="addToDisplay('0')" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="." onclick="addToDisplay('.')" style="background-color: #B8B8AE;border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="⌫" onclick="backspace()" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="=" onclick="calculateResult()" style="background-color: #EFAA5F; color: black; border-bottom: 2px solid #E86D27; border-right: 2px solid #E86D27; border-left: 2px solid #E86D27;">

                                    </div>
                                </form>
                            </div>
                        </div>

                        <!-- Flour Calculator -->
                    <div id="flour-calculator" style="display: none;">
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
                                <input type="number" id="flour-amountInput" step="0.01">
                                <span class="clear-input" id="flour-clearInput" onclick="flour_clearInputField()">&#10006;</span>
                                <span class="history-icon" id="flour-historyIcon" onclick="flour_showCalculationHistory()">&#x21BB;</span>
                                </p>


                                <div class="search-container">
                                    <input type="text" id="flour-clientSearch" placeholder="Clients..." onkeyup="flour_filterClients()" oninput="flour_filterClients()">
                                    <i id="flour-addClientButton" class="fas fa-plus-circle" onclick="flour_addNewClientPopup()"></i>
                                    <span class="clear-input2" onclick="flour_clearClientInputField()">&#10006;</span>
                                    <div id="flour-clientDropdown" class="client-dropdown"></div> <!-- Add this line -->
                                </div>

                                <div id="flour-addClientModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close-icon" onclick="flour_closeAddClientModal()">&times;</span>
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
                                    <a href="" class="btn btn-md btn-primary position-absolute guest-login-btn">Login to sync</a>
                                    <span class="popup-close" onclick="flour_closePopup()">&#10006;</span>
                                    <h2>Calculation History</h2>
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

                         <!-- Rice Calculator -->
                        <div id="rice-calculator" style="display: none;">
                            <div class="container" id="rice-calculator-container">
                                <h3 class="text-center">Flour Calculator</h3>
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
                                <input type="number" id="rice-amountInput" step="0.01">
                                <span class="clear-input" id="rice-clearInput" onclick="clearInputField()">&#10006;</span>
                                <span class="history-icon" id="rice-historyIcon" onclick="showCalculationHistory()">&#x21BB;</span>
                                </p>


                                <div class="search-container">
                                    <input type="text" id="rice-clientSearch" placeholder="Clients..." onkeyup="filterClients()" oninput="filterClients()">
                                    <i id="rice-addClientButton" class="fas fa-plus-circle" onclick="addNewClientPopup()"></i>
                                    <span class="clear-input2" onclick="clearClientInputField()">&#10006;</span>
                                    <div id="rice-clientDropdown" class="client-dropdown"></div> <!-- Add this line -->
                                </div>

                                <div id="rice-addClientModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close-icon" onclick="closeAddClientModal()">&times;</span>
                                        <h2>Add New Client</h2>
                                        <input type="text" id="rice-clientName" class="input-field" placeholder="Client Name">
                                        <input type="text" id="rice-clientArea" class="input-field" placeholder="Client Area">
                                        <p> <button class="add-btn" onclick="addClient()">Add</button></p>
                                    </div>
                                </div>




                                <button class="calculate-button" onclick="calculateFlour()">Calculate</button>
                            </div>
                            <div class="result-line" id="rice-result-line"></div>

                            </div>

                            <div class="popup" id="rice-historyPopup">
                            <div class="popup-content">
                                <a href="" class="btn btn-md btn-primary position-absolute guest-login-btn">Login to sync</a>
                                <span class="popup-close" onclick="closePopup()">&#10006;</span>
                                <h2>Calculation History</h2>
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

                    <!-- Sugar Calculator -->
                    <div id="sugar-calculator" style="display: none;">
                        <div class="container" id="sugar-calculator-container">
                            <h3 class="text-center">Sugar Calculator</h3>
                            <div class="formula-line" id="formula-line"></div>
                            <div class="result-container" id="result-container">
                                <div class="result-box">
                                    <table>
                                        <tr>
                                            <th class="profit">Profit</th>
                                            <th class="remaining">Remaining</th>
                                        </tr>
                                        <tr>
                                            <td id="result1" class="profit">2.000 KG</td>
                                            <td id="result2" class="remaining">38.000 KG</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="input-container">
                                <p class="kgs">Enter the amount (in KGs): </p>
                                <input type="number" id="amountInput" step="0.01">
                                <span class="clear-input" id="clearInput" onclick="clearInputField()">&#10006;</span>
                                <span class="history-icon" id="historyIcon" onclick="showCalculationHistory()">&#x21BB;</span>
                                </p>


                                <div class="search-container">
                                    <input type="text" id="clientSearch" placeholder="Clients..." onkeyup="filterClients()" oninput="filterClients()">
                                    <i id="addClientButton" class="fas fa-plus-circle" onclick="addNewClientPopup()"></i>
                                    <span class="clear-input2" onclick="clearClientInputField()">&#10006;</span>
                                    <div id="clientDropdown" class="client-dropdown"></div> <!-- Add this line -->
                                </div>

                                <div id="addClientModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close-icon" onclick="closeAddClientModal()">&times;</span>
                                        <h2>Add New Client</h2>
                                        <input type="text" id="clientName" class="input-field" placeholder="Client Name">
                                        <input type="text" id="clientArea" class="input-field" placeholder="Client Area">
                                        <p> <button class="add-btn" onclick="addClient()">Add</button></p>
                                    </div>
                                </div>




                                <button class="calculate-button" onclick="calculateFlour()">Calculate</button>
                            </div>
                            <div class="result-line" id="result-line"></div>

                        </div>

                        <div class="popup" id="historyPopup">
                            <div class="popup-content">
                                <a href="" class="btn btn-md btn-primary position-absolute guest-login-btn">Login to sync</a>
                                <span class="popup-close" onclick="closePopup()">&#10006;</span>
                                <h2>Calculation History</h2>
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
                                    <tbody id="historyTable">
                                        <!-- History table rows will be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    </div>
                    <!--/.col (left) -->
                </div>


                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    <?php } else if ($data->role == 'owner') { ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">List of Pet Sitters</h3>
                            </div>
                            <!-- /.card-header -->

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Services Accepted</h3>
                                <h3 class="card-title position-absolute text-success h3 msg-table" style="left:50%;transform:translateX(-50%)"></h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <?php

                                check_end_date($db);

                                ?>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    <?php } ?>


</div>
<!-- /.content-wrapper -->

<?php include_once './includes/footer.php'; ?>
<script>
    $(document).ready(function() {

        $('#select_pet').on('change', function(e) {
            let pName = $(this).val();
            $.ajax({
                url: 'forms/ajax/requests.php',
                method: 'post',
                data: {
                    pName: pName
                },
                success: function(res) {
                    $('.render_data').html(res);
                }
            })
        });


        $('#pet_sitter').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            $.ajax({
                url: 'forms/data-submit.php',
                method: 'post',
                data: data,
                success: function(res) {
                    $('.msg').html(res);
                    setTimeout(function() {
                        location.reload()
                    }, 1800);
                }
            })
        });

        $('.btn-approve').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: 'forms/ajax/requests.php',
                method: 'post',
                data: {
                    approve_sitter: id
                },
                success: function(res) {
                    $('.msg-table').html(res);
                    setTimeout(function() {
                        location.reload()
                    }, 1800);
                }
            });
        });

        $('.btn-edit').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: 'forms/ajax/requests.php',
                method: 'post',
                data: {
                    edit_sitter_info: id
                },
                success: function(res) {
                    let data = JSON.parse(res);
                    $(`select[name="pet_name"] option[value=${data.pet_name}]`).attr('selected', true);
                    $('input[name="charges"]').val(data.charges);
                    $('input[name="services_offer"]').val(data.services_offer);
                    $('input[name="edit_id"]').val(data.id);
                    console.log(data);
                }
            });
        });

        $('.btn-sitter-info').on('click', function(e) {
            e.preventDefault();
            let getSitterInfo = $(this).data('sid');
            $.ajax({
                url: 'forms/ajax/requests.php',
                method: 'post',
                data: {
                    getSitterInfo: getSitterInfo
                },
                success: function(response) {
                    let res = JSON.parse(response);
                    $('.modal-body h5.name span').html(res.username);
                    $('.modal-body h5.email span').html(res.email);
                    $('.modal-body h5.contact span').html(res.contact);
                }
            })
        });

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            $.ajax({
                url: 'forms/ajax/requests.php',
                method: 'post',
                data: {
                    delete_sitter: id
                },
                success: function(res) {
                    $('.msg-table').html(res);
                    setTimeout(function() {
                        location.reload()
                    }, 1800);
                }
            });
        });

        $('.basic-calc').on('click', function(e) {
            e.preventDefault();
            $('#flour-calculator, #rice-calculator, #sugar-calculator').hide();
            $('.container-calc').show('slow');
        });
        $('.flour-cal').on('click', function(e) {
            e.preventDefault();
            $('.container-calc, #rice-calculator, #sugar-calculator').hide();
            $('#flour-calculator').show('slow');
        });
        $('.rice-calc').on('click', function(e) {
            e.preventDefault();
            $('.container-calc ,#flour-calculator, #sugar-calculator').hide();
            $('#rice-calculator').show('slow');
        });
        $('.sugar-calc').on('click', function(e) {
            e.preventDefault();
            $('.container-calc ,#flour-calculator, #rice-calculator').hide();
            $('#sugar-calculator').show('slow');
        });



    });
</script>



<script src="./dist/js/basic-calc.js"></script>