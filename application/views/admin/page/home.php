<div class="row">
    <div class="col-md-9">
       <?= $this->session->flashdata('success') ?>
        <div class="row">
            <!-- TOTAL SUBJECT -->
            <div class="col-md-4 col-sm-6 col-6">
                <div class="small-box bg-primary">
                    <div class="inner p-3">
                        <h3><?= $this->admin_datawork->count_data('subjects',['subParent'=> '0']) ?></h3>
                        <h5>Total Subjects</h5>
                    </div>
                    <div class="icon"><i class="fa fa-book" aria-hidden="true"></i></div>
                    <a href="<?= base_url('admin/subject') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- TOTAL TOPICS -->
            <div class="col-md-4 col-sm-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner p-3">
                        <h3><?= $this->admin_datawork->count_data('subjects',['subParent !='=> '0']) ?></h3>
                        <h5>Total Lession</h5>
                    </div>
                    <div class="icon"><i class="fa fa-copy"></i></div>
                    <a href="<?= base_url('admin/subject') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- TOTAL LESSION -->
            <div class="col-md-4 col-sm-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning mb-0">
                    <div class="inner p-3">
                        <h3><?= $this->admin_datawork->count_all('topics') ?></h3>
                        <h5>Total Topics</h5>
                    </div>
                    <div class="icon"><i class="fa fa-clipboard"></i></div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- CENTER LIST -->
            <div class="col-md-4 col-sm-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner p-3">
                       <h3><?= $this->admin_datawork->count_all('organisation') ?></h3>
                        <h5>Total Center</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-building"></i>
                    </div>
                    <a href="<?= base_url('admin/registrationlist') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-white">
        <div class="row">
            <div class="col-md-12">
                <a class="weatherwidget-io" style="height: 280; display: block; position: relative; padding: 0px; overflow: hidden; text-align: left; text-indent: -299rem;" href="https://forecast7.com/en/25d7887d48/purnea/" data-label_1="PURNIA" data-label_2="WEATHER" data-font="Roboto Slab" data-icons="Climacons Animated" data-days="3" data-theme="pure">PURNIA WEATHER<iframe id="weatherwidget-io-0" class="weatherwidget-io-frame" scrolling="no" frameborder="0" width="100%" src="https://weatherwidget.io/w/" style="display: block; position: absolute; top: 0px; height: 280px;"></iframe></a>
                <script>
                    ! function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (!d.getElementById(id)) {
                            js = d.createElement(s);
                            js.id = id;
                            js.src = 'https://weatherwidget.io/js/widget.min.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                    }(document, 'script', 'weatherwidget-io-js');

                </script>
            </div>
        </div>
    </div>
</div>
