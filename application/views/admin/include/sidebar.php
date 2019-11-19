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

<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="<?= $photo; ?>" alt="User Image" style="width:50px;height:50px;">
        <div>
            <p class="app-sidebar__user-name">
                <?= $loginuser->name; ?>
            </p>
            <p class="app-sidebar__user-designation">
                <?= $loginuser->email; ?>
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/index') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url('admin/registration') ?>"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Register Center</span></a>
        </li>
           
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/registrationlist') ?>"><i class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Center List</span></a>
        </li>
           
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/subject') ?>"><i class="app-menu__icon fa fa-book"></i><span class="app-menu__label">Subject / Lession</span></a>
        </li>

        <li>
            <a class="app-menu__item" href="<?= base_url('admin/lession') ?>"><i class="app-menu__icon fa fa-video-camera"></i><span class="app-menu__label">Topics</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/topicslist') ?>"><i class="app-menu__icon fa fa-video-camera"></i><span class="app-menu__label">Topics List</span></a>
        </li>
         <li>
            <a class="app-menu__item" href="<?= base_url('admin/report') ?>"><i class="app-menu__icon fa fa-flag"></i><span class="app-menu__label">Training Report</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/notification') ?>"><i class="app-menu__icon fa fa-bell"></i><span class="app-menu__label">Notification</span></a>
        </li>
         <li>
            <a class="app-menu__item" href="<?= base_url('admin/course') ?>"><i class="app-menu__icon fa fa-file-pdf-o"></i><span class="app-menu__label">Course</span></a>
        </li>
        <li>
            <a class="app-menu__item" href="<?= base_url('admin/syllabus') ?>"><i class="app-menu__icon fa fa-file-pdf-o"></i><span class="app-menu__label">Syllabus</span></a>
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
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>admin/index"><i class="fa fa-home fa-lg"></i></a></li>
            <?= $BREADCRUMB; ?>
        </ul>
    </div>
