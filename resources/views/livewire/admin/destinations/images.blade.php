<div>
    <div class="d-flex flex-wrap lightbox-destination-image-gallery">       
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
                        class="mt-1 text-red-1"
                        href=""><i class="icon-trash"></i> Delete</a>          
                </div>
            </div>
        @endforeach
    </div>
</div>

@push('styles')
<style>
    .lightbox-destination-image-gallery img{
        width: 120px;
        height: 120px;
        object-fit: cover;
    }
</style>
@endpush

@push('scripts')
    <script>
         new SimpleLightbox({elements: '.lightbox-destination-image-gallery a.image'});       
    </script>    
@endpush