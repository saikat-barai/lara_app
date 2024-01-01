<?php

namespace App\Livewire;

use App\Models\Comment;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use function Laravel\Prompts\alert;

class Comments extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $image;
    public $eventHadler= false ;
    public $newComment ;





    public function addComment(){
        $this->validate([
            'newComment' => 'required|max:200',
            'image' => 'required',
        ]);
        if ($this->image) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'. $this->image->getClientOriginalExtension();
            $image = $manager->read($this->image);
            $image->save(public_path('images/comment/'.$name_gen));
            $img_url = 'images/comment/'.$name_gen;
        }
        Comment::create([
            'comment' => $this->newComment,
            'user_id' =>1,
            'photo' =>$img_url,
            'created_at' =>Carbon::now(),
        ]);
        $this->newComment = '';
        $this->image ='';
        session()->flash('succ', 'Post Created Successfully...');
    }
    public function remove($id){
        $comment = Comment::find($id);
        $comment->delete();
        session()->flash('message', 'Post Deleted Successfully...');
    }
    public function click(){
        $this->eventHadler = !$this->eventHadler ;
    }
    public function render()
    {
        return view('livewire.comments', [
            'comments' => Comment::latest()->paginate(2),
        ]);
    }
}
