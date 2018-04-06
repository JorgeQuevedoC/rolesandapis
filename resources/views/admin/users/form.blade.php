@php
$roles = App\Privilege::withoutEmpty()->get();
@endphp

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="col-md-4 control-label">{{ 'Name' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="name" type="text" id="name" value="{{ $user->name or ''}}" required>
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="col-md-4 control-label">{{ 'Email' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="email" type="email" id="email" value="{{ $user->email or ''}}" required>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('privilege_id') ? 'has-error' : ''}}">
    <label for="privilege_id" class="col-md-4 control-label">{{ 'Role Id' }}</label>
    <div class="col-md-6">
        <select class="form-control" name="privilege_id" type="number" id="privilege_id" value="{{ $user->privilege_id or ''}}" required>
            @php
                if(isset($user)){
                    $sectionName = DB::table('privileges')->where('id', $user->privilege_id)->first();
                }
            @endphp
            @if (isset($sectionName))
                <option value={{$sectionName->id}} selected>{{strtoupper($sectionName->privilege)}}</option>
            @endif

            @foreach ($roles as $section)
                <option value={{$section->id}}>{{strtoupper($section->privilege)}}</option>
            @endforeach
        </select> 
        {!! $errors->first('privilege_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <input class="form-control" name="password" type="password" id="password" value="{{ $user->password or ''}}" required style="display:none;">
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('api_token') ? 'has-error' : ''}}">
    <div class="col-md-6">
        <input class="form-control" name="api_token" type="text" id="api_token" value="{{ $user->api_token or ''}}" required style="display:none;">
        {!! $errors->first('api_token', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
