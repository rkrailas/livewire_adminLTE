<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\DB;

class ShowAppointments extends AdminComponent
{
    public $selectedRows = [];
    public $selectedPageRows = true;

    public function render()
    {
        $appointments = DB::table('appointments')
            ->join('clients', 'appointments.client_id', '=', 'clients.id')
            ->select('appointments.*','clients.name')
            ->latest()->paginate(3);

        return view('livewire.admin.appointments.show-appointments',['appointments' => $appointments]);
    }
}
