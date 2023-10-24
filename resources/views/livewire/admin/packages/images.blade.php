<div>
    <div class="d-flex flex-wrap lightbox-image-gallery">       
        @foreach ($images as $image)  
            <div class="border d-flex flex-column me-1">
                <a href="{{ asset($image->getFullUrl()) }}" class="image">
                    <img src="{{ asset($image->getFullUrl()) }}" class="img-thumbnail" alt="">
                </a>
                <div class="d-flex justify-content-center align-items-center">                    
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
                                        $wire.delete({{ $image->id }});
                                    }
                                });
                            }
                        }"
                        @click.prevent="deleteConfirm()"
                        href=""><i class="icon-trash"></i> Delete</a>          
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
    .lightbox-image-gallery img{
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/lightbox/simpleLightbox.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('assets/lightbox/simpleLightbox.js') }}"></script>
    <script>
         new SimpleLightbox({elements: '.lightbox-image-gallery a.image'});       
    </script>    
@endpush