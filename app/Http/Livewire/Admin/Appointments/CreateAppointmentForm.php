<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CreateAppointmentForm extends Component
{
    public $state = [
        // กำหนดค่าเริ่มต้น
        'status' => 'SCHEDULED',
    ];

    public function createAppointment()
    {
        //dd(implode(',', $this->state['members']));

        Validator::make($this->state, [
            'client_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'note' => 'nullable',
            'status' => 'required',
        ])->validate();

        $this->state['members'] = implode(',', $this->state['members_ori']);

        unset($this->state['members_ori']);

        DB::table('appointments')->insert($this->state);

        $this->dispatchBrowserEvent('alert', ['message' => 'Appointment create successfully!']);
    }

    public function render()
    {
        $clients = DB::table('clients')
        ->select('id','name')
        ->latest()->paginate();

        return view('livewire.admin.appointments.create-appointment-form', [
            'clients' => $clients,
        ]);
    }
}
