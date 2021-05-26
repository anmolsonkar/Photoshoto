<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\User;

class Home extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'Delete',
        'load-more' => 'loadMore',
    ];

    public $users, $mains, $image_path1, $image_path2, $name1, $name2, $about;

    public $deletepost = false;

    public $TotalResults = 10;
    
    public function loadMore(){
        $this->TotalResults += 10;
    }


    public function ConfirmDelete($id)
    {
        $this->dispatchBrowserEvent('swal:confirm',[
            'id'=>$id,
        ]);
    }

    public function mount()
    {
        $user = User::all();
        $this->mains = $user;
    }

    public function Delete($postid)
    {
        $data = Image::find($postid);
        $image_path1 = public_path() . '/' . 'storage' . '/' . $data->Photo1;
        $image_path2 = public_path() . '/' . 'storage' . '/' . $data->Photo2;
        unlink($image_path1);
        unlink($image_path2);
        $data->delete();
    }

    public function render()
    {
        $images = Image::query()->latest()->paginate($this->TotalResults);
        return view('livewire.home', compact('images'));
    }
}
