<div>
    <table class="table-3 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>
            <th>Client Details</th>
            <th>Package</th>
            <th>Booking Details</th>
            <th>Traveller Details</th>
            <th>Paid Amount</th>
            <th>Status</th>
            <th>Action</th>        
          </tr>
        </thead>
        <tbody>
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
                <tr>
                    <td>
                        <?php echo e($booking->client->name); ?>

                        <br> <i class="icon-email-2"></i> <a href="mailto:<?php echo e($booking->client->email); ?>"><?php echo e($booking->client->email); ?></a>
                        <!--[if BLOCK]><![endif]--><?php if($booking->client->phone): ?>
                            <br> <i class="icon-bell-ring"></i> <a href="tel:<?php echo e($booking->client->phone); ?>"><?php echo e($booking->client->phone); ?></a>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
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

                        <!--[if BLOCK]><![endif]--><?php if($booking->children_count): ?>
                            <br> Children Nos. : <?php echo e($booking->children_count); ?>

                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td><?php echo e($booking->total.' '.$booking->currency->code); ?></td>
                    <td>
                        <!--[if BLOCK]><![endif]--><?php if($booking->latestTransaction->type == 'capture' && $booking->latestTransaction->success): ?>
                            <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-green-2 text-green-1">Credited</span>                        
                        <?php elseif($booking->latestTransaction->type == 'refund'): ?>
                            <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">Refunded</span>                        
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </td>
                    <td>
                        <!--[if BLOCK]><![endif]--><?php if($booking->latestTransaction->type == 'capture' && $booking->latestTransaction->success): ?>
                            <div
                                x-data="{
                                    show : false,
                                    bookingId : <?php echo e($booking->id); ?>,
                                    downloadInvoice(){
                                        this.show = true;
                                        $wire.downloadInvoice(this.bookingId).then(result => { this.show = false });
                                    }
                                }">                             
                                <a href="" @click.prevent="downloadInvoice()" ><i class="icon-newsletter"></i> Invoice</a>                            
                                <span x-show="show" x-cloak>
                                    <span class="loader"></span>
                                </span>
                            </div>
                            <div
                                x-data="{
                                    show : false,
                                    bookingId : <?php echo e($booking->id); ?>,
                                    bookingRefund(){
                                        this.show = true;
                                        $wire.bookingRefund(this.bookingId).then(result => { this.show = false });
                                    }
                                }" class="mt-10">                             
                                <a href="" @click.prevent="bookingRefund()" ><i class="icon-trash"></i> Refund</a>                            
                                <span x-show="show" x-cloak>
                                    <span class="loader"></span>
                                </span>
                            </div>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                    </td>
                </tr>          
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        </tbody>
      </table>
</div>

<?php $__env->startPush('styles'); ?>
    <style>
        .loader {
            width: 10px;
            height: 10px;
            border: 2px solid #000000;
            border-bottom-color: transparent;
            border-radius: 50%;
            display: inline-block;
            box-sizing: border-box;
            animation: rotation 1s linear infinite;
            }

            @keyframes rotation {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        } 
    </style>
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/admin/bookings/table.blade.php ENDPATH**/ ?>