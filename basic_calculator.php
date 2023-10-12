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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">

                        <!-- Basic Calculator -->
                        <div class="container-calc">
                            <div class="calculator-basic">
                                <form>
                                    <div class="display">
                                        <input type="text" name="display" id="display">
                                        <span id="displaySpan"></span>
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

                    </div>
                </div>
            </div>
        </section>




<?php include_once './includes/footer.php'; ?>
<script src="./dist/js/basic-calc.js"></script>