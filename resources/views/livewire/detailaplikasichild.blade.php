    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($refOpds as $refOpd)
                <tr>
                    <td>{{ $refOpd->id }}</td>
                    <td>{{ $refOpd->nama }}</td>
                </tr>
                @livewire('detailaplikasi', ['refOpdId' => $refOpd->id])
            @endforeach
        </tbody>
    </table>
