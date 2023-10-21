@props(['type', 'message'])

<div>
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)">
        <div  class="d-flex items-center justify-between bg-{{ $type }}-1 pl-10 pr-10 py-20 mb-2 rounded-8">
          <div class="text-{{ $type }}-2 lh-1 fw-500"> {{ $message }} </div>
          <div class="text-{{ $type }}-2 text-14 icon-close"></div>
        </div> 
      </div>  
</div>