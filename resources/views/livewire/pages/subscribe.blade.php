<div>
    <form action="#" method="post" wire:submit.prevent='subscribe'>
        <div class="input-group mb-3">
          <input type="email" wire:model='email' name="email" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
         
          <div class="input-group-append">
              <button class="btn btn-primary text-white" type="submit" id="button-addon2">Send</button>
          </div>
          
        </div>
        @error('email')
          <span class="text-danger">{{$message}}</span>
      @enderror
      </form>

</div>
