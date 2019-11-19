<!DOCTYPE html>
<html lang="en">
<?php
$loginuser = $this->admin_datawork->get_data('admin', ['ad_id' => $this->session->userdata('sc_authenticate')]);
    foreach($loginuser as $loginuser){}
        if($loginuser->image == ""){
            $photo = base_url() . "assets/image/em-boy-1.svg";
        }
        else {
            $photo = base_url() . "assets/image/admin/".$loginuser->image;
        }
    ?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title> Smart Class</title>
    <link rel="icon" href="" type="image/x-icon" />
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/main.css" type="text/css">

    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/default-skin.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/css/photoswipe.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Date and Time css -->

    <!-- Date and Time css -->
    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/js/sweetalert.min.js"></script>
    <!-- Sweet Alert Js -->
    <script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/pace.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
</head>

<body class="app sidebar-mini rtl">
    <header class="app-header">
        <a class="app-header__logo small-200" href="<?= base_url(); ?>admin/index">
            <p class="text-truncate mb-0">JIIT Smart Class</p>
        </a>
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <ul class="app-nav">
            <script type="text/javascript">
                window.onload = initClock;

                function initClock() {
                    var now = new Date();
                    var hr = now.getHours();
                    var min = now.getMinutes();
                    var sec = now.getSeconds();
                    if (min < 10) min = "0" + min; // insert a leading zero
                    if (sec < 10) sec = "0" + sec;
                    if (hr == 0) {
                        hr = 12;
                    }

                    if (hr > 12) {
                        hr = hr - 12;
                        if (hr < 10) hr = "0" + hr; // insert a leading zero
                        session = "PM";
                    } else {
                        session = "AM";
                    }
                    document.getElementById('clockDisplay').innerHTML = "" + hr + ":" + min + ":" + sec + " " + session;
                    setTimeout('initClock()', 500);
                }

            </script>

            <li class="dropdown d-none d-lg-block bg-dark">
                <a class="app-nav__item text-white" style="width:170px;">
                    <div class="h5 m-0"><i class="fa fa-clock-o px-2"></i> <span id="clockDisplay" class="mb-0"></span></div>
                </a>
            </li>

            <!-- <li class="app-search d-none d-lg-block something">
                <?php echo form_open('search/result', ['method' => 'get', 'id' => 'searCh']); ?>
                <input class="app-search__input" placeholder="Search" name="query" id="search_data" type="text" autocomplete="off" onkeyup="skulamERP();" style="width: 370px;">
                <button type="submit" class="app-search__button"><i class="fa fa-search"></i></button>
                <?php echo form_close(); ?>
                <div id="suggestions" class="app-notification app-notification2 dropdown-menu">
                    <div id="autoSuggestionsList" class="app-notification__content app-notification__content2">
                    </div>
                </div>
            </li> -->
            <!-- start (JS code) -->
            <script type="text/javascript">
                function skulamERP() {
                    var input_data = $('#search_data').val();
                    if (input_data.length === 0) {
                        $('#suggestions').hide();
                    } else {
                        var post_data = {
                            'query': input_data,
                            '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?= base_url(); ?>search/autocomplete/",
                            data: post_data,
                            success: function(data) {
                                // return success
                                if (data.length > 0) {
                                    $('#suggestions').show();
                                    $('#autoSuggestionsList').addClass('auto_list');
                                    $('#autoSuggestionsList').html(data);
                                    $('#search_data').bind('keyup change', function(ev) {
                                        // pull in the new value
                                        //var searchTerm = $(this).val();
                                        // remove any old highlighted terms
                                        $('#autoSuggestionsList').removeHighlight();
                                        // disable highlighting if empty
                                        if (input_data) {
                                            // highlight the new term
                                            $('#autoSuggestionsList').highlight(input_data);
                                        }
                                    });
                                }
                            }
                        });
                    }
                }

            </script>
            <script type="text/javascript">
                $(function() {

                });

            </script>

            <!-- end (JS code) -->
            <!-- end (JS code) -->
            <script type="text/javascript">
                (function($, W, D) {
                    var JQUERY4U = {};
                    JQUERY4U.UTIL = {
                        setupFormValidation: function() {
                            //form validation rules
                            $("#searCh").validate({
                                rules: {
                                    query: {
                                        required: true,
                                        alphanumeric: true
                                    }
                                },
                                messages: {
                                    query: '',
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
            <!-- end (JS code) -->

            <script src="<?= base_url(); ?>assets/js/highlight.js"> </script>
            <style type="text/css">
                .highlight {
                    color: red;
                    font-weight: 700;
                }

            </style>

            <li class="dropdown d-none d-lg-block" id="karthik">
                <a class="app-nav__item text-white" onclick="openFullscreen();"><i class="fa fa-lg fa-expand"></i></a>
            </li>
            <li class="dropdown d-none d-lg-block" id="karthik">
                <a class="app-nav__item text-white" onclick="closeFullscreen();"><i class="fa fa-lg fa-compress"></i></a>
            </li>

            <script>
                var elem = document.documentElement;

                function openFullscreen() {
                    if (elem.requestFullscreen) {
                        elem.requestFullscreen();
                    } else if (elem.mozRequestFullScreen) { /* Firefox */
                        elem.mozRequestFullScreen();
                    } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
                        elem.webkitRequestFullscreen();
                    } else if (elem.msRequestFullscreen) { /* IE/Edge */
                        elem.msRequestFullscreen();
                    }
                }

                function closeFullscreen() {
                    if (document.exitFullscreen) {
                        document.exitFullscreen();
                    } else if (document.mozCancelFullScreen) {
                        document.mozCancelFullScreen();
                    } else if (document.webkitExitFullscreen) {
                        document.webkitExitFullscreen();
                    } else if (document.msExitFullscreen) {
                        document.msExitFullscreen();
                    }
                }

            </script>


            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user-o fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <span class="d-md-none">
                        <li>
                            <a class="dropdown-item" href="<?= base_url(); ?>admin/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a>
                        </li>
                    </span>
                    <div class="dropdown-menu settings-menu dropdown-menu-right user-dd animated flipInY show d-none d-lg-block" style="width: 300px;">
                        <div class="d-flex no-block align-items-center p-3 mb-2">
                            <div class=""><img src="<?php echo $photo; ?>" alt="user" class="rounded-circle" width="80"></div>
                            <div class="ml-3">
                                <h4 class="mb-0">
                                    <?= $loginuser->name; ?>
                                </h4>
                                <p class=" mb-0 text-muted">
                                    <?= $loginuser->email; ?>
                                </p>
                                <a class="btn btn-danger my-3" href="<?= base_url(); ?>admin/logout"><i class="fa fa-power-off mr-1 ml-1"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </ul>
            </li>
        </ul>
    </header>
    <?php include_once(APPPATH."views/admin/include/sidebar.php");  ?> 
    