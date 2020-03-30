@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <img class="" src="https://img.icons8.com/ios-glyphs/30/000000/user--v1.png"/> <p class="d-inline">My Profile</p>
                        <a class="stretched-link" href="{{route('users.edit')}}"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">
                        <img src="https://img.icons8.com/ios-glyphs/30/000000/phone--v1.png"/> <p class="d-inline">Verify Phone Number</p>
                        <a class="stretched-link" href="{{route('verify-phone')}}"></a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-body">

                    </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
