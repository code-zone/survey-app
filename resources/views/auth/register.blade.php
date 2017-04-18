@extends('layouts.master')

@section('content')
 <div class="card row">
    <div class="card-heading">
        <span class="card-title">
            Create A User Account
        </span>
    </div>
    <div class="card-body">
        <div class="">
        <form role="form" class="form-horizontal" method="post" id="footer-form" action="{{ route('users.store') }}">
        {{ csrf_field() }}
            <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label" for="name">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                    <i class="fa fa-user form-control-feedback"></i>
                    {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label" for="email">Email address</label>
                    <div class="col-sm-6">
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old('email')}}">
                <i class="fa fa-envelope form-control-feedback"></i>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label class="col-sm-3 control-label" for="phone_number">Phone Number</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="Enter you phone number" name="phone_number" value="{{old('phone_number')}}">
                    <i class="fa fa-phone form-control-feedback"></i>
                    {!! $errors->first('phone_number', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('role') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="role">Role</label>
                <div class="col-sm-6">
                   <select name="role" class="select2">
                       <optgroup label="User Roles">
                           <option value="Admin" {{old('role') == 'Admin' ? 'selected' : ''}}>Admin</option>
                           <option value="Respondent" {{old('role') =='Respondent' ? 'selected' : ''}}>Respondent</option>
                       </optgroup>
                   </select>
                    {!! $errors->first('role', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label" for="password">Password</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" placeholder="Enter Password" name="password">
                <i class="fa fa-key form-control-feedback"></i>
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
            <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-6">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                    <i class="fa fa-key form-control-feedback"></i>
                </div>
                                         
            </div>
            <div class="form-group">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary pull-right">Create User </button>
                </div>
            </div>
            </br>
            </br>
        </form>
        </div>
    </div>
</div>
            <!-- .footer end -->
@endsection
@push('scripts')
    <script type="text/javascript">
        $('.select2').select2({width:'100%'})
    </script>
@endpush
