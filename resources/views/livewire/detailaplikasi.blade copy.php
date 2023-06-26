<div class="activity">
                <div class="title2">
                    <span class="text">Daftar Aplikasi</span>
                </div>
<div class="activity-data">
    <div class="card-body">
    <table id="child-rows-table" class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>
                        <button wire:click="toggleChildRow({{ $row->id }})" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus"></i>
                            <i class="fa fa-minus"></i>
                        </button>
                    </td>
                    <td>{{ $row->no_asset }}</td>
                    <td>{{ $row->hostname }}</td>
                    <td>{{ $row->ipaddress }}</td>
                </tr>
                @if ($selectedRowId === $row->id && $showChildRow)
                    <tr>
                        <td colspan="3">
                            <div class="child-content">
                                <p>{{ $row->no_asset }}</p>
                                <p>{{ $row->no_asset }}</p>
                                <p>{{ $row->no_asset }}</p>
                                <button id="but_add" class="btn btn-danger">Add New Row</button>
                                <!-- Child row content here -->
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
        </div>
        
</div>
        
@push('scripts')
    <script>
        document.addEventListener('livewire:load', function () {
            Livewire.emit('datatableRendered');
        });

        $(document).ready(function () {
            var table = null;

            Livewire.on('datatableRendered', function () {
                if (table === null) {
                    table = $('#child-rows-table').DataTable({
                        paging: true,
                        searching: true,
                        ordering: true,
                        info: true,
                        responsive: true,
                    });
                } else {
                    table.ajax.reload();
                }
            });
        });
    </script>
@endpush

