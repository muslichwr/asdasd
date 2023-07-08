<div class="activity">
    <div class="title2">
        <span class="text">Daftar Aplikasi</span>
    </div>
    <div class="activity-data">
        <div class="card-body">
            <table id="table-rows" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>idOPD</th>
                        <th>idAplikasi</th>
                        <th>NamaEksternal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($opds as $opd)
                    <tr>
                        <td class="details-control"></td>
                        <td>{{ $opd->id}}</td>
                        <td>{{ $opd->nama }}</td>
                        <td>
                            @foreach($opd->aplikasis as $aplikasi)
                            {{ $aplikasi->ref_opd_id  }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($opd->aplikasis as $aplikasi)
                            {{ $aplikasi->id}}
                            @endforeach
                        </td>
                        <td>
                            @foreach($opd->aplikasis as $aplikasi)
                            {{ $aplikasi->nm_eksternal}}
                            @endforeach
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>idOPD</th>
                        <th>idAplikasi</th>
                        <th>NamaEksternal</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener("livewire:load", function () {
        var table = $('#table-rows').DataTable({
            "columns": [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                { "data": "id" },
                { "data": "name" },
                { "data": "idopd" },
                { "data": "idaplikasi" },
                { "data": "nmeksternal" }
            ],
            "order": [[1, 'asc']]
        });

        // Add event listener for opening and closing details
        $('#table-rows tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Close all previously opened child rows
                table.rows('.shown').every(function () {
                    $(this.node()).removeClass('shown');
                    this.child.hide();
                });

                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });

        // Search Event with delay
        var searchWaitInterval;
        var previousSearchTerm = "";
        $('.dataTables_filter input').unbind().bind('input', function (e) {
            var item = $(this);
            if (searchWaitInterval) {
                clearTimeout(searchWaitInterval);
            }

            searchWaitInterval = setTimeout(function () {
                var searchTerm = item.val().trim();
                if (searchTerm !== previousSearchTerm) {
                    previousSearchTerm = searchTerm;
                    table.search(searchTerm).draw();
                }
            }, 500);
        });

        // Function to format the child row
        function format(data) {
    var aplikasiValues = data.idaplikasi.split(" ");
    var html = '<div class="slider">';
    html += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left: 50px; width: 100%;">';

    for (var i = 0; i < aplikasiValues.length; i++) {
        var value = aplikasiValues[i].trim(); // Remove leading/trailing whitespaces
        if (value !== '') {
            html += '<tr>';
            html += '<td>ID Aplikasi:</td>';
            html += '<td>' + value + '</td>';
            html += '</tr>';
        }
    }

    html += '<tr>';
    html += '<td>Nama Eksternal:</td>';
    html += '<td>' + data.nmeksternal + '</td>';
    html += '</tr>';

    html += '</table>';
    html += '</div>';

    return html;
}

    });
</script>
@endpush
