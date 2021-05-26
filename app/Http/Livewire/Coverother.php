<?php

namespace App\Http\Livewire;

use App\Models\Covers;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Coverother extends Component
{
    use WithFileUploads;

    public $users, $mains;

    public function mount()
    {
        $image = Covers::all();
        $this->users = $image;

        $user = User::all();
        $this->mains = $user;
    }

    public function render()
    {
        return view('livewire.coverother');
    }
}
