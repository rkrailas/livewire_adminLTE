<?php

namespace App\Http\Livewire\Admin\Users;

use App\Http\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\Validator;
use App\Models\user;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class ListUsers extends AdminComponent
{
    use WithFileUploads;

    public $state = [];
    public $user;
    public $showEditModal = false;
    public $userIdBeingRemoved = null;
    public $searchTerm = null;
    public $photo;
    public $photo2;
    
    public function changeRole($user_id, $role)
    {
        DB::statement("UPDATE users SET role=? where id=?"
                    ,[$role,$user_id]);

        $this->dispatchBrowserEvent('alert', ['message' => "Role changed to {$role} successfully!"]);
    }

    public function addNew()
    {
        $this->state = [];

        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form');
    }

    public function createUser()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

        if ($this->photo) 
        {
            //dd($this->photo->store('/','avatars'));
            $validateData['avatar'] = $this->photo->store('/','avatars');
        }

        User::create($validateData);

        //session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User added successfully!']);
    }

    public function edit(User $user)
    {
        $this->reset();

        $this->showEditModal = true;

        $this->user = $user;

        $this->state = $user->toArray();

        //dd($this->state['avatar']);
        $this->photo2 = $this->state['avatar'];

        $this->dispatchBrowserEvent('show-form');
    }

    public function updateUser()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'sometimes|confirmed',
        ])->validate();

        if(!empty($validateData['password'])) 
        {
            $validateData['password'] = bcrypt($validateData['password']);
        }
        
             
        $this->user->update($validateData);

        //session()->flash('message', 'User added successfully!');

        $this->dispatchBrowserEvent('hide-form', ['message' => 'User updated successfully!']);

    }

    public function confirmUserRemoval($userid)
    {
        $this->userIdBeingRemoved = $userid;

        $this->dispatchBrowserEvent('show-delete-modal');
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userIdBeingRemoved);

        $user->delete();

        $this->dispatchBrowserEvent('hide-delete-modal', ['message' => 'User deleted successfully!']);
    }

    public function render()
    {
        $users = User::query()
            ->where ('name', 'like', '%'.$this->searchTerm.'%')
            ->orwhere ('email', 'like', '%'.$this->searchTerm.'%')
            ->latest()->paginate(5);

        return view('livewire.admin.users.list-user', [
            'users' => $users,
        ]);
    }
}
