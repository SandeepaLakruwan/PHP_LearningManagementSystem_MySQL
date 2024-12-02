<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Verify Account</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />

</head>

<body>
    <!-- User verification page. This will come when sign in process to verify user -->
    <!-- check if user log in or not -->
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
                        <h1 class="text-primary text-center rounded-3">Account Verification</h1>
                    </div>

                    <div class="col-2"></div>
                    <div class="col-8 d-block align-items-center bg-primary bg-opacity-10 rounded-3">
                        <div class="col-12 mt-3">
                            <!-- enter code which send to email -->
                            <label class="form-label text-black-50">Verification code</label>
                            <input type="text" class="form-control" id="code" />
                        </div>

                        <div class="col-12 mt-3" id="message">

                        </div>

                        <div class="d-grid mt-4 mb-4">
                            <!-- verify button -->
                            <button class="btn btn-primary" onclick="VerifyCode();">Verify</button>
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



    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>