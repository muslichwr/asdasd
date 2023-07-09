@extends('admin/template')

@section('title', 'Report Aplikasi')
@section('content')

<div class="activity">
                        <form>
                            <div class="form-group">
                                <h for="exampleFormControlInput1">Username</h>
                                <input type="username" class="form-control" id="exampleFormControlInput1" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <h for="userpassword">Password Baru</h>                                            
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                    </span>                                                       
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>                               
                            </div>
                            <div class="form-group">
                                <h for="userpassword">Ulangi Password Baru</h>                                            
                                <div class="input-group mb-3"> 
                                    <span class="auth-form-icon">
                                    </span>                                                       
                                    <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                </div>                               
                            </div>
                            <a href="#">
                                <button type="button" class="ganti-password" id="sa-success">Ganti Password</button> 
                            </a>
                        </form>                                           
            </div>

@endsection