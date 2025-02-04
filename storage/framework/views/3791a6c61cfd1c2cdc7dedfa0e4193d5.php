<?php $__env->startSection('content'); ?>
<!-- Main Content -->

<section class="section">
  <div class="section-header">
    <h1>Table</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">Table</div>
    </div>
  </div>

  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Simple Table</h4>
            <div class="card-header-action">
              <a href="<?php echo e(route('admin.slider.create')); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
            </div>
          </div>
          <div class="card-body">
            <?php echo e($dataTable->table()); ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <?php echo e($dataTable->scripts(attributes: ['type' => 'module'])); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\ecommerce\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>