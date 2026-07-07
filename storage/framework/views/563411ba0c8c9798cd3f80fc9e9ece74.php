<div>
    <div class="row">
        <div class="col-xl-8 col-lg-10">
            <!--[if BLOCK]><![endif]--><?php if($formSubmitSuccess): ?>
                <div class="row">
                    <div class="col-auto">
                    <h3 class="text-22 fw-500">Thanks for your valuable comment</h3>
                    <p class="text-15 text-dark-1 mt-5">Your response submitted successfully.</p>
                    </div>
                </div>
            <?php else: ?>                
                <div class="row">
                    <div class="col-auto">
                    <h3 class="text-22 fw-500">Leave a Reply</h3>
                    <p class="text-15 text-dark-1 mt-5">Your email address will not be published.</p>
                    </div>
                </div>
                <form wire:submit.prevent="submit" method="post">
                    <div class="row y-gap-30 pt-20">

                        <div class="col-xl-6">
                            <div class="form-input ">
                                <input type="text" maxlength="200" wire:model="firstName">
                                <label class="lh-1 text-16 text-light-1">First Name</label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['firstName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                <span class="text-red-1"><?php echo e($message); ?></span>                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="col-xl-6">
                            <div class="form-input ">
                                <input type="text" maxlength="200" wire:model="lastName">
                                <label class="lh-1 text-16 text-light-1">Last Name</label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['lastName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                <span class="text-red-1"><?php echo e($message); ?></span>                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="col-xl-6">
                            <div class="form-input ">
                                <input type="email" wire:model="email" >
                                <label class="lh-1 text-16 text-light-1">Email</label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                <span class="text-red-1"><?php echo e($message); ?></span>                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="col-xl-6">
                            <div class="form-input ">
                                <input type="text" wire:model="title" maxlength="400">
                                <label class="lh-1 text-16 text-light-1">Title</label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                <span class="text-red-1"><?php echo e($message); ?></span>                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div> 
                        <div class="co-12">     
                            <h5 class="text-18 fw-500 mb-10">Star Rating</h5>                                  
                            <div
                                x-data="{
                                    rating : <?php if ((object) ('rating') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('rating'->value()); ?>')<?php echo e('rating'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('rating'); ?>')<?php endif; ?>
                                }"  
                                class="row x-gap-10 y-gap-10 pt-10 pb-10">

                                <div class="col-auto" style="position: relative;">
                                <label for="radio-1" class="button -blue-1 bg-blue-1-05 py-5 px-20 rounded-100" :class="rating == 1?'bg-dark-1 text-light-2':'text-blue-1'">
                                    1
                                    </label>
                                    <input id="radio-1" type="radio" style="position: absolute; top: 0; opacity: 0;" x-model="rating" value="1">
                                </div>
            
                                <div class="col-auto" style="position: relative;">
                                    <label for="radio-2" class="button -blue-1 bg-blue-1-05 py-5 px-20 rounded-100" :class="rating == 2?'bg-dark-1 text-light-2':'text-blue-1'">
                                        2
                                    </label>
                                    <input id="radio-2" type="radio" style="position: absolute; top: 0; opacity: 0;" x-model="rating" value="2">
                                </div>
            
                                <div class="col-auto" style="position: relative;">
                                    <label for="radio-3" class="button -blue-1 bg-blue-1-05 py-5 px-20 rounded-100" :class="rating == 3?'bg-dark-1 text-light-2':'text-blue-1'">
                                        3
                                    </label>
                                    <input id="radio-3" type="radio" style="position: absolute; top: 0; opacity: 0;" x-model="rating" value="3">
                                </div>
            
                                <div class="col-auto" style="position: relative;">
                                    <label for="radio-4" class="button -blue-1 bg-blue-1-05 py-5 px-20 rounded-100" :class="rating == 4?'bg-dark-1 text-light-2':'text-blue-1'">
                                        4
                                    </label>
                                    <input id="radio-4" type="radio" style="position: absolute; top: 0; opacity: 0;" x-model="rating" value="4">
                                </div>
            
                                <div class="col-auto" style="position: relative;">
                                    <label for="radio-5" class="button -blue-1 bg-blue-1-05 py-5 px-20 rounded-100" :class="rating == 5?'bg-dark-1 text-light-2':'text-blue-1'">
                                        5
                                    </label>
                                    <input id="radio-5" type="radio" style="position: absolute; top: 0; opacity: 0;" x-model="rating" value="5">
                                </div>
            
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['rating'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                    <span class="text-red-1"><?php echo e($message); ?></span>                
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>                   
                        <div class="col-12">
                            <div class="form-input ">
                                <textarea rows="4" maxlength="1500" wire:model="comment"></textarea>
                                <label class="lh-1 text-16 text-light-1">Write Your Comment</label>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                                <span class="text-red-1"><?php echo e($message); ?></span>                
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <div class="col-auto">
                            <button class="button -md -dark-1 bg-blue-1 text-white">
                                Post Comment <div class="icon-arrow-top-right ml-15"></div>
                            </button>            
                        </div>
                    </div>
                </form>
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        </div>
      </div>
</div>
<?php $__env->startPush('styles'); ?>
   
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/web/packages/review.blade.php ENDPATH**/ ?>