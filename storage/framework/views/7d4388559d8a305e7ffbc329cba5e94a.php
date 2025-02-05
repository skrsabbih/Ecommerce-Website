<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background-image: url('<?php echo e(asset($slider->banner)); ?>');">
                                <div class="wsus__single_slider_text">
                                    <h3 class="slider-subtitle"><?php echo e($slider->type ?? 'Default Type'); ?></h3>
                                    <h1 class="slider-title"><?php echo e($slider->title ?? 'Default Title'); ?></h1>
                                    <h6 class="slider-price">
                                        Start at $<?php echo e($slider->starting_price); ?>

                                    </h6>
                                    <a class="common_btn" href="<?php echo e($slider->btn_url ?? '#'); ?>">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH D:\project\ecommerce\resources\views/frontend/home/section/banner-slider.blade.php ENDPATH**/ ?>