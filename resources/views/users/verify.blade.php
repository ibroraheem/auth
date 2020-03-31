@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
<div class="card">
    <div class="card-header">{{ __('Verify Number') }}</div>
    <div class="card-body">
        <form method="POST" >
            {{ method_field('POST') }}
            {{ csrf_field() }}
        <div class="form-group row">
            <label for="otp" class="col-md-4 col-form-label text-md-right">{{ __('Enter OTP') }}</label>
            <div class="col-md-6">
                <input type="tel" id="otp" class="form-control @error('otp') is-invalid @enderror" name="otp" required >

                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-4 offset-md-0">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify') }}
                        </button>
        </div>
</div>
    </div>
</div>






</div>
@endsection
