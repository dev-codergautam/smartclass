<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Smart Class</title>
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
                background-image: url(../../../assets/image/main.png);
                background: -webkit-linear-gradient(to right, #93291E, #ED213A);
                background: linear-gradient(to right, #93291E, #ED213A);
            }
        </style>
</head>

<body id="" style="font-family: 'forum';">
    <main>
        <div class="col-lg-12 mt-5">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10 mt-4">
                    <div class="row mt-3">
                        <span class="mt-5"><?php echo $this->session->flashdata('error'); ?></span>
                        <div class="col-md-8 mt-5 d-none d-md-block text-ctr">
                            <div class="row justify-content-center">
                                <!-- <div class="col-lg-5 col-6">
                                    <img src="https://demo.skulam.com/assets/skulam-white-logo.svg" alt="Skulam" class="img-fluid">
                                </div> -->
                                <div class="col-lg-7"></div>
                            </div>
                            <h1 class="text-white mt-5">A Smart Class <br>Application!</h1>
                        </div>
                        <div class="col-md-4  col-sm-12 p-3 p-lg-1">
                            <div class="card shadow-sm rounded-0">
                                <div class="card-content">
                                    <div class="light center">
                                        <!-- <img src="https://demo.skulam.com/assets/image/schooldetail/ad5583859fe9a7e.png" alt="Logo" style="width:auto;height:70px;"> -->
                                        <h5 class="promo-caption h3 mt-4 mb-4">
                                            Smart Class </h5>
                                        <h4> LOGIN</h4>
                                    </div>
                                    <form class="" id="myForm" action="<?= base_url('auth/authenticate') ?>" method="post" novalidate="novalidate">
                                        <div class="input-field">
                                            <i class="material-icons prefix">account_circle</i>
                                            <input id="icon_prefix" type="text" class="validate" name="email" placeholder="Username" required="">
                                        </div>
                                        <div class="input-field">
                                            <i class="material-icons prefix">https</i>
                                            <input id="icon_prefix" type="password" class="validate" name="password" placeholder="Password" required="">
                                        </div>
                                        <!--  <div class="input-field ml-3">
                                            <p>
                                                <label>
                                                    <input type="checkbox">
                                                    <span>Stay signed in</span>
                                                </label>
                                            </p>
                                        </div> -->
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
                <h6>Powered by<b><a href="https://www.webjagriti.com" target="_blank" class="grey-text text-lighten-4 nav-link d-inline">Webjagriti</a></b> </h6>
            </div>
        </div>
    </main>


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





    <iframe frameborder="0" scrolling="no" style="background-color: transparent; border: 0px; display: none;"></iframe>
    <div id="GOOGLE_INPUT_CHEXT_FLAG" input="" input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:true,&quot;mk&quot;:true,&quot;ss&quot;:true}" style="display: none;"></div>
</body>

</html>
