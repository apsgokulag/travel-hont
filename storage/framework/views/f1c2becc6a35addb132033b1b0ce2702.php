<?php $__env->startSection('content'); ?>
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
      <h1 class="text-30 lh-14 fw-600">Packages</h1>
    </div>
    <div class="col-auto">
      <a href="<?php echo e(route('admin.packages.list', ['category' => 'active'])); ?>" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
        <div class="icon-arrow-left me-2"></div> All Packages
      </a>
    </div>
  </div>

  <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.packages.edit', ['package' => $package]);

$__html = app('livewire')->mount($__name, $__params, 'OrLSehB', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/packages/edit.blade.php ENDPATH**/ ?>