<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item active" >
      <?php if($slider->durum == 1): ?>
      <img src="<?php echo e($slider->resim); ?>" class="slider-img" alt="slider resim" width="300">
      <div class="carousel-caption d-none d-md-block">
        <h5><?php echo e($slider->baslik); ?></h5>
      </div>
      <?php endif; ?>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <a class="left carousel-control" href="#carousel-example" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#carousel-example" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div>
  
</div>

<?php /**PATH /home/melike/kbb-satj/resources/views/admin/slider/slider.blade.php ENDPATH**/ ?>