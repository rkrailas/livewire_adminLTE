<div>
    <!-- <x-loading-indicator /> -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Appointments</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fa fa-check-circle mr-1"></i> {{ session('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <a href="{{ route('admin.appointments.create') }}">
                                <button class="btn btn-primary"><i class="fa fa-plus-circle" mr-1></i> Add New
                                    Appointment</button>
                            </a>

                        @if ($selectedRows)
                            <div class="btn-group" ml-2>
                                <button type="button" class="btn btn-default">Bulk Actions</button>
                                <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                    data-toggle="dropdown" aria-expanded="false">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <a wire:click.prevent="deleteSelectedRows" class="dropdown-item" href="#">Delete Selected</a>
                                    <a class="dropdown-item" href="#">Mark as Scheduled</a>
                                    <a class="dropdown-item" href="#">Mask as Closed</a>
                                    <a wire:click.prevent="export" class="dropdown-item" href="#">Export</a>
                                </div>
                            </div>
                            <span class="ml-2">Selected {{ count($selectedRows) }} appointments</span>
                        @endif
                        
                        </div>
                        
                        <div clasee="btn-group">
                            <button wire:click="filterAppointmentsByStatus" type="button"
                                class="btn {{ is_null($status) ? 'btn-secondary' : 'btn-default'}}">
                                <span class="mr-1">All</span>
                                <span class="badge badge-pill badge-info">{{ $appointmentsCount }}</span>
                            </button>

                            <button wire:click="filterAppointmentsByStatus('SCHEDULED')" type="button"
                                class="btn {{ $status=='SCHEDULED' ? 'btn-secondary' : 'btn-default'}}">
                                <span class="mr-1">Scheduled</span>
                                <span class="badge badge-pill badge-info">{{ $scheduledAppointmentsCount }}</span>
                            </button>

                            <button wire:click="filterAppointmentsByStatus('CLOSED')" type="button"
                                class="btn {{ $status=='CLOSED' ? 'btn-secondary' : 'btn-default'}}">
                                <span class="mr-1">Closed</span>
                                <span class="badge badge-pill badge-info">{{ $closedAppointmentsCount }}</span>
                            </button>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input wire:model="selectPageRows" type="checkbox" value="" name="todo2" id="todoCheck2">
                                                <label for="todoCheck2"></label>
                                            </div>
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">Client Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($appointments as $appointment)
                                    <tr>
                                        <th>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input wire:model="selectedRows" type="checkbox" value="{{ $appointment->id }}" name="todo2"
                                                    id="{{ $appointment->id }}">
                                                <label for="{{ $appointment->id }}"></label>
                                            </div>
                                        </th>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $appointment->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->date)->format('Y-m-d')}}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->time)->format('h:m A')}}</td>
                                        <td>
                                            @if ($appointment->status == 'SCHEDULED' )
                                            <span class="badge badge-primary">SCHEDULED</span>
                                            @elseif ($appointment->status == 'CLOSED' )
                                            <span class="badge badge-success">CLOSED</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.appointments.edit', $appointment->id) }}">
                                                <i class="fa fa-edit mr-2"></i>
                                            </a>
                                            <a href=""
                                                wire:click.prevent="confirmAppointmentRemoval({{ $appointment->id }})">
                                                <i class="fa fa-trash text-danger"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex justify-content-end mb-2">

                        </div>
                    </div>
                </div>
                {{ $appointments->links() }}
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

    <x-confirmation-alert />
</div>