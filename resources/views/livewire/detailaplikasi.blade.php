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
                        <th>OPDID</th>
                        <th>Extn.</th>
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
                        {{ $aplikasi->ipaddress  }}
                    @endforeach
                        </td>
                        <td>{{ $opd->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Id</th>
                        <th>Name</th>
                        <th>OPDID</th>
                        <th>Extn.</th>
                    </tr>
                </tfoot>
            </table>
</div>
</div>
        
@push('scripts')
<script>
    document.addEventListener("livewire:load", function () {
        var searchWait = 0;
        var searchWaitInterval;
        var previousSearchTerm = "";

        function format(d) {
    var aplikasiValues = d.opdid.split(" ");
    var html = '<div class="slider">';
    html += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">';

    for (var i = 0; i < aplikasiValues.length; i++) {
        var value = aplikasiValues[i].trim(); // Remove leading/trailing whitespaces
        if (value !== '') {
            html += '<tr>';
            html += '<td>Nama Aplikasi:</td>';
            html += '<td>' + value + '</td>';
            html += '</tr>';
        }
    }

    html += '</table>';
    html += '</div>';

    return html;
}


        function initDataTable() {
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
                    { "data": "opdid" },
                    { "data": "extn", "visible": false }
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
                    // Open this row
                    row.child(format(row.data())).show();
                    tr.addClass('shown');
                }
            });
            // Search Event for delay
            $('.dataTables_filter input')
                .unbind()
                .bind('input', function (e) {
                    var item = $(this);
                    searchWait = 0;
                    if (!searchWaitInterval) searchWaitInterval = setInterval(function () {
                        if (searchWait >= 5) {
                            clearInterval(searchWaitInterval);
                            searchWaitInterval = '';
                            var searchTerm = item.val().trim();
                            if (searchTerm !== previousSearchTerm) {
                                previousSearchTerm = searchTerm;
                                table.search(searchTerm).draw();
                                if (searchTerm === "") {
                                    // Empty search term, close all child rows
                                    table.rows().every(function (rowIdx, tableLoop, rowLoop) {
                                        var tr = $(this.node());
                                        var row = table.row(tr);
                                        if (row.child.isShown()) {
                                            $('div.slider', row.child()).slideUp(function () {
                                                row.child.hide();
                                                tr.removeClass('shown');
                                            });
                                        }
                                    });
                                } else {
                                    // Non-empty search term, expand child rows for matching results
                                    table.rows({ search: 'applied' }).every(function (rowIdx, tableLoop, rowLoop) {
                                        var tr = $(this.node());
                                        var row = table.row(tr);
                                        if (!row.child.isShown()) {
                                            row.child(format(row.data()), 'no-padding').show();
                                            tr.addClass('shown');
                                            $('div.slider', row.child()).slideDown();
                                        }
                                    });
                                }
                            }
                            searchWait = 0;
                        }
                        searchWait++;
                    }, 200);
                });
        }

        initDataTable();
    });
</script>

@endpush
