@extends('admin/template')

@section('title', 'Report Aplikasi')
@section('content')

<div class="activity">
                <div class="title2">
                    <span class="text">Report</span>
                </div>
                <div class="activity-data">
                    <div class="card-body">
                        <table id="datatable-buttons"  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Asset</th>
                                <th>Hostname</th>
                                <th>Nama Internal</th>
                                <th>Ip Address</th>
                                <th>OPD</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aplikasiData as $aplikasi)
                            <tr>
                                <td>
                                    <a href="{{ url('/detailsreport', ['id' => $aplikasi->id]) }}">
                                        <i class="fas fa-angle-right"></i> {{ $loop->iteration }}
                                    </a>
                                </td>
                                <td>{{ $aplikasi->no_asset }}</td>
                                <td>{{ $aplikasi->hostname }}</td>
                                <td>{{ $aplikasi->nm_internal }}</td>
                                <td>{{ $aplikasi->ipaddress }}</td>
                                <td>{{ optional($aplikasi->ambilrefopdid)->nama }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>        
                    </div>
                </div>
            </div>


@push('scripts')
<script>
</script>

@endpush
@endsection