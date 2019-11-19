<div class="site-main-container">
    <!-- Start latest-post Area -->
    <section class="pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12 mt-4">
                    <div class="row">
                        <?php foreach($videos as $videos){ ?>
                        <?php
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $videos->videoLink, $matches);
                        $id = $matches[1];
                        ?>
                        <div class="col-lg-4 col-12">
                            <div class="embed-responsive embed-responsive-16by9 mt-4 mb-3">
                                <iframe class="embed-responsive-item" id="ytplayer" type="text/html"
                                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                frameborder="0" allowfullscreen></iframe>
                            </div>
                            <div class="mt-2">
                                <h5><?php echo $videos->videoName; ?></h5>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-lg-12 mt-4">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>
</div>