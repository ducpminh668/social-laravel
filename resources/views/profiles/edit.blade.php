@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="col-8 offset-2">
    <div class="card">
      <div class="card-header">
        <p class="text-center">
          Edit your profile
        </p>

      </div>
      <div class="card-body">
        <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group row">
            <label for="avatar" class="col-2">Upload avatar</label>
            <input type="file" name="avatar" class="form-control col-9" accept="image/*">
          </div>
          <div class="form-group row">
            <label for="location" class="col-2">location</label>
            <input type="text" name="location" value="{{$info->location}}" class="form-control col-9">
          </div>
          <div class="form-group row">
            <label for="about" class="col-2">About me</label>
            <textarea class="form-control col-9" name="about" id="" cols="30" rows="10">{{$info->about}}</textarea>
          </div>
          <div class="form-group">
            <p class="text-center">
              <button class="btn btn-primary" type="submit">
                Save your information
              </button>
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>




@stop