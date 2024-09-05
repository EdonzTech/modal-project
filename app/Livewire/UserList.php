<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

// #[Layout('layout.app')]
class UserList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';
    public User $selectedUser;

    public function mount($search = null) {
        $this->search = $search;
    }

    #[Computed()]
    public function users() {
        return User::latest()
                    ->where('name', 'like', "%{$this->search}%")
                    ->paginate(3);
    }

    public function viewUser( User $user) {
        $this->selectedUser = $user;
        $this->dispatch('open-modal', name : 'user_details');
    
    }
    // public function render()
    // {
    //     // To Pass The Variable To The View
    //     return view('livewire.user-list', 
    //     ['users' => User::latest()->get()]);
    // }
 
    
}
