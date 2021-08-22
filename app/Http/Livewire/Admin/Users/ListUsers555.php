<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ListUsers555 extends Component
{
    public $state = [];
    public $user;
    public $showEditModal = false;
    public $userIdBeingRemoved = null;
    public $searchTerm = null;

    public function render()
    {
        $users555 = DB::table('users555')
            ->select(DB::raw('id,name,email'))
            ->where('name', 'like', '%'.$this->searchTerm.'%')
            ->latest()->paginate();

            return view('livewire.admin.users.list-users555',['users555' => $users555,]);
    }

    public function addNew()
    {
        $this->state = [];

        $this->showEditModal = false;

        $this->dispatchBrowserEvent('show-form555');
    }

    public function createUser()
    {
        $validateData = Validator::make($this->state, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        $validateData['password'] = bcrypt($validateData['password']);

        DB::table('users555')->insert($this->state);
        //dd($this->state);
        $this->dispatchBrowserEvent('hide-form555');
    }

    public function edit($id)
    {
        $this->showEditModal = true;

        $xxx = DB::table('users555')
                    -> select('id','name','email','password','phone','gender')
                    -> where('id','=',$id)
                    -> get();

        $data = array();
        $data["id"] = $xxx[0]->id;
        $data["name"] = $xxx[0]->name;
        $data["email"] = $xxx[0]->email;
        $data["password"] = $xxx[0]->password;
        $data["phone"] = $xxx[0]->phone;
        $data["gender"] = $xxx[0]->gender;

        $this->state = $data;

        $this->dispatchBrowserEvent('show-form555');
    }

    public function updateUser()
    {
        // $validateData = Validator::make($this->state, [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ])->validate();

        DB::statement("UPDATE users555 SET name=?, email=?, password=?, phone=?, gender=? where id=?"
                    ,[$this->state['name'],$this->state['email'],$this->state['password']
                    ,$this->state['phone'],$this->state['gender'],$this->state['id']]);

        $this->dispatchBrowserEvent('hide-form555', ['message' => 'User updated successfully!']);
    }

    public function confirmUserRemoval($userid)
    {
        $this->userIdBeingRemoved = $userid;

        $this->dispatchBrowserEvent('show-delete-modal555');
    }

    public function deleteUser()
    {
        $user = DB::statement("DELETE FROM users555 WHERE id=?",[$this->userIdBeingRemoved]);

        $this->dispatchBrowserEvent('hide-delete-modal555', ['message' => 'User deleted successfully!']);
    }
}
