@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="col-4">
    <div class="card">
      <div class="card-header">
        <p class="text-center">
          {{$user->name}} 's Profile
        </p>

      </div>
      <div class="card-body">
        <div class="text-center">
          <img src="{{ $user->avatar }}" alt="" width="70px" height="70px" style="border-radius: 50%">
        </div>
        <div class="text-center mt-2">
          {{$user->profile->location}}
        </div>
        <div class="text-center mt-3">
          @if(Auth::id() == $user->id)
          <a href="{{route('profile.edit')}}" class="btn btn-info">Edit your profile</a> @endif
        </div>
      </div>
    </div>
    <div class="card mt-4">
      <div class="card-header">
        <p class="text-center">
          About me
        </p>

      </div>
      <div class="card-body">
        {{$user->profile->about}}
      </div>
    </div>
  </div>
</div>



@stop