<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Appointment;

class AppointmentsExport implements FromQuery, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $selectedRows;

    public function __construct($selectedRows)
    {
        $this->selectedRows = $selectedRows;
    }

    public function map($appointment): array
    {
        return [
            $appointment -> id,
            $appointment -> client_id,
            $appointment -> date,
            $appointment -> time,
            $appointment -> status,
        ];
    }

    public function headings(): array
    {
        return [
            '#ID',
            'Client ID',
            'Date',
            'Time',
            'Status',
        ];
    }

    public function query()
    {
        return Appointment::whereIn('id', $this->selectedRows);
    }
}
