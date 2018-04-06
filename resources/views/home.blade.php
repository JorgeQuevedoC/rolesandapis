@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            
            <passport-clients></passport-clients>
            <br>
            <passport-authorized-clients></passport-authorized-clients>
            <br>
            <passport-personal-access-tokens></passport-personal-access-tokens>
            
        </div>
    </div>
</div>
@endsection
