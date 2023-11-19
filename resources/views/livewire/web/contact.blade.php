<div>
    @if ($isSubmitted)
    <div 
        x-data="{
            show : true,                  
        }" 
        x-show="show">
        <div class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
            <div class="text-success-2 lh-1 fw-500">Your message has been send successfully.</div>
            <div class="text-success-2 text-14 icon-close" @click.prevent="show =!show"></div>
        </div>
    </div>
    @else        
        <form wire:submit.prevent="submit" method="post" class="row y-gap-20 pt-20">
            <div class="col-12">

                <div class="form-input ">
                <input type="text" wire:model="name">
                <label class="lh-1 text-16 text-light-1">Full Name</label>
                </div>
                @error('name')
                    <span class="text-red-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">

                <div class="form-input ">
                <input type="email" wire:model="email">
                <label class="lh-1 text-16 text-light-1">Email</label>
                </div>
                @error('email')
                    <span class="text-red-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">

                <div class="form-input ">
                <input type="text" wire:model="subject">
                <label class="lh-1 text-16 text-light-1">Subject</label>
                </div>
                @error('subject')
                    <span class="text-red-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-12">

                <div class="form-input ">
                <textarea rows="4" wire:model="message"></textarea>
                <label class="lh-1 text-16 text-light-1">Your Messages</label>
                </div>
                @error('message')
                    <span class="text-red-1">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-auto">
                <button class="button px-24 h-50 -dark-1 bg-blue-1 text-white">
                    Send a Messsage <div class="icon-arrow-top-right ml-15"></div>
                </button>
            </div>
        </form>
    @endif
</div>
