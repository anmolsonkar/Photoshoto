<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\User;

class Other extends Component
{
    use WithFileUploads;

    public $users, $mains, $image_path1, $image_path2, $name1, $name2, $about;

    public function mount()
    {
        $image = Image::latest()->get();
        $this->users = $image;

        $user = User::all();
        $this->mains = $user;
    }


    public function render()
    {
        return view('livewire.other');
    }
}
