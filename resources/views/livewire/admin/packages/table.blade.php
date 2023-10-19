<div>
    <table class="table-4 -border-bottom col-12">
        <thead class="bg-light-2">
          <tr>                 
            <th>Name</th>
            <th>Reviews</th>
            <th>Bookings</th>                
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)                
                <tr>                 
                <td>
                    <a href="" class="fw-500">
                        {{ $package->name }}
                    </a>
                    <span class="d-block text-12 mt-2 text-muted">Created on {{ date('d - F, Y', strtotime($package->created_at)) }}</span>
                </td>                  
                <td>
                    <div class="rounded-4 size-35 bg-blue-1 text-white flex-center text-12 fw-600">4.8</div>
                </td>
                <td>
                    <a href="">12 Bookings</a>
                </td>
                <td><span class="rounded-100 py-4 px-10 text-center text-14 fw-500 {{ $package->status == 'published'?'bg-green-1 text-green-2':'bg-red-3 text-red-2' }} text-capitalize">{{ $package->status }}</span></td>
                <td>
                    <div class="row x-gap-10 y-gap-10 items-center">                      
    
                    <div class="col-auto">
                        <a href="{{ route('admin.packages.edit', ['slug' => $package->slug]) }}" class="flex-center bg-light-2 rounded-4 size-35">
                        <i class="icon-edit text-16 text-light-1"></i>
                        </a>
                    </div>
    
                    <div class="col-auto">
                        <a href="#" class="flex-center bg-light-2 rounded-4 size-35">
                        <i class="icon-trash-2 text-16 text-light-1"></i>
                        </a>
                    </div>
    
                    </div>
                </td>
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
