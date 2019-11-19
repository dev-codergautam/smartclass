<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blaze News 9 Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="" type="image/x-icon" />
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" type="text/css">
    <!-- Compiled and minified CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Compiled and minified CSS -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!-- ! Datatable -->
    <style>
        @media (max-width: 576px) {
                .margin-top {
                    margin-top: 20px;
                }
                .margin-top2 {
                    margin-top: 1px;
                }


                h1 {
                    line-height: 40px;
                    font-size: 26px;
                }
                .text-ctr {
                    text-align: center !important;
                }
            }

            /* large */

            @media (min-width: 576px) {
                .margin-top {
                    margin-top: 80px;
                }


                .margin-top2 {
                    margin-top: 50px;
                }
                h1 {
                    line-height: 70px;
                    font-size: 46px;
                }
                .text-ctr {}
            }

            h1 {
                font-weight: 100;
            }

            h1 span {
                font-weight: 900;
            }
        </style>
    <style>
        body {
                background: #ED213A;
                background: -webkit-linear-gradient(to right, #93291E, #ED213A);
                background: linear-gradient(to right, #93291E, #ED213A);
            }
        </style>

</head>

<body>
    <main>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="row margin-top">
                        <?php echo $this->session->flashdata('error'); ?>
                        <div class="col-md-8 margin-top text-ctr">
                            <div class="row justify-content-center">
                                <div class="col-lg-5 col-6">
                                </div>
                                <div class="col-lg-7"></div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 p-3 p-lg-1 mt-5">
                            <div class="card">
                                <div class="card-content">
                                    <div class="light center">
                                        <h5 class="promo-caption mt-4 mb-4">
                                            Blaze News 9
                                            <br> <small>News Portal</small>
                                        </h5>
                                        <h4>ADMIN LOGIN</h4>
                                    </div>
                                    <form class="" id="myForm" action="<?= base_url('home/adminlogin'); ?>" method="post">
                                        <div class="input-field">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" class="validate" name="email" placeholder="Username" required>
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">https</i>
                                            <input id="icon_prefix" type="password" class="validate" name="password" placeholder="Password" required>
                                        </div>
                                        <!--                                                <div class="input-field ml-3">
                                                    <p>
                                                        <label>
                                            <input type="checkbox" />
                                            <span>Stay signed in</span>
                                            </label>
                                                    </p>
                                                </div>-->
                                        <div class="">
                                            <button class="btn waves-effect btn-block waves-light" type="submit" name="action">Login<i class="material-icons right">send</i> </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>

        <div class="footer-copyright p-3 pb-5">
            <div class="container text-white text-ctr">


            </div>
        </div>
    </main>
</body>

<script type="text/javascript">
    (function($, W, D) {
        var JQUERY4U = {};
        JQUERY4U.UTIL = {
            setupFormValidation: function() {
                //form validation rules
                $("#myForm").validate({
                    rules: {
                        username: "required",
                        password: "required"
                    },
                    messages: {

                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
        }
        //when the dom has loaded setup form validation rules
        $(D).ready(function($) {
            JQUERY4U.UTIL.setupFormValidation();
        });
    })(jQuery, window, document);

</script>


</html>
