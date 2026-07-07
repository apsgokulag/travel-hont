<div>
    <table class="table-4 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>                 
            <th>Name</th>
            <th>Reviews</th>
            <th>Ratings</th>
            <th>Bookings</th>                
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <tr>                 
                <td>
                    <a href="<?php echo e(route('admin.packages.edit', ['slug' => $package->slug])); ?>" class="fw-500">
                        <?php echo e($package->name); ?>

                    </a>
                    <span class="d-block text-12 mt-2 text-muted">Created on <?php echo e(date('d - F, Y', strtotime($package->created_at))); ?></span>
                </td>                  
                <td><?php echo e($package->reviews_count.' reviews'); ?></td>
                <td>
                    <div class="rounded-4 size-35 bg-blue-1 text-white flex-center text-12 fw-600"><?php echo e($package->ratings->avg('rating')); ?></div>
                </td>
                <td>
                    <?php echo e($package->bookings_count); ?> Bookings
                </td>
                <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 <?php echo e($package->status && !$package->deleted_at == 'published'?'bg-green-1 text-green-2':'bg-red-3 text-red-2'); ?> text-capitalize"><?php echo e(!$package->deleted_at?$package->status:'Deleted'); ?></span></td>
                <td>
                    <div class="row x-gap-10 y-gap-10 items-center">                      
                        <!--[if BLOCK]><![endif]--><?php if($package->deleted_at): ?>
                            <p class="text-12 text-red-1">Deleted on <?php echo e(date('d-F, Y', strtotime($package->deleted_at))); ?></p>
                        <?php else: ?>                            
                            <div class="col-auto">
                                <a href="<?php echo e(route('admin.packages.edit', ['slug' => $package->slug])); ?>" class="flex-center bg-light-2 rounded-4 size-35">
                                <i class="icon-edit text-16 text-light-1"></i>
                                </a>
                            </div>
            
                            <div class="col-auto">
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
                                                    $wire.delete(<?php echo e($package->id); ?>);
                                                }
                                            });
                                        }
                                    }"
                                    @click.prevent="deleteConfirm()"
                                    href="#" class="flex-center bg-light-2 rounded-4 size-35">
                                    <i class="icon-trash-2 text-16 text-light-1"></i>
                                </a>
                            </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        </tbody>
      </table>
</div>
<?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/admin/packages/table.blade.php ENDPATH**/ ?>