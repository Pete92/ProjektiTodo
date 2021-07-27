@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div id="app" class="card-body">
                   <login-form></login-form> {{-- Liitetään login komponentti jonka sisällä on tarvittava toiminta ja inputit kirjautumiseen --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
