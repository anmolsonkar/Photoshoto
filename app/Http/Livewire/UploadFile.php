<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UploadFile extends Component
{
    use WithFileUploads;

    public $users, $user_id, $mains, $about, $name1, $name2, $Photo1, $Photo2;


    protected $rules = [
        'about' => 'max:250',
        'name1' => 'required|max:15',
        'name2' => 'required|max:15',
        'Photo1' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        'Photo2' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
    ];

    public function updated($realtime)
    {
        $this->validateOnly($realtime);
    }
    protected $validationAttributes = [
        'name1' => 'name',
        'name2' => 'name',
        'Photo1' => 'image',
        'Photo2' => 'image',
        'about' => 'about field'
    ];

    public function submit()
    {
        $this->user_id = Auth::user()->id;

        $dataValid = $this->validate([
            'user_id' => 'required',
            'about' => 'max:250',
            'name1' => 'required|max:15',
            'name2' => 'required|max:15',
            'Photo1' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'Photo2' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $dataValid['Photo1'] = $this->Photo1->store('Images', 'public');
        $dataValid['Photo2'] = $this->Photo2->store('Images', 'public');

        Image::create($dataValid);
        session()->flash('msg1',''); 
        return redirect('/dashboard');
      
    }
    public function mount()
    {
        $image = Image::latest()->get();
        $this->users = $image;

        $user = User::all();
        $this->mains = $user;
    }

    public function render()
    {
        return view('livewire.upload-file');
    }
}
