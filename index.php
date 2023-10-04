<?php
require_once 'core/database.php';
if (!is_loggedin()) {
?><script>
        window.location.href = "login.php";
    </script><?php
            }
            include_once 'includes/header.php';
            include_once 'includes/aside.php';
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
                        <a href="#" class="small-box-footer">Calculate <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">Calculate <i class="fas fa-arrow-circle-right"></i></a>
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
                        <a href="#" class="small-box-footer">Calculate <i class="fas fa-arrow-circle-right"></i></a>
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


    <?php if ($data->role == 'member') { ?>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="container" id="calculator-container" style="display: none;">
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

        $('.flour-cal').on('click', function(e){
            e.preventDefault();
            $('#calculator-container').show('slow');
        })

    });
</script>


<!-- <script>
    const clients = JSON.parse(localStorage.getItem("clients")) || [];

    function closeClientDropdown() {
        const clientDropdown = document.getElementById("clientDropdown");
        clientDropdown.style.display = 'none';
    }

    function clearClientInputField() {
        const clientSearch = document.getElementById("clientSearch");
        clientSearch.value = "";
        clientSearch.focus();
        filterClients();
    }

    function clearInputField() {
        const amountInput = document.getElementById("amountInput");
        amountInput.value = "";
        amountInput.focus();
    }

    function calculateFlour() {
        const amount = parseFloat(document.getElementById("amountInput").value);
        const result = (amount * 50 / 1000);
        const secondAmount = amount - result;
        document.getElementById("result1").innerHTML = `${result.toFixed(3)} KG`;
        document.getElementById("result2").innerHTML = `${secondAmount.toFixed(3)} KG`;
        document.getElementById("formula-line").innerHTML = `${amount.toFixed(2)} KG × 50 ÷ 1000 - ${amount.toFixed(2)} KG = ${secondAmount.toFixed(3)} KG`;
        document.querySelector(".input-container").style.display = "block";
        document.getElementById("result-container").style.display = "block";
        document.getElementById("result-line").style.display = "block";
        setTimeout(() => {
            document.getElementById("result-container").classList.add("active");
        }, 100);
        storeCalculationHistory(amount.toFixed(2), result.toFixed(3), secondAmount.toFixed(3));
    }

    function showCalculationHistory() {
        const historyPopup = document.getElementById("historyPopup");
        const historyTable = document.getElementById("historyTable");
        historyTable.innerHTML = "";
        const calculationHistory = JSON.parse(localStorage.getItem("calculationHistory")) || [];
        calculationHistory.reverse().forEach((entry) => {
            const row = document.createElement("tr");
            row.innerHTML = `
                <td>${entry.timestamp}</td>
                <td>${entry.client}</td>
                <td>${entry.input}</td>
                <td>${entry.profit}</td>
                <td>${entry.remaining}</td>
            `;
            historyTable.appendChild(row);
        });
        historyPopup.style.display = "block";
        document.getElementById("historyIcon").innerHTML = "&#x21BB;";
    }

    function closePopup() {
        document.getElementById("historyPopup").style.display = "none";
        document.getElementById("historyIcon").innerHTML = "&#x21BB;";
    }

    function storeCalculationHistory(input, profit, remaining) {
        const clientSearch = document.getElementById("clientSearch");
        const clientValue = clientSearch.value;
        const now = new Date();
        const day = now.toLocaleDateString('en-US', {
            day: '2-digit'
        });
        const month = now.toLocaleDateString('en-US', {
            month: '2-digit'
        });
        const hours = now.toLocaleTimeString('en-US', {
            hour: 'numeric',
            hour12: true
        });
        const timestamp = `${day}-${month} / ${hours}`;
        const entry = {
            timestamp,
            input,
            profit,
            remaining,
            client: clientValue
        };
        let calculationHistory = JSON.parse(localStorage.getItem("calculationHistory")) || [];
        calculationHistory.push(entry);
        if (calculationHistory.length > 40) {
            calculationHistory.shift();
        }
        localStorage.setItem("calculationHistory", JSON.stringify(calculationHistory));
    }

    function filterClients() {
        const input = document.getElementById("clientSearch");
        const filter = input.value.toLowerCase();
        const clientDropdown = document.getElementById("clientDropdown");
        clientDropdown.innerHTML = '';
        clientDropdown.style.display = 'block';
        let filteredClients = clients.slice(-3).reverse().filter(client => client.name.toLowerCase().includes(filter) || client.area.toLowerCase().includes(filter));
        for (const client of filteredClients) {
            const clientDiv = document.createElement("div");
            clientDiv.innerHTML = client.name + " (" + client.area + ")";
            clientDiv.onclick = function() {
                input.value = client.name + " (" + client.area + ")";
                clientDropdown.style.display = 'none';
            }
            clientDropdown.appendChild(clientDiv);
        }
        const addNewDiv = document.createElement("div");
        addNewDiv.innerHTML = "<strong>Add New Client...</strong>";
        addNewDiv.onclick = addNewClientPopup;
        clientDropdown.appendChild(addNewDiv);
        const closeDiv = document.createElement("div");
        closeDiv.innerHTML = "<strong>Close</strong>";
        closeDiv.onclick = closeClientDropdown;
        clientDropdown.appendChild(closeDiv);
    }

    function addNewClientPopup() {
        const modal = document.getElementById("addClientModal");
        modal.style.display = "block";
        document.body.classList.add('no-scroll'); // Add the class to the body
    }

    function closeAddClientModal() {
        const modal = document.getElementById("addClientModal");
        modal.style.display = "none";
        document.body.classList.remove('no-scroll'); // Remove the class from the body
    }

    function addClient() {
        const clientName = document.getElementById("clientName").value;
        const clientArea = document.getElementById("clientArea").value;
        const client = {
            name: clientName,
            area: clientArea
        };
        clients.push(client);
        localStorage.setItem("clients", JSON.stringify(clients));
        document.getElementById("clientName").value = "";
        document.getElementById("clientArea").value = "";
        document.getElementById("clientSearch").value = clientName + " (" + clientArea + ")";
        closeAddClientModal();
    }

    document.addEventListener('click', function(event) {
        const input = document.getElementById("clientSearch");
        const dropdown = document.getElementById("clientDropdown");
        if (!input.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = 'none';
        }
    });

    document.getElementById("clientSearch").addEventListener('focus', function() {
        document.getElementById("clientDropdown").style.display = 'block';
    });

    document.addEventListener("DOMContentLoaded", function() {
        const clientSelect = document.getElementById("clientSelect");
        clients.forEach(client => {
            const option = document.createElement("option");
            option.value = client.name;
            option.text = client.name + " (" + client.area + ")";
            clientSelect.appendChild(option);
        });
    });
</script> -->