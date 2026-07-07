<?php $__env->startSection('content'); ?>

  <div class="header-margin"></div>
  <section class="layout-pt-md layout-pb-lg bg-light-2">
    <div class="container">
      <div class="row y-gap-30">                
        <div class="col-lg-8">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <div class="d-lg-none">          
              <h5>Package Information</h5>
              <div class="d-flex mb-3">
                <img class="rounded-4 col-12 me-3" src="<?php echo e(asset($package->getMedia()->first()->getFullUrl())); ?>" style="max-width: 60px;" alt="image">   
                <div>                  
                  <h6><?php echo e($package->name); ?></h6>       
                  <p><i class="icon-location-pin"></i> destination locations</p>          
                </div>            
              </div>
            </div>
            
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('web.packages.booking', ['package' => $package]);

$__html = app('livewire')->mount($__name, $__params, $package->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

          </div>
        </div>
        <div class="col-lg-4 lg:d-none">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
                <div class="d-flex">
                  <img class="rounded-4 col-12 me-3" src="<?php echo e(asset($package->getMedia()->first()->getFullUrl())); ?>" style="max-width: 60px;" alt="image">   
                  <div>                  
                    <h6><?php echo e($package->name); ?></h6>       
                    <p><i class="icon-location-pin"></i> destination locations</p>          
                  </div>            
                </div>
                <hr>                
                <p><?php echo e(Str::limit($package->overview, 150)); ?></p>
                <hr>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Adult</span> 
                  <span>US $ <?php echo e($package->price->adult_amount); ?></span>
                </div>
                <div class="text-14 text-light-1 d-flex justify-between fw-600">
                  <span>Children</span> 
                  <span>US $ <?php echo e($package->price->children_amount); ?></span>
                </div>              
              </div>
            </div>
        </div>
      </div>
    </div>
  </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/web/bookPackage.blade.php ENDPATH**/ ?>