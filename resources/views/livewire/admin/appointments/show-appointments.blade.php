<div>
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-between mb-2">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input wire:model="selectPageRows" type="checkbox" value=""
                                                        name="todo2" id="todoCheck2">
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
                                                    <input wire:model="selectedRows" type="checkbox"
                                                        value="{{ $appointment->id }}" name="todo2"
                                                        id="{{ $appointment->id }}">
                                                    <label for="{{ $appointment->id }}"></label>
                                                </div>
                                            </th>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $appointment->name }}</td>
                                            <td>{{ $appointment->date }}</td>
                                            <td>{{ $appointment->time }}</td>
                                            <td>{{ $appointment->status }}</td>
                                            <td>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{ $appointments->links() }}
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->

            @dump($selectedRows)
        </div>
        <!-- /.content -->

    </div>