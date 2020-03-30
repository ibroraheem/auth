@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-md-8">
<div class="card">
    <div class="card-header">{{ __('Verify Phone Number') }}</div>
    <div class="card-body">
        <form method="POST" >
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
        <div class="form-group row">
            <label for="contact_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
            <div class="col-md-6">
                <input type="tel" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" required >

                @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Verify') }}
                        </button>
        </div>
</div>
    </div>
</div>






</div>
@endsection
