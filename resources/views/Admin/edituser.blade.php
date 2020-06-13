@extends('Admin.Layouts.app2')

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
                <a class="btn btn-secondary btn-outline float-right" href="{{ route('user.index') }}" role="button">Back</a>
            </div>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

                <!-- Error messages -->
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
                            <form method="POST" action="{{ route('user.update',$users->userID) }}" >
                                @method('PUT')
                                    @csrf
                                <div class="form-group ">
                                    <label for="userID" >User ID</label>
                                    <label name="userID" class="form-control">{{$users->userID}}</label>

                                    @if ($errors->has('userID'))
                                    <span class="error bg-warning">{{$errors->first('userID')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="userName">Name</label>
                                    <input type="text" class="form-control" name="userName" value="{{$users->userName}}" placeholder=""/>

                                    @if ($errors->has('userName'))
                                    <span class="error bg-warning">{{$errors->first('userName')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="icNo">IC Number</label>
                                    <input type="interger" class="form-control" name="icNo" value="{{$users->icNo}}" placeholder=""/>

                                    @if ($errors->has('icNo'))
                                    <span class="error bg-warning">{{$errors->first('icNo')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" value="{{$users->address}}" placeholder=""/>

                                    @if ($errors->has('address'))
                                    <span class="error bg-warning">{{$errors->first('address')}}</span>

                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="phoneNo">Phone Number</label>
                                    <input type="interger" class="form-control" name="phoneNo" value="{{$users->phoneNo}}" placeholder=""/>

                                    @if ($errors->has('phoneNo'))
                                    <span class="error bg-warning">{{$errors->first('phoneNo')}}</span>

                                    @endif
                                </div>





                                <button type="submit" class="btn btn-primary ">UPDATE</button>



                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 order-md-2 mb-4">
                <div class="card">
                    <div class="card-header p-2">Change User Type</div>

                    <div class="card-body">
                        <div class="tab-content">
                            <div class="form-group row">
                                <label for="usertype" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                <select class="col-md-6" name = "usertype">
                                    <option value="0" >{{$users->usertype}}</option>

                                        <option value="Admin">Admin</option>
                                        <option value="Engineer">Engineer</option>
                                        <option value="Staff">Staff</option>

                                </select>
                                @if ($errors->has('usertype'))
                                <span class="error bg-warning">{{$errors->first('usertype')}}</span>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        </div>
    </div>
</section>
@endsection
