<div>
    <form wire:submit.prevent="submit" method="post">
        <div 
            x-data="{
                description : <?php if ((object) ('form.description') instanceof \Livewire\WireDirective) : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.description'->value()); ?>')<?php echo e('form.description'->hasModifier('live') ? '.live' : ''); ?><?php else : ?>window.Livewire.find('<?php echo e($__livewire->getId()); ?>').entangle('<?php echo e('form.description'); ?>')<?php endif; ?>,
                init(){
                    var quill = new Quill($refs.description, {
                        theme: 'snow',
                        placeholder: 'Full Description about the Package *',
                    });
                    document.getElementsByClassName('ql-editor')[0].innerHTML = this.description;
                    quill.on('text-change', function () {
                        let value = document.getElementsByClassName('ql-editor')[0].innerHTML;
                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('form.description', value, false)
                    })
                }
            }"
            class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Basic Details</h3>
            <div class="form-input my-2">
                <input type="text" wire:model="form.name" class="form-control-sm" maxlength="250">
                <label class="lh-1 text-16 text-light-1">Package Name *</label>
            </div>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                <span class="text-red-1"><?php echo e($message); ?></span>                
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
            <div class="form-input my-2">
                <textarea wire:model="form.overview" class="form-control-sm" maxlength="500"></textarea>
                <label class="lh-1 text-16 text-light-1">Overview *</label>
            </div> 
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.overview'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                <span class="text-red-1"><?php echo e($message); ?></span>                
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
            <div wire:ignore>
                <div x-ref="description">
                </div>          
            </div>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.description'];
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
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Image Gallery</h3>
            <div wire:ignore>
                <div                 
                    x-data="{
                        init(){
                            FilePond.registerPlugin(FilePondPluginImagePreview, FilePondPluginFileValidateType);
                            FilePond.setOptions({
                                allowMultiple : true,
                                acceptedFileTypes: ['image/*'],
                                server: {
                                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').upload('form.images', file, load, error, progress);
                                    },
                                    revert: (filename, load) => {
                                        window.Livewire.find('<?php echo e($_instance->getId()); ?>').removeUpload('form.images', filename, load);
                                    },
                                },
                            });
                            FilePond.create($refs.gallery);
                        }
                    }">
                    <input type="file" x-ref="gallery" multiple />
                </div>
            </div>
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>               
                <span class="text-red-1"><?php echo e($message); ?></span>                
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.packages.images', ['package' => $package]);

$__html = app('livewire')->mount($__name, $__params, 'package-gallery-images-'.$package->id, $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            
        </div> 
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <div class="d-flex justify-between">
                <h3 class="text-22 fw-500 mb-2">Pricing</h3>
                <div>
                    <select class="form-select" wire:model="form.price.currency_id">
                        <!--[if BLOCK]><![endif]--><?php if(!$package->price?->currency_id): ?>                            
                            <option> -- Select Currency -- </option>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                                        
                            <option value="<?php echo e($currency->id); ?>"><?php echo e($currency->code); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.price.currency_id'];
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
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-input my-2">
                        <input type="number" wire:model="form.price.adult_amount"  class="form-control-sm" min="0" max="10000000" onkeypress="return /^[\d./-]+$/.test(event.key)">
                        <label class="lh-1 text-16 text-light-1">Adult Amount *</label>
                    </div>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.price.adult_amount'];
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
                <div class="col-md-6">
                    <div class="form-input my-2">
                        <input type="number" wire:model="form.price.children_amount"  class="form-control-sm" min="0" max="10000000" onkeypress="return /^[\d./-]+$/.test(event.key)">
                        <label class="lh-1 text-16 text-light-1">Children Amount *</label>    
                    </div>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.price.children_amount'];
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
            </div>            
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Destinations</h3>            
            <div class="my-1">                    
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $form->destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $destination): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                    <div class="p-2 mt-2 mx-1" wire:key="destination-<?php echo e($loop->index); ?>">
                        <div class="row shadow-4 rounded-4">
                            <div class="col-md-12 d-flex justify-between align-content-center">
                                <h6 class="text-22 fw-500 mb-2 my-3">Destination <?php echo e($loop->index+1); ?></h6>
                                <a href="" wire:click.prevent="deleteFeature('destination',<?php echo e($loop->index); ?>)" class="button h-20 my-3 text-red-1 bg-red-50"><i class="icon-trash-2"></i> Delete</a>
                            </div>
                            <div class="col-md-4">
                                <div class="form-input my-2">
                                    <input type="file" wire:model="form.destinations.<?php echo e($loop->index); ?>.image"  class="form-control-sm form-control-file" accept="image/*">
                                    <label class="lh-1 text-16 text-light-1" style="top: 15px">Image</label>    
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.destinations.'.$loop->index.'.image'];
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
                            <div class="col-md-8">
                                <div class="form-input my-2">
                                    <input type="text" wire:model="form.destinations.<?php echo e($loop->index); ?>.name"  class="form-control-sm">
                                    <label class="lh-1 text-16 text-light-1">Destination Name *</label>    
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.destinations.'.$loop->index.'.name'];
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
                            <div class="col-md-12">
                                <div class="form-input my-2">
                                    <textarea wire:model="form.destinations.<?php echo e($loop->index); ?>.overview" class="form-control-sm" maxlength="500"></textarea>
                                    <label class="lh-1 text-16 text-light-1">Overview *</label>
                                </div> 
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.destinations.'.$loop->index.'.overview'];
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
                            <div class="col-md-12">                                
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('admin.destinations.images', ['destinationId' => $destination['id']]);

