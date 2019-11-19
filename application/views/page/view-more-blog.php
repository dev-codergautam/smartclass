<div class="site-main-container">
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">ब्लेज़ न्यूज़ 9 समाचार </h4>
                        <?php foreach($allnews as $lnews){ ?>
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
                                    <li><a href="#"><?php echo $data['categ']['catHindi']; ?></a></li>
                                </ul>
                            </div>
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
                                </ul>
                                <p class="excert">
                                    <?php echo $lnews->blogSubtitle ?>
                                </p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <?= $this->pagination->create_links(); ?>
                    </div>
                    <!-- End latest-post Area -->
                </div>
                <div class="col-lg-4">
                    <div class="sidebars-area">
                        <div class="single-sidebar-widget editors-pick-widget">
                            <h6 class="title">Editor’s Pick</h6>
                            <div class="editors-pick-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="img/e1.jpg" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">Travel</a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="image-post.html">
                                        <h4 class="mt-20">A Discount Toner Cartridge Is
                                            Better Than Ever.</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li>
                                        <li><a href="#"><span class="lnr lnr-calendar-full"></span>03 April, 2018</a></li>
                                        <li><a href="#"><span class="lnr lnr-bubble"></span>06 </a></li>
                                    </ul>
                                    <p class="excert">
                                        Lorem ipsum dolor sit amet, consecteturadip isicing elit, sed do eiusmod tempor incididunt ed do eius.
                                    </p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>
