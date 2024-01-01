<div class="hero min-h-screen bg-base-200">
    <div class="hero-content flex-col lg:flex-row-reverse">
      <div class="text-center lg:text-left border-4 border-gray-500 p-3">
        @if (session()->has('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('succ'))
            <div class="alert alert-success">
                {{ session('succ') }}
            </div>
        @endif
        @foreach ($comments as $comment)
            <div class="py-2 flex justify-between">
                <div>
                    <div class="flex items-center gap-3">
                        <h1 class="text-xl font-semibold">{{ $comment->user_id }}</h1>
                        <h3 class="text-xs font-semibold">{{ $comment->created_at->diffForHumans() }}</h3>
                    </div>
                    <div class="w-[70px;]">
                      <img src="{{ asset($comment->photo) }}" alt="">
                    </div>
                    <p class="py-1">{{ $comment->comment }}</p>
                </div>
                <div>
                    <button class="text-3xl font-bold text-red-600" wire:click="remove({{ $comment->id }})">x</button>
                </div>
            </div>
        @endforeach
        {{ $comments->links('pagination-links') }}
      </div>
      <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <form class="card-body" wire:submit.prevent="addComment">
            @error('newComment') <span class="error  text-red-500">{{ $message }}</span> @enderror 
            @error('image') <span class="error  text-red-500">{{ $message }}</span> @enderror 
          <div class="form-control" >
            <label class="label">
              <span class="label-text">Comment</span>
            </label>
            <input type="text" placeholder="Comment" class="input input-bordered" wire:model="newComment" />
          </div>
          <div class="form-control">
            <label class="label">
              <span class="label-text" wire:click="click">Image</span>
            </label>

            <div class="flex justify-center py-2">
              <img src="{{ $image ? $image->temporaryURL() : '' }}" alt="" class="w-1/2 text-center">
            </div>
            <input type="file"  id="image" class="file-input file-input-bordered file-input-success w-full max-w-xs "wire:model="image" accept="image/*"/>
            
          </div>
          <div class="form-control mt-6">
            <button type="submit" class="btn btn-primary" >Login</button>
          </div>
        </form>
        <h1 class="alert {{ $eventHadler ? '' : 'hidden' }}" >sakdfhpsadh</h1>
      </div>
    </div>
  </div>
