<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-6">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 col-xl-12 offset-xl-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Login</h4>
                                </div>
                                <form class="user" action="includes/loginsys/register_inc.php" method="post">
                                    <div class="form-group"><input class="form-control form-control-user" type="text"
                                                                   id="username" placeholder="Username" name="username">
                                    </div>
                                    <div class="form-group"><input class="form-control form-control-user" type="email"
                                                                   id="email" placeholder="Email" name="email"></div>
                                    <div class="form-group"><input class="form-control form-control-user"
                                                                   type="password" id="password" placeholder="Password"
                                                                   name="password"></div>
                                    <div class="form-group"><input class="form-control form-control-user"
                                                                   type="password" id="password_rpt"
                                                                   placeholder="Repeat password" name="password_rpt">
                                    </div>
                                    <button class="btn btn-primary btn-block text-white btn-user" type="submit"
                                            name="submit">Register
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
<script src="assets/js/script.min.js"></script>
</body>

</html>