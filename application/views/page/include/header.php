<!DOCTYPE html>
<html lang="" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Blaze News 9 | ख़बरों में धार भी वार भी </title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/linearicons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/bootstrap.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/animate.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/owl.carousel.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/jquery-ui.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/csshome/main.css">
</head>

<body style="font-family: sans-serif;">
    <header>
    <!--
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
                        <ul>
                            <li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+440 012 3654 896</span></a></li>
                            <li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>support@colorlib.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    -->
        <div class="logo-wrap">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
                        <a href="index.html">
                            <img class="w-50" src="<?= base_url('assets/image/logo.png') ?>" alt="Blaze News 9 Logo">
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <?php $allcat = $this->admin_datawork->get_data('category', ['catParent' => '0']); ?>
        <div class="container main-menu" id="main-menu">
            <div class="row align-items-center justify-content-between">
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li class="menu-active"><a href="<?= base_url(); ?>">होम</a></li>
                        <?php foreach($allcat as $allcat): ?>
                        <li class="menu-has-children"><a href="<?= base_url(); ?>home/category/<?= $allcat->catSlug; ?>"><?= $allcat->catHindi; ?></a>
                            <?php $countdata = $this->admin_datawork->count_all_con('category', ['catParent' => $allcat->catId]); ?>
                            <?php if($countdata > 0): ?>
                            <ul>
                                <?php $subcat = $this->admin_datawork->get_data('category', ['catParent' => $allcat->catId]); ?>
                                <?php foreach($subcat as $subcat): ?>
                                <li><a href="<?= base_url(); ?>home/subcategory/<?= $subcat->catSlug; ?>"><?= $subcat->catHindi; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                        <li class="menu-active"><a href="<?= base_url('home/videos'); ?>">Video News</a></li>
                    </ul>
                </nav><!-- #nav-menu-container -->
                <!--
                <div class="navbar-right">
                    <form class="Search">
                        <input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
                        <label for="Search-box" class="Search-box-label">
                            <span class="lnr lnr-magnifier"></span>
                        </label>
                        <span class="Search-close">
                            <span class="lnr lnr-cross"></span>
                        </span>
                    </form>
                </div>
                =-->
            </div>
        </div>
    </header>
<!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row small-gutters">
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>ब्रेकिंग न्यूज़ : </span>
                            <?php  
                                date_default_timezone_set('Asia/Calcutta');
                                $date = date("d-m-Y");  
                                $brkNws = $this->admin_datawork->get_table('blog', ['blogDate' => $date], 'blogId DESC');
?>
                            <?php if(!empty($brkNws)){ ?>
                            <marquee onmouseover="this.stop()" onmouseout="this.start()">
                                <?php foreach($brkNws as $brkNws){ ?>
                                <?php $data['cat2'] = $this->admin_datawork->get_id('category', ['catId' => $brkNws->blogCat]); ?>
                                <a class="ml-3 mr-3" href="<?= base_url(); ?>home/news/<?php echo $data['cat2']['catSlug']; ?>/<?php echo $brkNws->blogSlug; ?>">
                                    <?php echo $brkNws->blogTitle ?></a> <span class="text-muted">|</span>
                                <?php } ?>
                            </marquee>
                            <?php } ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-post Area -->