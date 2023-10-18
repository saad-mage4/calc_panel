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

                        <!-- <div class="calculator-basic">
                        <form action="#" name="datas">
                            <div id="screen" class="screen" name="screen">
                                <div class="dis1"></div>
                                <div class="dis2"></div>
                                <div class="dis3"></div>
                            </div>

                            <div class="button_wrapper">
                                <div style="background-color: #DF908A; border-bottom: 2px solid #C13A33; border-right: 2px solid #C13A33; border-left: 2px solid #C13A33;" class="clear buttons">C</div>
                                <div class="ce_clear buttons">CE</div>
                                <div class="oper buttons">%</div>
                                <div class="oper buttons">/</div>
                                <div class="number buttons">7</div>
                                <div class="number buttons">8</div>
                                <div class="number buttons">9</div>
                                <div class="oper buttons">x</div>
                                <div class="number buttons">4</div>
                                <div class="number buttons">5</div>
                                <div class="number buttons">6</div>
                                <div class="oper buttons">-</div>
                                <div class="number buttons">1</div>
                                <div class="number buttons">2</div>
                                <div class="number buttons">3</div>
                                <div class="oper buttons">+</div>
                                <div class="number zero buttons">0</div>
                                <div class="dot number buttons">.</div>
                                <div class="equal buttons">=</div>
                            </div>
                        </form>
                    </div> -->

                            <div class="calculator-basic">
                                <form>
                                    <div class="display">
                                        <div class="dis1"></div>
                                        <div class="dis2"></div>
                                        <div class="dis3"></div>
                                        <span id="displaySpan"></span>
                                    </div>
                                    <div>
                                        <input class="clear ce_clear buttons" type="button" value="CE" style="background-color: #DF908A; border-bottom: 2px solid #C13A33; border-right: 2px solid #C13A33; border-left: 2px solid #C13A33;">

                                        <input class="oper buttons" type="button" value="%" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                        <input type="button" value="+/-" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                        <input class="oper buttons" type="button" value="/" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input class="number buttons" type="button" value="7" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="8" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="9" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="oper buttons" type="button" value="x" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input class="number buttons" type="button" value="4" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="5" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="6" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="oper buttons" type="button" value="-" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">
                                    </div>
                                    <div>
                                        <input class="number buttons" type="button" value="1" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="2" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="number buttons" type="button" value="3" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="oper buttons" type="button" value="+" style="background-color: #ACB0B9; border-bottom: 2px solid #707787; border-right: 2px solid #707787; border-left: 2px solid #707787;">

                                    </div>
                                    <div>
                                        <input class="number zero buttons" type="button" value="0" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="dot number buttons" type="button" value="." style="background-color: #B8B8AE;border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input type="button" value="⌫" style="background-color: #B8B8AE; border-bottom: 2px solid #87877A; border-right: 2px solid #87877A; border-left: 2px solid #87877A;">

                                        <input class="equal buttons" type="button" value="=" style="background-color: #EFAA5F; color: black; border-bottom: 2px solid #E86D27; border-right: 2px solid #E86D27; border-left: 2px solid #E86D27;">

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