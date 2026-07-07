<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['type', 'message']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['type', 'message']); ?>
<?php foreach (array_filter((['type', 'message']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
        <div  class="d-flex items-center justify-between bg-<?php echo e($type); ?>-1 pl-10 pr-10 py-20 mb-2 rounded-8">
          <div class="text-<?php echo e($type); ?>-2 lh-1 fw-500"> <?php echo e($message); ?> </div>
          <div class="text-<?php echo e($type); ?>-2 text-14 icon-close"></div>
        </div> 
      </div>  
</div><?php /**PATH D:\laragon\laragon\www\travel\resources\views/components/support/alert.blade.php ENDPATH**/ ?>