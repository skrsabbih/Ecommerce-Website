<?php $__env->startSection('content'); ?>
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
     <?php echo $__env->make('vendor.dashboard.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <h4>basic information</h4>
               
                 <form action="<?php echo e(route('user.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="col-md-12">
                        <div class="col-md-2">
                            <div class="wsus__dash_pro_img">
                              <img src="<?php echo e(Auth::user()->image?asset(Auth::user()->image):asset('frontend/images/ts-2.jpg')); ?>" alt="img" class="img-fluid w-100">
                              <input type="file" name="image">
                            </div>
                    </div>
                    
                        <div class="col-md-12 mt-5">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-user-tie"></i>
                            <input type="text" placeholder="Name" name="name" value="<?php echo e(Auth::user()->name); ?>">
                          </div>
                        </div>
                         <div class="col-md-12">
                          <div class="wsus__dash_pro_single">
                            <i class="fal fa-envelope-open"></i>
                            <input type="email" placeholder="Email" name="email" value="<?php echo e(Auth::user()->email); ?>">
                          </div>
                        </div>
                     
                    </div>
                    <div class="col-xl-12">
                        <button class="common_btn" type="submit">Update</button>
                      </div>
                 </form>
                   
                    <div class="wsus__dash_pass_change mt-2">
                    <form action="<?php echo e(route('user.profile.update.password')); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <div class="row">
                        <h4>Update Password</h4>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-unlock-alt"></i>
                            <input type="password" placeholder="Current Password" name="current_password">
                          </div>
                        </div>
                        <div class="col-xl-4 col-md-6">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="New Password" name="password">
                          </div>
                        </div>
                        <div class="col-xl-4">
                          <div class="wsus__dash_pro_single">
                            <i class="fas fa-lock-alt"></i>
                            <input type="password" placeholder="Confirm Password" name="password_confirmation">
                          </div>
                        </div>
                        <div class="col-xl-12">
                            <button class="common_btn" type="submit">Update</button>
                          </div>
                      </div>
                    </form>
                    </div>
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.dashboard.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\project\ecommerce\resources\views/vendor/dashboard/profile.blade.php ENDPATH**/ ?>