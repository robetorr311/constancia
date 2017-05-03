<?php if ($this->session->flashdata('data')): ?>
    <section class="content">
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-check"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Éxito!</b> <?php echo $this->session->flashdata('data'); ?>
        </div>
    </section>
<?php endif; ?>
