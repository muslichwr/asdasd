@extends('admin/template')

@section('title', 'Details Report')
@section('content')

<div class="activity">
    <div class="title2">
        <span class="text">Details Report of {{ $aplikasi->nm_internal }} / {{ $aplikasi->nm_eksternal }} </span>
    </div>
    <div class="activity-data2">
        <div class="card-body">
            <h4 style="color: white;">Domain Aplikasi</h4>
            <!-- Display the details of the aplikasi record -->
            <h>No Asset:</h>
            <input class="form-control" placeholder="{{ $aplikasi->no_asset }}" readonly> </input>
            <h>Hostname:</h>
            <input class="form-control" placeholder="{{ $aplikasi->hostname }}" readonly> </input>
            <h>Nama Internal:</h>
            <input class="form-control" placeholder="{{ $aplikasi->nm_internal }}" readonly> </input>
            <h>IP Address:</h>
            <input class="form-control" placeholder="{{ $aplikasi->ipaddress }}" readonly> </input>
            <h>Status:</h>
            <input class="form-control" placeholder="{{ $refStatus->status }}" readonly> </input>
            <h>Tanggal Launching:</h>
            <input class="form-control" placeholder="{{ $aplikasi->tgl_launching }}" readonly> </input>
        </div>
    </div>
</div>

@endsection
