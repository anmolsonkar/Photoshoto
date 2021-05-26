<?php

namespace App\Http\Livewire;

use App\Models\Covers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithFileUploads;

class Cover extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'DeleteCover',
    ];

    public $users, $user_id, $cover, $mains, $image_path1, $image_path2, $coverpath;

    public $uploadcover = false;

    public function ConfirmDeleteCover($id)
    {
        $this->dispatchBrowserEvent('swal:confirmcover', [
            'id' => $id,
        ]);
    }


    public function cupload($id)
    {
        $this->uploadcover = $id;
    }

    public function mount()
    {
        $id = Auth::user()->id;
        $image = Covers::where('user_id', $id)->limit(1)->orderBy('id', 'DESC')->get();
        $this->users = $image;

        $user = User::all();
        $this->mains = $user;
    }

    public function upload()
    {

        $this->user_id = Auth::user()->id;
        $dataValid = $this->validate([
            'user_id' => 'required',
            'cover' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $dataValid['cover'] = $this->cover->store('Cover', 'public');
        Covers::create($dataValid);
        $this->uploadcover = false;
        session()->flash('msg3','');
    }


    public function DeleteCover($id)
    {
        $data = Covers::where('user_id', $id);
        $data->delete();
        return redirect('/home');
    }



    public function render()
    {
        return view('livewire.cover');
    }
}
