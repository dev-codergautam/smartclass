<?php
$loginuser = $this->admin_datawork->get_data('organisation', ['orgEmail' => $this->session->userdata('scuser_authenticate')]);
    foreach($loginuser as $loginuser){}
        if($loginuser->orgImage == ""){
            $photo = base_url() . "assets/image/em-boy-1.svg";
        }
        else {
            $photo = base_url() . "assets/image/admin/".$loginuser->orgImage;
        }
    ?>

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="<?= $photo; ?>" alt="User Image" style="width:50px;height:50px;">
        <div>
            <p class="app-sidebar__user-name">
                <?= $loginuser->orgName; ?>
            </p>
            <p class="app-sidebar__user-designation small">
                <?= $loginuser->orgEmail; ?>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url('org/index') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url('org/profile') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Profile</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url('org/subject') ?>"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Start Class</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url('org/notification') ?>"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Notification</span></a>
        </li>
        
        <li>
            <a class="app-menu__item" href="<?= base_url('org/syllabus') ?>"><i class="app-menu__icon fa fa-file-pdf-o"></i><span class="app-menu__label">Syllabus</span></a>
        </li>

    </ul>
</aside>
<script>
    var url = window.location;
    //var url = window.location;
    // for sidebar menu entirely but not cover treeview
    $('.app-sidevar ul li a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
    // for treeview
    $('ul li.treeview a').filter(function() {
        return this.href == url;
    }).parentsUntil(".app-sidebar > .treeview-menu").addClass('active is-expanded');

</script>
<script>
    $(document).ready(function() {
        var links = $('.app-sidebar ul li a');
        $.each(links, function(key, va) {
            if (va.href == document.URL) {
                $(this).addClass('active');
            }
        });
    });

</script>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <?= $TITLE; ?>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>org/index"><i class="fa fa-home fa-lg"></i></a></li>
            <?= $BREADCRUMB; ?>
        </ul>
    </div>
