@extends('admin/template')
@section('title','Edit Aplikasi')

@section('content')
<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Edit Aplikasi</h5>
                        <a href="/detailaplikasi" class="btn btn-sm btn-primary" style="float: right;">All Aplikasi</a>
                    </div>
                    <div class="card-body">
                        @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif

                        <form wire:submit.prevent="updateAplikasi">
                        <div class="form-group">
                                <label for="aplikasi_id">Student ID</label>
                                <input type="number" class="form-control" wire:model="aplikasi_id" autocomplete="off" />
                                {{-- for validation --}}
                                @error('aplikasi_id')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hostname">Nomor Asset</label>
                                <input type="text" class="form-control" wire:model="hostname" autocomplete="off" />
                                {{-- for validation --}}
                                @error('hostname')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="hostname">Hostname</label>
                                <input type="text" class="form-control" wire:model="hostname" autocomplete="off" />
                                {{-- for validation --}}
                                @error('hostname')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="namaEksternal">Nama Eksternal</label>
                                <input type="text" class="form-control" wire:model="namaEksternal" autocomplete="off" />
                                {{-- for validation --}}
                                @error('namaEksternal')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi</label>
                                <input type="text" class="form-control" wire:model="lokasi" autocomplete="off" />
                                {{-- for validation --}}
                                @error('lokasi')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm w-50">Update Aplikasi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
