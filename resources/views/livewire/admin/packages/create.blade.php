<div>
    <form wire:submit.prevent="submit" method="post">
        <div 
            x-data="{
                init(){
                    var quill = new Quill($refs.description, {
                        theme: 'snow',
                        placeholder: 'Full Description about the Package *',
                    });
                    quill.on('text-change', function () {
                        let value = document.getElementsByClassName('ql-editor')[0].innerHTML;
                        @this.set('description', value, false)
                    })
                }
            }"
            class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Basic Details</h3>
            <div class="form-input my-2">
                <input type="text" wire:model="name" class="form-control-sm">
                <label class="lh-1 text-16 text-light-1">Package Name *</label>
            </div>
            @error('name')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
            <div class="form-input my-2">
                <textarea wire:model="overview" class="form-control-sm"></textarea>
                <label class="lh-1 text-16 text-light-1">Overview *</label>
            </div> 
            @error('overview')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
            <div wire:ignore>
                <div x-ref="description">
                </div>          
            </div>
            @error('description')               
                <span class="text-red-1">{{ $message }}</span>                
            @enderror
        </div>
        <div class="py-30 px-30 rounded-4 bg-white shadow-3 mb-2">
            <h3 class="text-22 fw-500 mb-2">Image Gallery</h3>
            <div wire:ignore>
                <div                 
                    x-data="{
                        init(){
                            FilePond.registerPlugin(FilePondPluginImagePreview);
                            FilePond.setOptions({
                                allowMultiple : true,
                                server: {
                                    process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                        @this.upload('images', file, load, error, progress);
                                    },
                                    revert: (filename, load) => {
                                        @this.removeUpload('images', filename, load);
                                    },
                                },
                            });
                            FilePond.create($refs.gallery);
                        }
                    }">
                    <input type="file" x-ref="gallery" multiple />
                </div>
            </div>
        </div> 
        <button class="button h-50 px-24 -dark-1 bg-blue-1 text-white">
            <span wire:loading.remove wire:target="submit">
                Create Package
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
    <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
@endpush