$__html = app('livewire')->mount($__name, $__params, 'destinaiton-gallery-images-'.$destination['id'], $__slots ?? [], get_defined_vars());

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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
            <a href="" wire:click.prevent="addFeature('destination')" class="button h-50 px-24 -dark-1 text-blue-1 border-blue-1">Add New Destination</a>
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Highlights</h3>            
            <div class="my-1"> 
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $form->highlights; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $highlight): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-2 mt-2 mx-1" wire:key="highlight-<?php echo e($loop->index); ?>">
                        <div class="row shadow-4 rounded-4">
                            <div class="col-md-12 d-flex justify-between align-content-center">
                                <h6 class="text-22 fw-500 mb-2 my-3">Highlight <?php echo e($loop->index+1); ?></h6>
                                <a href="" wire:click.prevent="deleteFeature('highlight',<?php echo e($loop->index); ?>)" class="button h-20 my-3 text-red-1 bg-red-50"><i class="icon-trash-2"></i> Delete</a>
                            </div>
                            <div class="col-md-12">
                                <div class="form-input my-2">
                                    <input type="text" wire:model="form.highlights.<?php echo e($loop->index); ?>.highlight"  class="form-control-sm">
                                    <label class="lh-1 text-16 text-light-1">Highlight *</label>    
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.highlights.'.$loop->index.'.highlight'];
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
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
            <a href="" wire:click.prevent="addFeature('highlight')" class="button h-50 px-24 -dark-1 text-blue-1 border-blue-1">Add Highlight</a>
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">FAQ</h3>            
            <div class="my-1"> 
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $form->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="p-2 mt-2 mx-1" wire:key="faq-<?php echo e($loop->index); ?>">
                        <div class="row shadow-4 rounded-4">
                            <div class="col-md-12 d-flex justify-between align-content-center">
                                <h6 class="text-22 fw-500 mb-2 my-3">FAQ <?php echo e($loop->index+1); ?></h6>
                                <a href="" wire:click.prevent="deleteFeature('faq',<?php echo e($loop->index); ?>)" class="button h-20 my-3 text-red-1 bg-red-50"><i class="icon-trash-2"></i> Delete</a>
                            </div>
                            <div class="col-md-6">
                                <div class="form-input my-2">
                                    <input type="text" wire:model="form.faqs.<?php echo e($loop->index); ?>.question"  class="form-control-sm">
                                    <label class="lh-1 text-16 text-light-1">Question *</label>    
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.faqs.'.$loop->index.'.question'];
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
                            <div class="col-md-6">
                                <div class="form-input my-2">
                                    <input type="text" wire:model="form.faqs.<?php echo e($loop->index); ?>.answer"  class="form-control-sm">
                                    <label class="lh-1 text-16 text-light-1">Answer *</label>    
                                </div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['form.faqs.'.$loop->index.'.answer'];
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
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            </div>
            <a href="" wire:click.prevent="addFeature('faq')" class="button h-50 px-24 -dark-1 text-blue-1 border-blue-1">Add FAQ</a>
        </div>
        <button class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
            <span wire:loading.remove wire:target="submit">
                Update Package
            </span>
            <span wire:loading wire:target="submit">
                Please wait...
            </span>
        </button>       
    </form>
</div>

<?php $__env->startPush('styles'); ?>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet"/>
    <style>
        .ql-container{
            min-height: 150px;
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
        .ql-toolbar{
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .filepond--credits{
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<?php $__env->stopPush(); ?><?php /**PATH D:\laragon\laragon\www\travel\resources\views/livewire/admin/packages/edit.blade.php ENDPATH**/ ?>