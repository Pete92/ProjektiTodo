@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                   <register-form></register-form> {{-- Liitetään vuejs komponentti, tässä on rekisteröitymiseen tarvittavat inputit ja toiminta --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
