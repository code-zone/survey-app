@extends('layouts.master')
	@section('content')
<?php


function color_pane()
{
    $colors = [
               'pink',
               'teal',
               'indigo',
               'purple',
               'cyan',
               'green',
               'blue',
               'light-blue',
               'amber',
               'lime',
               'grey',
               'brown',
               'red',
               'deep-orange',
              ];

    return $colors[array_rand($colors, 1)];
}//end color_pane()

?>            <div class="row">
                <div class="col-sm-12">
                  <a href="{{ route('users.create') }}" class="btn btn-primary pull-right"><i class="mdi-content-create"></i> &nbsp; Add User</a>
                  <br><br>
                </div>

              </div>
        <div class="card">
            <div class="card-heading">
                <span class="card-title"> Users </span>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
                <div class="alert alert-success">
                    <p>
                      {{session()->pull('message')}}
                    </p>
              </div>
              @endif
                <div class="md-list md-whiteframe-z0 bg-white m-b">
                @foreach($users as $user)
                <?php
                    $str = str_split($user->name);
                    ?>
                <div class="md-list-item">
                      <div class="md-list-item-left circle {{color_pane()}}">
                        <span class="font-thin text-lg">{{$str[0]}}</span>
                      </div>
                      <div class="md-list-item-content">
                        <h3 class="text-md">{{$user->name}}</h3>
                        <small class="font-thin">{{$user->email}}</small>
                        <div class="pull-right">
                        <button data-toggle="dropdown" md-ink-ripple class="md-btn waves-effect dropdown-toggle">
                            <i class="fa fa-ellipsis-v fa-lg"></i>
                        </button>
                        <ul class="dropdown-menu">
                          <li>
                                  <a href="{{ route('users.show', $user->id) }}"><i class="mdi-content-add"></i> 
                                      &nbsp; View</a>
                             </li>
                             <li>
                                  <a href="{{ route('users.edit', $user->id) }}"><i class="mdi-content-create"></i> 
                                      &nbsp; Edit</a>
                             </li>
                            <li>
                              <a href="" onclick="
                              event.preventDefault();
                              if(confirm('Are you sure want to remove this user')){
                                $('#delete-{{$user->id}}').submit();
                              }
                               "><i class="mdi-content-remove" ></i> 
                                &nbsp; Delete</a>
                          </li>
                          <form id="delete-{{$user->id}}" action="{{route('users.destroy', $user->id) }}" method="post">
                            {{method_field('delete')}}
                             {{csrf_field()}}
                          </form>
                          @if($user->status)
                             <li>
                                  <a href="{{ route('users.block', $user->id) }}"><i class="icon mdi-content-block"></i> 
                                      &nbsp; Block</a>
                             </li>
                          @else
                          <li>
                              <a href="{{ route('users.unblock', $user->id) }}"><i class="icon mdi-content-reply"></i> 
                                &nbsp; Un-Block</a>
                          </li>
                          @endif
                        </ul>
                       </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
        </div>
    @endsection