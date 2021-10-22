<!DOCTYPE html>
<html>
<?php $this->load->view('admin/top/' . $top); ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('admin/header/header'); ?>
        <?php $this->load->view('admin/menu/left_menu'); ?>
        <?php $this->load->view('admin/content/' . $content); ?>
        <?php $this->load->view('admin/footer/footer'); ?>
        <?php $this->load->view('admin/menu/right_menu'); ?>
    </div>
    <?php $this->load->view('admin/bottom/' . $bottom); ?>
</body>

</html>