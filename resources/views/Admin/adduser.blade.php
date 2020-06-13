<!-- This codes is use as templates so there are no need to retype them on each pages codes -->
@extends('Admin.Layouts.app2')

@section('content')

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
        <!-- ./col -->
        <!-- The Header-->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">New User Information</h1>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">






                        <div class="card-body">
                            <form method="POST" action="{{ route('user.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="userID" class="col-md-4 col-form-label text-md-right">{{ __('User ID') }}</label>

                                    <div class="col-md-6">
                                        <input id="userID" type="text" class="form-control @error('userID') is-invalid @enderror" name="userID" value="{{ old('userID') }}" required autocomplete="userID" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="userName" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror" name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>

                                        @error('userName')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="icNo" class="col-md-4 col-form-label text-md-right">{{ __('IC Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="icNo" type="int" class="form-control @error('icNo') is-invalid @enderror" name="icNo" value="{{ old('icNo') }}" required autocomplete="icNo" autofocus>

                                        @error('icNo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phoneNo" class="col-md-4 col-form-label text-md-right">{{ __('Phone No') }}</label>

                                    <div class="col-md-6">
                                        <input id="phoneNo" type="int" class="form-control @error('phoneNo') is-invalid @enderror" name="phoneNo" value="{{ old('phoneNo') }}" required autocomplete="phoneNo" autofocus>

                                        @error('phoneNo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="usertype" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                                    <select class="col-md-6" name = "usertype">
                                        <option value="0" >Please Select User Type</option>

                                            <option value="Admin">Admin</option>
                                            <option value="Engineer">Engineer</option>
                                            <option value="Staff">Staff</option>

                                    </select>
                                    @if ($errors->has('usertype'))
                                    <span class="error bg-warning">{{$errors->first('usertype')}}</span>

                                    @endif
                                </div>


                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add User') }}
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
