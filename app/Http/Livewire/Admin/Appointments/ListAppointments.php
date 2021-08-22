<?php

namespace App\Http\Livewire\Admin\Appointments;

use App\Http\Livewire\Admin\AdminComponent;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppointmentsExport;

class ListAppointments extends AdminComponent
{
    protected $listeners = ['deleteConfirmed' => 'deleteAppointment'];
    
    public $appointmentIdBeingRemoved = null;
    public $status;
    public $selectedRows = [];
    public $selectPageRows = false;

    public function export()
    {
        return (new AppointmentsExport($this->selectedRows))->download('appointments.xlsx');
    }

    public function deleteSelectedRows()
    {
        DB::table('appointments')
            ->whereIn('id', $this->selectedRows)->delete();
        
        $this->dispatchBrowserEvent('deleted', ['message' => 'Appointment deleted sucessfully!']);

        $this->reset(['selectedRows','selectPageRows']);
    }

    public function updatedSelectPageRows($value)
    {
        dd($value);

        if ($value)
        {
            $this->selectedRows = $this->appointments->pluck('id')->map(function ($id) {
                return (string) $id;
            });
        } else {
            $this->reset(['selectedRows', 'selectPageRows']);
        }
    }

    public function getAppointmentsProperty() //ไม่เข้าใจ
    {
        if ($this->status) {
            return $appointments = DB::table('appointments')
            ->join('clients', 'appointments.client_id', '=', 'clients.id')
            ->select('appointments.*','clients.name')
            ->where('status','=',$this->status)
            ->latest()->paginate(3);
        } else
        {
            return $appointments = DB::table('appointments')
            ->join('clients', 'appointments.client_id', '=', 'clients.id')
            ->select('appointments.*','clients.name')
            ->latest()->paginate(3);
        }
    }

    public function filterAppointmentsByStatus($status = null)
    {
        $this->resetPage();
        $this->status = $status;
    }

    public function deleteAppointment()
    {
        DB::statement("DELETE FROM appointments where id=?"
                    ,[$this->appointmentIdBeingRemoved]);

        $this->dispatchBrowserEvent('deleted', ['message' => 'Appointment deleted sucessfully!']);
    }

    public function render()
    {
        
        $appointments = $this->appointments;
        
        $appointmentsCount = DB::table('appointments')->count();
        $scheduledAppointmentsCount = DB::table('appointments')
                                        ->where('status','=','SCHEDULED')->count();
        $closedAppointmentsCount = DB::table('appointments')
                                        ->where('status','=','CLOSED')->count();

        return view('livewire.admin.appointments.list-appointments', [
            'appointments' => $appointments,
            'appointmentsCount' => $appointmentsCount,
            'scheduledAppointmentsCount' => $scheduledAppointmentsCount,
            'closedAppointmentsCount' => $closedAppointmentsCount,
        ]);
    }

    public function confirmAppointmentRemoval($appointment_id)
    {
        $this->appointmentIdBeingRemoved = $appointment_id;

        $this->dispatchBrowserEvent('show-delete-confirmation');
    }
}
