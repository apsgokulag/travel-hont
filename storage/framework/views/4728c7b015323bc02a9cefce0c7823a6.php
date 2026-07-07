<div>
    <div class="d-flex flex-wrap lightbox-package-image-gallery">       
        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
            <div class="border d-flex flex-column me-1">
                <a href="<?php echo e(asset($image->getFullUrl())); ?>" class="image">
                    <img src="<?php echo e(asset($image->getFullUrl())); ?>" class="img-thumbnail" alt="">
                </a>
                <div class="d-flex justify-content-center align-items-center">                    
                    <a 
                        x-data="{                                                                                                                                                
                            deleteConfirm(){                                                                              
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Do you want to Delete ?',
                                    text:'You won\'t be able to revert this!',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Delete',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $wire.delete(<?php echo e($image->id); ?>);
                                    }
                                });
                            }
                        }"
                        @click.prevent="deleteConfirm()"
                        class="mt-1 text-red-1"
                        href=""><i class="icon-trash"></i> Delete</a>          
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
</div>

<?php $__env->startPush('styles'); ?>
<style>
    .lightbox-package-image-gallery img{
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>    
    <script>
         new SimpleLightbox({elements: '.lightbox-package-image-gallery a.image'});       
    </script>    
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/admin/packages/images.blade.php ENDPATH**/ ?>