
<?php $__env->startSection('content'); ?>
   <!-- Main Content -->
  
    <section class="section">
      <div class="section-header">
        <h1>Category</h1>
      </div>

      <div class="section-body">
   
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Catagories</h4>
                <div class="card-header-action">
                    <a href="<?php echo e(route('admin.category.create')); ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Create New</a>
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
<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\ecommerce\resources\views/admin/category/index.blade.php ENDPATH**/ ?>