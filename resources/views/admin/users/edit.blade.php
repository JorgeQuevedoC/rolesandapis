@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Edit User {{ $user->name }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a href="{{ url('/admin/users') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                            </div>
                            <div class="col-md-5">
                                <form method="POST" action="{{  url('/admin/users/password')  }}" class="form-inline">
                                    @csrf
                                    <div class="form-group">
                                        <input id="emailReset" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="emailReset" value="{{$user->email}}" style="display:none;" required>
                                        @if ($errors->has('emailReset'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('emailReset') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            {{ __('Reset Password Link') }}
                                        </button>
                                    </div>                                        
                                </form>

                                    @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/admin/users/' . $user->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('admin.users.form', ['submitButtonText' => 'Update'])

                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
