@extends('layouts.master')
    @section('content')
            <!-- Content -->
        @php
            $site = DB::table('configs')->get();
        @endphp
<div class="padding-out">
  <div class="p-h-md p-v bg-white box-shadow pos-rlt">
    <h3 class="no-margin">Settings</h3>
  </div>
  <div class="box">
    <div class="col-md-3">
      <div style="background:url(images/a1.jpg) center center; background-size:cover">
        <div class="p-lg bg-white-overlay text-center">
          <a href class="w-xs inline">
            <img src="{{asset('images/avatar1.jpg')}}" class="img-circle img-responsive">
          </a>
          <div class="m-b m-t-sm h2">
            <span class="text-black">{{Auth::user()->name}}</span>
          </div>
          <p>
            Great day, Great life
          </p>
        </div>
      </div>
    </div>
    <div class="col-md-9 b-l bg-white bg-auto">
      <div class="p-md bg-light lt b-b font-bold">Site Settings</div>
      <form role="form" method="post" class="p-md col-md-9" action="{{route('settings.store')}}">
        {{csrf_field()}}
        <div class="form-group">
          <label>Author Name</label>
          <input name="author" value="{{$site->where('key', 'author')->first()->value}}" type="text" class="form-control">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input name="email" type="email" value="{{$site->where('key', 'email')->first()->value}}" class="form-control">
        </div>
        <div class="form-group">
          <label>Phone Number</label>
          <input type="text" name="phone" value="{{$site->where('key', 'phone')->first()->value}}" class="form-control">
        </div>
        <div class="form-group">
          <label>Secondary Phone</label>
          <input type="text" name="secondary_phone" value="{{$site->where('key', 'secondary_phone')->first()->value}}" class="form-control">
        </div>
        <div class="form-group">
          <label>About Author</label>
          <textarea rows="6" name="about" class="form-control">{{$site->where('key', 'about')->first()->value}}</textarea>
        </div>
        <button type="submit" class="btn btn-info m-t">Submit</button>
      </form>
    </div>
  </div>
</div>
    @endsection