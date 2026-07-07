<?php $__env->startSection('content'); ?>
    
  <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
    <div class="col-auto">

      <h1 class="text-30 lh-14 fw-600">Reviews</h1>

    </div>

    <div class="col-auto">

    </div>
  </div>


  <div class="py-30 px-30 rounded-4 bg-white shadow-3">
    <div class="overflow-scroll scroll-bar-1">
      <div>
        <table class="table-3 -border-bottom col-12">
          <thead class="bg-light-2">
            <tr>
              <th>Client Details</th>
              <th>Package</th>
              <th>Title</th>
              <th>Text</th>
              <th>Paid Amount</th>           
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
              <tr>
                <td>
                    <?php echo e($booking->client->name); ?>

                    <br> <i class="icon-email-2"></i> <a href="mailto:<?php echo e($booking->client->email); ?>"><?php echo e($booking->client->email); ?></a>
                    <?php if($booking->client->phone): ?>
                        <br> <i class="icon-bell-ring"></i> <a href="tel:<?php echo e($booking->client->phone); ?>"><?php echo e($booking->client->phone); ?></a>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="<?php echo e(route('admin.packages.edit', ['slug' => $booking->package->slug])); ?>" class="text-blue-1"><?php echo e($booking->package->name); ?></a>
                </td>
                <td>
                    Booked <?php echo e($booking->start_date == $booking->end_date?' on '.date('d-F, Y', strtotime( $booking->start_date)):' from '.date('d-F, Y', strtotime( $booking->start_date)).' to '.date('d-F, Y', strtotime( $booking->end_date))); ?>

                    <br><?php echo e('( '.$booking->days.' Days )'); ?>

                </td>
                <td>
                    Adults Nos. : <?php echo e($booking->adult_count); ?>

                    <?php if($booking->children_count): ?>
                        <br> Children Nos. : <?php echo e($booking->children_count); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($booking->total.' '.$booking->currency->code); ?></td>
                <td>
                    <?php if($booking->latestTransaction->type == 'capture' && $booking->latestTransaction->success): ?>
                        <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-green-2 text-green-1">Credited</span>                        
                    <?php elseif($booking->latestTransaction->type == 'refund'): ?>
                        <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">Refunded</span>                        
                    <?php endif; ?>
                </td>
              </tr>          
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/reviews.blade.php ENDPATH**/ ?>