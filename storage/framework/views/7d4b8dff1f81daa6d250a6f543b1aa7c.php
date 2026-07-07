<?php $__env->startSection('content'); ?>
    <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
        <div class="col-auto">

        <h1 class="text-30 lh-14 fw-600">Dashboard</h1>

        </div>
    </div>
    <div class="row y-gap-30 mb-10">

        <div class="col-xl-4 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Packages</div>
                <div class="text-26 lh-16 fw-600 mt-5"><?php echo e($packages); ?></div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total packages</div>
              </div>

              <div class="col-auto">
                <img src="<?php echo e(asset('img/dashboard/sidebar/airplane.svg')); ?>" alt="icon" class="dashboard-analytics-icons">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Bookings</div>
                <div class="text-26 lh-16 fw-600 mt-5"><?php echo e($successFulBookingCount); ?></div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total bookings</div>
              </div>

              <div class="col-auto">
                <img src="<?php echo e(asset('img/dashboard/icons/3.svg')); ?>" alt="icon" class="dashboard-analytics-icons">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Earnings</div>
                <div class="text-26 lh-16 fw-600 mt-5">$ <?php echo e($totalEarnings); ?></div>
                <div class="text-15 lh-14 text-light-1 mt-5">Total earnings</div>
              </div>

              <div class="col-auto">
                <img src="<?php echo e(asset('img/dashboard/icons/2.svg')); ?>" alt="icon" class="dashboard-analytics-icons">
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-md-6">
          <div class="py-30 px-30 rounded-4 bg-white shadow-3">
            <div class="row y-gap-20 justify-between items-center">
              <div class="col-auto">
                <div class="fw-500 lh-14">Clients</div>
                <div class="text-26 lh-16 fw-600 mt-5"><?php echo e($toatlClients); ?></div>
                <div class="text-15 lh-14 text-light-1 mt-5">Registrations</div>
              </div>

              <div class="col-auto">
                <img src="<?php echo e(asset('img/featureIcons/1/3.svg')); ?>" alt="icon" class="dashboard-analytics-icons">
              </div>
            </div>
          </div>
        </div>

      </div>


      <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-30">
        <div class="fw-500 lh-14">Packages added in last 30 days</div>
        <div class="tabs__content pt-30 js-tabs-content">
          <div class="tabs__pane -tab-item-1 is-tab-el-active">
            <div class="overflow-scroll scroll-bar-1">
              <div>
                <table class="table-4 -border-bottom col-12">
                  <thead class="bg-light-2">
                    <tr>                 
                      <th>Name</th>
                      <th>Reviews</th>
                      <th>Ratings</th>
                      <th>Bookings</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $last30daysPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                      <tr>                 
                        <td>
                          <a href="<?php echo e(route('admin.packages.edit', ['slug' => $package->slug])); ?>" class="fw-500"><?php echo e($package->name); ?></a>
                          <span class="d-block text-12 mt-2 text-muted">Created on <?php echo e(date('d - F, Y', strtotime($package->created_at))); ?></span>
                        </td>                  
                        <td><?php echo e(count($package->reviews).' reviews'); ?></td>
                        <td>
                          <div class="rounded-4 size-35 bg-blue-1 text-white flex-center text-12 fw-600"><?php echo e($package->ratings->avg('rating')); ?></div>
                        </td>
                        <td><?php echo e(count($package->bookings)); ?> Bookings</td>
                        <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 <?php echo e($package->status && !$package->deleted_at == 'published'?'bg-green-1 text-green-2':'bg-red-3 text-red-2'); ?> text-capitalize"><?php echo e(!$package->deleted_at?$package->status:'Deleted'); ?></span></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="py-30 px-30 rounded-4 bg-white shadow-3">
        <div class="fw-500 lh-14">Bookings in last 30 days</div>
        <div class="tabs__content pt-30 js-tabs-content">
          <div class="tabs__pane -tab-item-1 is-tab-el-active">
            <div class="overflow-scroll scroll-bar-1">
              <div>
                <table class="table-4 -border-bottom col-12">
                  <thead class="bg-light-2">
                    <tr>                 
                      <th>Client Details</th>
                      <th>Package</th>
                      <th>Booking Details</th>
                      <th>Traveller Details</th>
                      <th>Paid Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $last30daysBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
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
        </div>
      </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>