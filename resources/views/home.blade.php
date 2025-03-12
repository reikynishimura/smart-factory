@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-10">
            <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
            <h1 style="background: #005f8d; color: white; padding: 10px 20px; border-radius: 5px;"><b>SMART</b>FACTORY 4.0</h1>
            </div>
        </div>
        <div class="container-fluid position-relative p-0">
            <div style="position: absolute; bottom: 0px; right: 10px;">
                <img src="{{ asset('images/ims_logo.png') }}" alt="IMS" class="img-fluid" width="100">
            </div>
        </div>
    </div>
</div>
@endsection
