@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @role('super-admin')
                    Hi boss Super Admin 
                    @endrole

                    @role('dosen')
                    Hi Pak Dosen
                    @endrole

                    @role('validator')
                    Hi mas Validator
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
