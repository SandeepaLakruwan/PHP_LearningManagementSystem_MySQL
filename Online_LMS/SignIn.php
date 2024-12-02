<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign In</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="system.png" />

</head>

<body>
<!-- Sign In process -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 vh-100 d-flex align-items-center justify-content-center">
                <div class="row">
                    <div class="mt-3">
                        <img src="system.png" class="icon" />
                        <label class="fs-2">Learning Management System</label>
                    </div>
                    <div class="col-12 mt-3">
                        <h1 class="text-primary text-center rounded-3">Sign In</h1>
                    </div>
<!-- enter details -->
                    <div class="col-2"></div>
                    <div class="col-8 d-block align-items-center bg-primary bg-opacity-10 rounded-3">
                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Username</label>
                            <input type="email" class="form-control" id="username" />
                        </div>

                        <div class="col-12 mt-3">
                            <label class="form-label text-black-50">Password</label>
                            <input type="password" class="form-control" id="password" />
                        </div>

                        <div class="col-12 mt-3" id="message">

                        </div>

                        <div class="d-grid mt-4">
                            <!-- go to sign in process -->
                            <button class="btn btn-primary" onclick="SignIn();">Sign In</button>
                        </div>
                        <div class="d-grid mt-2">
                            <form action="Register.php">
                                <!-- go to register page -->
                                <button class="btn btn-danger col-12" type="submit"> Haven't accont? Register</button>
                            </form>
                        </div>
                        <div class="col-6 mt-1 mb-3">
                            <a href="#" class="text-black-50">Forget Password?</a>
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