<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Payments</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />

</head>

<body>
    <!-- Payments adding is in here when your portal expired -->
    <!-- Check user log in or not -->
    <?php session_start();
    if (!isset($_SESSION["u"])) {
        header("Location: SignIn.php");
        exit;
    }
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 vh-100 d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="mt-3">
                        <img src="system.png" class="icon" />
                        <label class="fs-2">Learning Management System</label>
                    </div>
                    <div class="col-12 mt-3">
                        <h1 class="text-primary text-center rounded-3">Make Payment</h1>
                    </div>

                    <div class="col-2"></div>
                    <!-- payment adding button -->
                    <div class="col-8 d-block align-items-center bg-primary bg-opacity-10 rounded-3">
                        <div class="col-12 mt-3">
                            <div class="row">
                                <!-- Onclick the button user redirect to the PayHere payment gateway -->
                            <form action="https://sandbox.payhere.lk/pay/...">

                                <div id="payhere-form" data-pay-id="..." data-type="SANDBOX">
                                    <button id="payhere-button" type="submit" class="payhere btn btn-primary mb-4 mt-1 fs-4">Pay Here</button>
                                </div>

                            </form>
                            </div>
                        </div>


                    </div>

                    <div class="col-12 text-center text-black-50 mt-2 mb-2">
                        <label>Learning.lk | Solution by Sandeepa&copy; 2023</label>
                    </div>

                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img src="signIn.png" class="img1" />
            </div>
        </div>

    </div>


    <script src="https://sandbox.payhere.lk/payhere.pay.button.js" id="payhere-button"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>