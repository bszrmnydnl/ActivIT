<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body">
                    <a href="table.php">&lt TABLE</a><br>
                    <div class="row">
                        <div class="col-lg-6 col-xl-8 offset-xl-2">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4" id="title">Billing address</h4>
                                </div>
                                <form class="user" action="includes/data_inc.php" method="post" id="multistepForm" name="submit">
                                    <div id="fields" class="fields-group">

                                        <div class="tab">
                                            <h6 class="text-dark mb-4" id="title">Name</h6>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="firstname" placeholder="First name" name="firstname"></div>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="lastname" placeholder="Last name" name="lastname"></div>
                                        </div>

                                        <div class="tab">
                                            <h6 class="text-dark mb-4" id="title">Address</h6>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="street" placeholder="Street" name="street"></div>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="no" placeholder="No." name="no"></div>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="zip" placeholder="Zip code" name="zip"></div>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="town" placeholder="Municipality" name="town"></div>

                                        </div>

                                        <div class="tab">
                                            <h6 class="text-dark mb-4" id="title">Bank account</h6>
                                            <div class="form-group"><input class="form-control form-control-user" type="text" id="iban" placeholder="IBAN" name="iban"></div>
                                        </div>

                                    </div>
                                    <div class="form-row" id="btns" style="overflow: auto">
                                        <div class="col"><button class="btn btn-secondary btn-block text-white btn-user" id="prevBtn" type="button" onclick="nextPrev(-1)">Previous</button></div>
                                        <div class="col"><button class="btn btn-primary btn-block text-white btn-user" id="nextBtn" type="button" onclick="nextPrev(1)">Next</button></div>
                                    </div>


                                    <div style="text-align:center;margin-top:40px;">
                                        <span class="step"></span>
                                        <span class="step"></span>
                                        <span class="step"></span>
                                    </div>
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