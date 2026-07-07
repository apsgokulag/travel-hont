<div>
    <table class="table-3 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>
            <th>No.</th>
            <th>Client Details</th>
            <th>Package</th>
            <th>Title</th>
            <th>Comment</th>         
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
            <tr>
              <td><?php echo e($loop->index+1); ?></td>
              <td>
                  <?php echo e($review->client->name); ?>

                  <br> <i class="icon-email-2"></i> <a href="mailto:<?php echo e($review->client->email); ?>"><?php echo e($review->client->email); ?></a>
                  <!--[if BLOCK]><![endif]--><?php if($review->client->phone): ?>
                      <br> <i class="icon-bell-ring"></i> <a href="tel:<?php echo e($review->client->phone); ?>"><?php echo e($review->client->phone); ?></a>
                  <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
              </td>
              <td>
                  <a href="<?php echo e(route('admin.packages.edit', ['slug' => $review->package->slug])); ?>" class="text-blue-1"><?php echo e($review->package->name); ?></a>
              </td>
              <td><?php echo e($review->title); ?></td>
              <td><?php echo e($review->comment); ?></td>              
              <td>
                <!--[if BLOCK]><![endif]--><?php if($review->approved == 0): ?>
                    <a 
                        x-data="{                                                                                                                                                
                            approveConfirm(){                                                                              
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Do you want to Approve ?',
                                    text:'You won\'t be able to revert this!',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Approve',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $wire.approve(<?php echo e($review->id); ?>);
                                    }
                                });
                            }
                        }"
                        @click.prevent="approveConfirm()"
                        href="#" class="flex-center bg-light-2 rounded-4 size-35 mb-1">
                        <i class="icon-check text-16 text-light-1"></i>
                    </a>
                <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
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
                                    $wire.delete(<?php echo e($review->id); ?>);
                                }
                            });
                        }
                    }"
                    @click.prevent="deleteConfirm()"
                    href="#" class="flex-center bg-light-2 rounded-4 size-35">
                    <i class="icon-trash-2 text-16 text-light-1"></i>
                </a>
              </td>
            </tr>          
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        </tbody>
      </table>
</div>
<?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/admin/pending-reviews.blade.php ENDPATH**/ ?>