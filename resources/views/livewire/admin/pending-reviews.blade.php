<div>
    <table class="table-3 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>
            <th>No.</th>
            <th>Client Details</th>
            <th>Package</th>
            <th>Title</th>
            <th>Comment</th>         
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($reviews as $review)                
            <tr>
              <td>{{ $loop->index+1 }}</td>
              <td>
                  {{ $review->client->name }}
                  <br> <i class="icon-email-2"></i> <a href="mailto:{{ $review->client->email }}">{{ $review->client->email }}</a>
                  @if ($review->client->phone)
                      <br> <i class="icon-bell-ring"></i> <a href="tel:{{ $review->client->phone }}">{{ $review->client->phone }}</a>
                  @endif
              </td>
              <td>
                  <a href="{{ route('admin.packages.edit', ['slug' => $review->package->slug]) }}" class="text-blue-1">{{ $review->package->name }}</a>
              </td>
              <td>{{ $review->title }}</td>
              <td>{{ $review->comment }}</td>              
              <td>
                @if($review->approved == 0)
                    <a 
                        x-data="{                                                                                                                                                
                            approveConfirm(){                                                                              
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Do you want to Approve ?',
                                    text:'You won\'t be able to revert this!',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Approve',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $wire.approve({{ $review->id }});
                                    }
                                });
                            }
                        }"
                        @click.prevent="approveConfirm()"
                        href="#" class="flex-center bg-light-2 rounded-4 size-35 mb-1">
                        <i class="icon-check text-16 text-light-1"></i>
                    </a>
                @endif
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
                                    $wire.delete({{ $review->id }});
                                }
                            });
                        }
                    }"
                    @click.prevent="deleteConfirm()"
                    href="#" class="flex-center bg-light-2 rounded-4 size-35">
                    <i class="icon-trash-2 text-16 text-light-1"></i>
                </a>
              </td>
            </tr>          
          @endforeach
        </tbody>
      </table>
</div>
