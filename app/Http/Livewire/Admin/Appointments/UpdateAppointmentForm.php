<?php

namespace App\Http\Livewire\Admin\Appointments;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UpdateAppointmentForm extends Component
{
    public $state = [];

    public function mount($appointment_id)
    {
        $xxx = DB::table('appointments')
                    -> select('id','client_id','date','time','status','note')
                    -> where('id','=',$appointment_id)
                    -> get();

        $data = array();
        $xxx_date = \Carbon\Carbon::parse($xxx[0]->date);
        $xxx_time = \Carbon\Carbon::parse($xxx[0]->time);
        $data["id"] = $xxx[0]->id;
        $data["client_id"] = $xxx[0]->client_id;
        $data["date"] = $xxx_date->format('m-d-Y');
        $data["time"] = $xxx_date->format('h:m A');
        $data["status"] = $xxx[0]->status;
        $data["note"] = $xxx[0]->note;

        $this->state = $data;
    }

    public function UpdateAppointment() {
        DB::statement("UPDATE appointments SET client_id=?, date=?, time=?, status=? where id=?"
                    ,[$this->state['client_id'],$this->state['date'],$this->state['time']
                    ,$this->state['status'],$this->state['id']]);
        
        $this->dispatchBrowserEvent('alert',['message' => 'Appointment update successfullt!']);
    }

    public function render()
    {
        $clients = DB::table('clients')
        ->select('id','name')
        ->latest()->paginate();
        
        return view('livewire.admin.appointments.update-appointment-form', [
            'clients' => $clients,
        ]);
    }
}
