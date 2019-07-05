@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1>{{$user->name}} Profile</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/profile/{{$profile->id}}/update" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="media mt-5">
                @if ($profile->photo != null)
                    <img src="{{ asset('user/img/'.$profile->photo) }}" class="rounded-circle" height="80" alt="">
                @else
                    <img src="{{ asset('user/default-profile.png') }}" aclass="rounded-circle" height="80">
                @endif
                    <div class="media-body">
                        <h4 class="ml-4">{{$user->name}}</h4>
                        <p class="ml-4"><input type="file" name="photo" id="photo" class="@error('photo') is-invalid @enderror"></p>
                    </div>
                    <div class="form-group">
                        @error('photo')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    
            </div>
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Type a first_name" value="{{$profile->first_name}}">
                @error('first_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Type a last_name" value="{{$profile->last_name}}">
                @error('last_name')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Type a phone number" value="{{$profile->phone_number}}">
                @error('phone_number')
                    <div class="alert alert-danger">
                        {{$message}}
                    </div>
                @enderror
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection