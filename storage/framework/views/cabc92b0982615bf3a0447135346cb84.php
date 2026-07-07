<?php $__env->startSection('content'); ?>
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Booking History</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
        <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.bookings.table');

$__html = app('livewire')->mount($__name, $__params, 'DmDDhN8', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/bookings.blade.php ENDPATH**/ ?>