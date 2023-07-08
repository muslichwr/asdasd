<tr>
    <td colspan="2">
        <div class="child-table" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ref OPD ID</th>
                        <th>Nm Internal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($aplikasi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ref_opd_id }}</td>
                            <td>{{ $item->nm_internal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </td>
</tr>
