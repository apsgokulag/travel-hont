<div>
    <form wire:submit.prevent="submit" method="post">
        <div 
            x-data="{
                description : @entangle('form.description'),
                init(){
                    var quill = new Quill($refs.description, {
                        theme: 'snow',
                        placeholder: 'Full Description about the Package *',
                    });
                    document.getElementsByClassName('ql-editor')[0].innerHTML = this.description;
                    quill.on('text-change', function () {
                        let value = document.getElementsByClassName('ql-editor')[0].innerHTML;
                        @this.set('form.description', value, false)
                    })
                }
            }"
            class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Basic Details</h3>
            <div class="form-input my-2">
                <input type="text" wire:model="form.name" class="form-control-sm">
                <label class="lh-1 text-16 text-light-1">Package Name *</label>
            </div>
            @error('form.name')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
            <div class="form-input my-2">
                <textarea wire:model="form.overview" class="form-control-sm"></textarea>
                <label class="lh-1 text-16 text-light-1">Overview *</label>
            </div> 
            @error('form.overview')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
            <div wire:ignore>
                <div x-ref="description">
                </div>          
            </div>
            @error('form.description')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
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
                                        @this.upload('form.images', file, load, error, progress);
                                    },
                                    revert: (filename, load) => {
                                        @this.removeUpload('form.images', filename, load);
                                    },
                                },
                            });
                            FilePond.create($refs.gallery);
                        }
                    }">
                    <input type="file" x-ref="gallery" multiple />
                </div>
            </div>
            @error('form.images.*')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror

            @livewire('admin.packages.images', ['package' => $package], key('gallery-images'.$package->id))
            
        </div> 
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <div class="d-flex justify-between">
                <h3 class="text-22 fw-500 mb-2">Pricing</h3>
                <div>
                    <select class="form-select" wire:model="form.price.currency_id">
                        @if (!$package->price?->currency_id)                            
                            <option> -- Select Currency -- </option>
                        @endif
                        @foreach ($currencies as $currency)                                                        
                            <option value="{{ $currency->id }}">{{ $currency->code }}</option>
                        @endforeach
                    </select>
                    @error('form.price.currency_id')               
                        <span class="text-red-1">{{ $message }}</span>                
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-input my-2">
                        <input type="number" wire:model="form.price.adult_amount"  class="form-control-sm" min="0" max="10000000" onkeypress="return /^[\d./-]+$/.test(event.key)">
                        <label class="lh-1 text-16 text-light-1">Adult Amount *</label>
                    </div>
                    @error('form.price.adult_amount')               
                        <span class="text-red-1">{{ $message }}</span>                
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="form-input my-2">
                        <input type="number" wire:model="form.price.children_amount"  class="form-control-sm" min="0" max="10000000" onkeypress="return /^[\d./-]+$/.test(event.key)">
                        <label class="lh-1 text-16 text-light-1">Children Amount *</label>    
                    </div>
                    @error('form.price.children_amount')               
                        <span class="text-red-1">{{ $message }}</span>                
                    @enderror
                </div>
            </div>            
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Destinations</h3>
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

@push('styles')
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
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endpush