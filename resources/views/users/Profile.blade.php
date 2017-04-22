@extends('layouts.master')
    @section('content')
        <div class="row row-sm">
  <div class="col-sm-4">
    <div class="panel panel-card">
      <div class="r-t pos-rlt col-sm-12" md-ink-ripple style="background:url({{asset('images/a0.jpg')}}) center center; background-size:cover">
        <div class="p-lg bg-white-overlay text-center r-t">
          <a href class="w-xs inline">
            <img src="{{asset('images/avatar1.jpg')}}" class="img-circle img-responsive">
          </a>
          <div class="m-b m-t-sm h3">
            <span class="">{{$user->name}}</span>
          </div>
        </div>
      </div>
      <div class="list-group no-radius no-border">
        @foreach(App\Entities\Project::all() as $survey)
            <a class="list-group-item">
          <span class="pull-right badge">{{number_format($survey->ratting($user->id))}}</span> {{$survey->project_name}}
        </a>
        @endforeach
      </div>
      <div class="p">
        <p>About</p>
        <p>Lorem ipsum dolor sit amet, consecteter adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. </p>
        <div class="m-v">
          <a class="text-muted">
            <i class="fa ui-icon fa-facebook"></i>
          </a>
          <a class="text-muted">
            <i class="fa ui-icon fa-twitter"></i>
          </a>
          <a class="text-muted">
            <i class="fa ui-icon fa-linkedin"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="panel panel-card">
    @if(auth()->user()->self($user))
      <form>
        <textarea class="form-control no-border" rows="3" placeholder="Write something about you...">{{$user->about}}</textarea>
      <div class="lt p">
        <button class="btn btn-info pull-right btn-sm p-h font-bold">SAVE</button>
        <ul class="nav nav-pills nav-sm">
          <li><a md-ink-ripple class="rounded img-responsive"><i class="fa fa-camera"></i></a></li>
          <li><a md-ink-ripple class="rounded img-responsive"><i class="fa fa-video-camera"></i></a></li>
        </ul>
      </div>
    </form>
    @endif
    </div>
    <div class="panel panel-card clearfix">
      <div class="p-h b-b b-light">
        <ul class="nav nav-lines nav-md b-info">
          <li class="active"><a href>Stream</a></li>
          <li><a href>Photos <span class="badge">3</span></a></li>
          <li><a href>Posts <span class="badge">9</span></a></li>
        </ul>
      </div>
      <div class="p-h-lg m-b-lg">      
        <div class="streamline b-l p-v m-l-xs">
        @forelse ($user->log()->orderBy('created_at', 'DESC')->take(10)->get() as $log)
             <div>
            <a class="pull-left w-32 m-l-n m-t-xs m-r">
              <img src="{{asset('images/avatar1.jpg')}}" class="img-responsive rounded" alt="...">
            </a>
            <div class="clear">
              <div class="m-b-xs">
                {{$log->title}}
                <span class="text-muted block text-xs">
                  {{$log->created_at->diffForHumans()}}
                </span>
              </div>
              <div class="m-b">
                <div>{{ $log->details }}</div>
                <div class="m-t-sm">
                  <a href class="text-muted m-xs">{{$log->ip}}</a>
                  <a href class="text-muted m-xs">{{$log->user_agent}}</a>
                </div>
              </div>
            </div>
          </div>
        @empty
            
        @endforelse
        </div>
      </div>
    </div>
  </div>
</div>
<a md-ink-ripple class="md-btn md-fab md-fab-bottom-right pos-fix green"><i class="mdi-editor-mode-edit i-24"></i></a>

    @endsection