<div>
    <x-slot name="title">Login</x-slot>
    <div class="container my-5">
        <h1 class="text-center my-3">Admin Login</h1>

        <div class="row my-5">
            <div class="col-xl-7 col-md-8 col-sm-12 offset-xl-3 offset-md-2 offset-sm-12 mb-5">
                <form action="#" class="p-5 bg-white" wire:submit.prevent='login'>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="email">Email</label>
                            <input type="email" wire:model='email' id="email" class="form-control">
                            <span class="text-danger">@error('email')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="password">Password</label>
                            <input type="password" wire:model='password' id="password" class="form-control">
                            <span class="text-danger">@error('password')
                                {{$message}}
                                @enderror</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary py-2 px-4 text-white">Signin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>