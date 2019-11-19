<div class="site-main-container">
	<?php foreach($news as $news){} ?>
	<!-- Start latest-post Area -->
	<section class="latest-post-area pb-120">
		<div class="container no-padding">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start single-post Area -->
					<div class="single-post-wrap">
						<div class="feature-img-thumb relative">
							<div class="overlay overlay-bg"></div>
							<?php if($news->blogImg1 == ""){
                                $img1 = base_url(). 'assets/image/default.jpg';
                            } else{
                                $img1 = base_url(). 'assets/image/blogs/'.$news->blogImg1;
                            } ?>
                            <img class="img-fluid" src="<?php echo $img1; ?>" alt="<?= $news->blogTitle ?>">
						</div>
						<?php 
                                $input = $news->blogView;

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

						<div class="content-wrap">
							<ul class="tags mt-10">
								<?php $data['categ'] = $this->admin_datawork->get_id('category', ['catId' => $news->blogCat]); ?>
                                <li><a href="#"><?php echo $data['categ']['catHindi']; ?></a></li>
							</ul>
							<a href="#">
								<h3><?php echo $news->blogTitle ?></h3>
							</a>
							<ul class="meta pb-20">
								<li><a href=""><span class="lnr lnr-calendar-full"></span><?php echo $news->blogDate ?></a></li>
                                <li><a href=""><span class="fa fa-clock-o"></span> <?php echo $news->blogTime ?></a></li>
                                <li><a href=""><span class="fa fa-eye"></span> <b><?php echo $output; ?></b></a></li>
							</ul>

							<?php echo $news->blogData ?>
							<?php if(!empty($news->blogYoutube)){ ?>
							<?php
							    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $news->blogYoutube, $matches);
							    $id = $matches[1];
							?>
							<div class="embed-responsive embed-responsive-16by9 mt-4 mb-3">
							<iframe class="embed-responsive-item" id="ytplayer" type="text/html"
							    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
							    frameborder="0" allowfullscreen></iframe>
							</div>
						<?php } ?>

							<h3 class="tags mt-10"><?php echo $news->blogUrl ?></h3>						
						</div>
					</div>
					<!-- End single-post Area -->
				</div>
				<div class="col-lg-4">
					<div class="sidebars-area">
						<div class="single-sidebar-widget editors-pick-widget">
							<h6 class="title">सम्बंधित समाचार </h6>
							<?php foreach($categoryNews as $allnews){ ?>
							<div class="editors-pick-post">
								<div class="feature-img-wrap relative">
									<div class="feature-img relative">
										<div class="overlay overlay-bg"></div>
										<?php if($allnews->blogImg1 == ""){
			                                $img = base_url(). 'assets/image/default.jpg';
			                            } else{
			                                $img = base_url(). 'assets/image/blogs/'.$allnews->blogImg1;
			                            } ?>
										<img class="img-fluid" src="<?php echo $img; ?>" alt="">
									</div>
									<ul class="tags">
										<?php $data['categ1'] = $this->admin_datawork->get_id('category', ['catId' => $allnews->blogCat]); ?>
                                		<li><a href="#"><?php echo $data['categ1']['catHindi']; ?></a></li>
									</ul>
								</div>
								<div class="">
									<a href="<?= base_url(); ?>home/news/<?php echo $data['categ1']['catSlug']; ?>/<?php echo $allnews->blogSlug; ?>">
										<h4 class="mt-20"><?php echo $allnews->blogTitle; ?></h4>

										<h6 class="mt-3"><?php echo $allnews->blogSubtitle; ?></h6>
									</a>
									<ul class="meta">
										<li><a href=""><span class="lnr lnr-calendar-full"></span><?php echo $allnews->blogDate ?></a></li>
		                                <li><a href=""><span class="fa fa-clock-o"></span> <?php echo $allnews->blogTime ?></a></li>
		                                <li><a href=""><span class="fa fa-eye"></span> <b><?php echo $allnews->blogView ?></b></a></li>
									</ul>
								</div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End latest-post Area -->
</div>