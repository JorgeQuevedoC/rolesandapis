@php 
    $emptySlot = App\Privilege::where('privilege', 'empty')->first();
@endphp

<div class="form-group {{ $errors->has('privilege') ? 'has-error' : ''}}">
    <label for="id2" class="col-md-4 control-label">{{ 'ID' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="id2" type="text" id="id2" value="{{ $emptySlot->id or ''}}" disabled>
        <input class="form-control" name="id" type="text" id="id" value="{{ $emptySlot->id or ''}}" style="display:none;" >
        {!! $errors->first('id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('privilege') ? 'has-error' : ''}}">
    <label for="privilege" class="col-md-4 control-label">{{ 'Privilege' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="privilege" type="text" id="privilege" value="{{ $privilege->privilege or ''}}" >
        {!! $errors->first('privilege', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('role_header') ? 'has-error' : ''}}">
    <label for="role_header" class="col-md-4 control-label">{{ 'Role Header' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="role_header2" type="text" id="role_header2" value="{{ $emptySlot->role_header or ''}}" disabled>
        <input class="form-control" name="role_header" type="text" id="role_header" value="{{ $emptySlot->role_header or ''}}" style="display:none;">
        {!! $errors->first('role_header', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
