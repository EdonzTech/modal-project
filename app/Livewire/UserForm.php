<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class UserForm extends Component
{
    use WithFileUploads;
    
    #[Validate('required|min:3|max:50')]
    public $name;

    #[Validate('required|email|max:200|unique:users')]
    public $email;

    #[Validate('required|min:3|')]
    public $password;

    #[Validate('nullable|sometimes|image|max:1020')]
    public $image;

    public function create() {
        // Validation
        $validate = $this->validate();

        if($this->image) {
            $validate['image'] = $this->image->store('uploads', 'public');
        }
        // Create User
       $user = User::create($validate);
        // Reset
        $this->reset('name', 'email', 'password', 'image');
        request()->session()->flash('success', 'User successfully created');
        $this->dispatch('close-modal');

    }

    public function render()
    {
        return view('livewire.user-form');
    }
}
