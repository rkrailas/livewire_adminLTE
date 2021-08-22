<div>
    <x-loading-indicator />
    
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input wire:model="selectedPageRows" type="checkbox" value=""
                                                    name="todo2" id="todoCheck2">
                                                <label for="todoCheck2"></label>
                                            </div>
                                        </th>
                                        <th scope="col">#</th>
                                        <th scope="col">Client</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Status</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2">
                                <!-- {{ $appointments->links('pagination::bootstrap-4') }} -->
                                {{ $appointments->links() }}
                            </div>
                        </div>
                        @dump($selectedRows)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>