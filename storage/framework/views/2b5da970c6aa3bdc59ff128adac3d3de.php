<?php $__env->startSection('content'); ?>
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Clients</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
        <table class="table-3 -border-bottom col-12">
            <thead class="bg-light-2">
              <tr>
                <th>Name</th>
                <th>Contact</th>
                <th>Bookings</th>
                <th>Reviews</th>              
              </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                    <tr>
                        <td><?php echo e($client->name); ?></td>
                        <td>
                            <i class="icon-email-2"></i> <a href="mailto:<?php echo e($client->email); ?>"><?php echo e($client->email); ?></a>
                            <?php if($client->phone): ?>
                                <br> <i class="icon-bell-ring"></i> <a href="tel:<?php echo e($client->phone); ?>"><?php echo e($client->phone); ?></a>
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($client->bookings_count); ?></td>                        
                        <td><?php echo e(count($client->reviews)); ?></td>                       
                    </tr>          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/clients.blade.php ENDPATH**/ ?>