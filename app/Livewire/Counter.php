<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $counts = 1;
    public function increment(){
        $this->counts ++;
    }
    public function decrement(){

        $this->counts --;
        
    }
    public function render()
    {
        return view('livewire.counter',
    [
        'count' =>$this->counts,
    ]
    );
    }
   
}
