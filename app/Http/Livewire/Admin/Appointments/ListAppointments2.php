<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ListAppointments2 extends AdminComponent
{
    public $selectedRows = [];
    public $selectedPageRows = true;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $appointments = DB::table('appointments')
            ->join('clients', 'appointments.client_id', '=', 'clients.id')
            ->select('appointments.*','clients.name')
            ->latest()->paginate(3);

        return view('livewire.admin.appointments.list-appointments2',['appointments' => $appointments]);
    }
}
