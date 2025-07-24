<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="width: 50%; animation: fadeOut 10s forwards;">
    <i class="fas fa-check-circle me-2"></i>
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
  <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
    <i class="fas fa-exclamation-triangle me-2"></i>
    <?= $this->session->flashdata('error'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
<?php endif; ?>