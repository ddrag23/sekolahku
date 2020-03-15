<?php if($this->session->flashdata('sukses')): ?>
    <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('sukses');; ?></div>
<?php endif; ?>
