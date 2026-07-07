<?php $__env->startSection('content'); ?>
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">
      <h1 class="text-30 lh-14 fw-600">Packages</h1>
    </div>
    <div class="col-auto">
      <a href="<?php echo e(route('admin.packages.create')); ?>" class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
        <div class="icon-plus me-2"></div> Create Package
      </a>
    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">    
    <?php if(session('success') || session('error')): ?>
      <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.support.alert','data' => ['message' => ''.e(session('success')??session('error')).'','type' => ''.e(session('success')?'success':'error').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('support.alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['message' => ''.e(session('success')??session('error')).'','type' => ''.e(session('success')?'success':'error').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>      
    <?php endif; ?>
    <div class="tabs -underline-2 js-tabs">
      <div class="tabs__controls row x-gap-40 y-gap-10 lg:x-gap-20 ">
        <div class="col-auto">
          <a href="<?php echo e(route('admin.packages.list', ['category' => 'active'])); ?>" class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 <?php echo e($category == 'active'?'is-tab-el-active':''); ?>">Active</a>
        </div>
        
        <div class="col-auto">
          <a href="<?php echo e(route('admin.packages.list', ['category' => 'deleted'])); ?>" class="tabs__button text-18 lg:text-16 text-light-1 fw-500 pb-5 lg:pb-0 <?php echo e($category == 'deleted'?'is-tab-el-active':''); ?>">Deleted</a>
        </div>        
      </div>

      <div class="tabs__content pt-30 js-tabs-content">

        <div class="tabs__pane -tab-item-1 is-tab-el-active">
          <div class="overflow-scroll scroll-bar-1">
           
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.packages.table', ['category' => $category],);

$__html = app('livewire')->mount($__name, $__params, '1oH1dax', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

          </div>
        </div>

      </div>
    </div>

  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/packages/list.blade.php ENDPATH**/ ?>