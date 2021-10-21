<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= base_url('template/') ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $nama ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if ($content === 'dashboard') echo 'active'; ?>">
                <a href="<?= base_url('Welcome/show_home'); ?>">
                    <i class="fa fa-dashboard"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="<?php if ($content === 'blank_page') echo 'active'; ?>">
                <a href="<?= base_url('Welcome/show_blank_page'); ?>">
                    <i class="fa fa-th"></i>
                    <span>Blank Page</span>
                </a>
            </li>
            <li class="<?php if ($content === 'mahasiswa') echo 'active'; ?>">
                <a href="<?= base_url('Welcome/show_mahasiswa') ?>">
                    <i class="fa fa-edit"></i>
                    <span>Mahasiswa</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>