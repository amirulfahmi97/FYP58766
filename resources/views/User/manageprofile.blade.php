@extends('User.Layouts.app2')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">User Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="float-sm-right">
            <div class="btn-group mr-7">
                <a class="btn btn-secondary btn-outline float-right" href="{{ route('userdashboard') }}" role="button">Back</a>
            </div>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('error'))
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                        @endif

                        @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                        @endif
<section class="content">
    <div class="container-fluid">
        <div class="row">






            <div class="col-md-7 mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-header p-2">Update Profile</div>
                    <div class="card-body box-profile">
                        <div class="mb-3">
                            <form method="POST" action="{{ route('profile.update',auth()->user()->userID) }}">
                                @method('PUT')
                                    @csrf
                                <div class="form-group ">
                                    <label for="userID" >User ID</label>
                                    <label name="userID" class="form-control">{{auth()->user()->userID}}</label>

                                    @if ($errors->has('userID'))
                                    <span class="error bg-warning">{{$errors->first('userID')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="userName">Name</label>
                                    <input type="text" class="form-control" name="userName" value="{{auth()->user()->userName}}" placeholder=""/>

                                    @if ($errors->has('userName'))
                                    <span class="error bg-warning">{{$errors->first('userName')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="icNo">IC Number</label>
                                    <input type="interger" class="form-control" name="icNo" value="{{auth()->user()->icNo}}" placeholder=""/>

                                    @if ($errors->has('icNo'))
                                    <span class="error bg-warning">{{$errors->first('icNo')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{auth()->user()->address}}" placeholder=""/>

                                    @if ($errors->has('address'))
                                    <span class="error bg-warning">{{$errors->first('address')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phoneNo">Phone Number</label>
                                    <input type="interger" class="form-control" name="phoneNo" value="{{auth()->user()->phoneNo}}" placeholder=""/>

                                    @if ($errors->has('phoneNo'))
                                    <span class="error bg-warning">{{$errors->first('phoneNo')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="usertype">Type</label>
                                    <label name="usertype" class="form-control">{{auth()->user()->usertype}}</label>

                                    @if ($errors->has('usertype'))
                                    <span class="error bg-warning">{{$errors->first('usertype')}}</span>

                                    @endif
                                </div>


                                <button type="submit" class="btn btn-primary ">UPDATE</button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 order-md-2 mb-4">
                    <div class="card">
                        <div class="card-header p-2">Change Password</div>

                        <div class="card-body">
                            <div class="tab-content">
                                <form method="POST" action="{{ route('profile.store') }}">
                                    @csrf

                                    @foreach ($errors->all() as $error)
                                        <p class="text-danger">{{ $error }}</p>
                                    @endforeach

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Password</label>

                                        <div class="col-md-6">
                                            <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">New Confirm Password</label>

                                        <div class="col-md-6">
                                            <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0 ">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Update Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection
