<div class="activity">
    <div class="title2">
        <span class="text">Daftar Aplikasi</span>
    </div>
    <div class="activity-data">
        <div class="card-body">
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nama Eksternal</th>
                        <th>ID Aplikasi</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Nama Eksternal</th>
                        <th>ID Aplikasi</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($refOpds as $refOpd)
                    <tr>
                        <td class="details-control"></td>
                        <td>{{ $refOpd->id }}</td>
                        <td>{{ $refOpd->nama }}</td>
                        <td>
                            <ul>
                                @foreach ($aplikasis as $aplikasi)
                                @if ($aplikasi->ref_opd_id == $refOpd->id)
                                <li>{{ $aplikasi->nm_eksternal }}</li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <ul>
                                @foreach ($aplikasis as $aplikasi)
                                @if ($aplikasi->ref_opd_id == $refOpd->id)
                                <li>
                                <a href="{{ route('data.detailaplikasi.edit', $aplikasi) }}">Edit</a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columns": [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                { "data": "Nama" },
                { "data": "IDRefOpd" },
                { "data": "NamaEksternal", "visible": false },
                { "data": "IDAplikasi", "visible": false }
            ],
            "order": [[1, 'asc']]
        });

        // Add event listener for opening and closing details
        $('#example tbody').on('click', 'td.details-control', function() {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                    var rowData = row.data();
                    var childTable = '<div class="child-row">' +
                        '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                        '<tr>' +
                        '<th>Nama Eksternal</th>' +
                        '<th>Action</th>' +
                        '</tr>' +
                        '<tr>' +
                        '<td>' + rowData.NamaEksternal + '</td>' +
                        '<td>' + rowData.IDAplikasi + '</td>' +
                        '</tr>' +
                        '</table>' +
                        '</div>';

                    var childRow = row.child(childTable).show();
                    tr.addClass('shown');

                                }
                            });

        var searchWait = 0;
        var searchWaitInterval;
        var previousSearchTerm = "";
        $('.dataTables_filter input')
            .unbind()
            .bind('input', function(e) {
                var item = $(this);
                searchWait = 0;
                if (!searchWaitInterval) searchWaitInterval = setInterval(function() {
                    if (searchWait >= 5) {
                        clearInterval(searchWaitInterval);
                        searchWaitInterval = '';
                        var searchTerm = item.val().trim();
                        if (searchTerm !== previousSearchTerm) {
                            previousSearchTerm = searchTerm;
                            table.search(searchTerm).draw();
                            if (searchTerm === "") {
                                // Empty search term, close all child rows
                                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                                    var tr = $(this.node());
                                    var row = table.row(tr);
                                    if (row.child.isShown()) {
                                        row.child.hide();
                                        tr.removeClass('shown');
                                    }
                                });
                            } else {
                                // Non-empty search term, expand child rows for matching results
                                table.rows({ search: 'applied' }).every(function(rowIdx, tableLoop, rowLoop) {
                                    var tr = $(this.node());
                                    var row = table.row(tr);
                                    if (!row.child.isShown()) {
                                      var rowData = row.data();
                                      var childTable = '<div class="child-row">' +
                                          '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
                                          '<tr>' +
                                          '<th>Nama Eksternal</th>' +
                                          '<th>Action</th>' +
                                          '</tr>' +
                                          '<tr>' +
                                          '<td>' + rowData.NamaEksternal + '</td>' +
                                          '<td>' + rowData.IDAplikasi + '</td>' +
                                          '</tr>' +
                                          '</table>' +
                                          '</div>';

                                      var childRow = row.child(childTable).show();
                                      tr.addClass('shown');
                                    }
                                });
                            }
                        }
                        searchWait = 0;
                    }
                    searchWait++;
                }, 200);
            });
    });
</script>
@endpush
