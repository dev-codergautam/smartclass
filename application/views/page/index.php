<div class="site-main-container">
    
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">लेटेस्ट न्यूज़ </h4>
                        <?php foreach($lnews as $lnews){ ?>
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <?php if($lnews->blogImg1 == ""){
                                    $img1 = base_url(). 'assets/image/default.jpg';
                                    } else{
                                    $img1 = base_url(). 'assets/image/blogs/'.$lnews->blogImg1;
                                    } ?>
                                    <img class="img-fluid" src="<?php echo $img1; ?>" alt="">
                                </div>
                                <ul class="tags">
                                    <?php $data['categ'] = $this->admin_datawork->get_id('category', ['catId' => $lnews->blogCat]); ?>
                                    <li><a href="<?= base_url(); ?>home/category/<?php echo $data['categ']['catSlug']; ?>">
                                            <?php echo $data['categ']['catHindi']; ?></a></li>
                                </ul>
                            </div>

                            <?php 
                                $input = $lnews->blogView;

                                $k = pow(10,3);
                                $mil = pow(10,6);
                                $bil = pow(10,9);

                                if($input >= $bil){
                                     $output = $input / $bil . 'B';
                                }
                                elseif($input >= $mil){
                                     $output = round($input / $mil, 1) . 'M';
                                }
                                elseif($input >= $k){
                                     $output = round($input / $k, 1) . 'K';
                                }
                                elseif($input == ""){
                                     $output = "0";
                                }
                                else{
                                     $output = $input;
                                }
                            ?>

                            <div class="col-lg-7 post-right">
                                <a href="<?= base_url(); ?>home/news/<?php echo $data['categ']['catSlug']; ?>/<?php echo $lnews->blogSlug; ?>">
                                    <h4>
                                        <?php echo $lnews->blogTitle ?>
                                    </h4>
                                </a>
                                <ul class="meta">
                                    <li><a href=""><span class="lnr lnr-calendar-full"></span>
                                            <?php echo $lnews->blogDate ?></a></li>
                                    <li><a href=""><span class="fa fa-clock-o"></span>
                                            <?php echo $lnews->blogTime ?></a></li>
                                    <li><a href=""><span class="fa fa-eye"></span> <b>
                                                <?php echo $output; ?></b></a></li>
                                </ul>
                                <p class="excert ">
                                    <?php echo $lnews->blogSubtitle ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-lg-12 text-right">
                            <a href="<?= base_url(); ?>morenews" class="btn btn-danger">और समाचार पढ़ें ...</a>
                        </div>
                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">न्यूज़</h4>
                        <div class="row mt-20 medium-gutters">
                            <?php foreach($news as $news){ ?>
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <?php if($news->blogImg1 == ""){
                                        $img = base_url(). 'assets/image/default.jpg';
                                        } else{
                                        $img = base_url(). 'assets/image/blogs/'.$news->blogImg1;
                                        } ?>
                                        <img class="img-fluid" src="<?php echo $img; ?>" alt="">
                                    </div>
                                    <ul class="tags">
                                        <?php $data['categ'] = $this->admin_datawork->get_id('category', ['catId' => $news->blogCat]); ?>
                                        <li><a href="#">
                                                <?php echo $data['categ']['catHindi']; ?></a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="image-post.html">
                                        <h4>
                                            <?php echo $news->blogTitle ?>
                                        </h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>
                                                <?php echo $news->blogDate ?></a></li>
                                        <li><a href="#"><span class="fa fa-clock-o"></span>
                                                <?php echo $news->blogTime ?></a></li>
                                        <li><a href=""><span class="fa fa-eye"></span> <b>
                                                <?php echo $news->blogView; ?></b></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?php echo $news->blogSubtitle ?>
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="col-lg-12 text-right">
                            <a href="<?= base_url(); ?>morenews" class="btn btn-danger">और पढ़ें</a>
                        </div>
                    </div>
                    <!-- End popular-post Area -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebars-area">
                        <div class="single-sidebar-widget editors-pick-widget">
                            <h6 class="title">न्यूज़ के प्रकार</h6>
                            <div class="editors-pick-post">
                                <div class="post-lists">
                                    <div class="single-post d-flex flex-row">
                                        <div class="editors-pick-post">
                                            <div class="post-lists">
                                                <div class="single-post d-flex flex-row">
                                                    <div class="detail">
                                                        <?php foreach($mainCate as $mainCate){ ?>
                                                        <a href="<?= base_url(); ?>home/category/<?php echo $mainCate->catSlug; ?>">
                                                            <h5 class="mb-2">
                                                                <?php echo $mainCate->catHindi; ?>
                                                            </h5>
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
                        </div>
                        <div class="single-sidebar-widget most-popular-widget">
                            <h6 class="title mb-4">लोकप्रिय</h6>
                            <div class="single-list flex-row d-flex">
                                <div class="details">
                                    <a href="image-post.html">
                                        <h6>Help Finding Information Online is so easy</h6>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="fa fa-eye fa-lg"></span> 06</a></li>
                                    </ul>
                                </div>
                            </div>
                      </div>
                        <div class="single-sidebar-widget social-network-widget">
                            <h6 class="title mb-4">Social Networks</h6>
                            <ul class="social-list">
                                <li class="d-flex justify-content-between align-items-center fb">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                        <p>983 Likes</p>
                                    </div>
                                    <a href="#">Like our page</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center tw">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                        <p>983 Followers</p>
                                    </div>
                                    <a href="#">Follow Us</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center yt">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                                        <p>983 Subscriber</p>
                                    </div>
                                    <a href="#">Subscribe</a>
                                </li>
                                <li class="d-flex justify-content-between align-items-center rs">
                                    <div class="icons d-flex flex-row align-items-center">
                                        <i class="fa fa-rss" aria-hidden="true"></i>
                                        <p>983 Subscribe</p>
                                    </div>
                                    <a href="#">Subscribe</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>
