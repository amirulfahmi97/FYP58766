@extends('User.Layouts.app2')

@section('content')

        <!-- Alert Message -->

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

        <!-- The Header-->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Location Information</h1>
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

                    <!-- The input code start-->
                        <form method="POST" action="{{ route('locations.store') }}">
                                <div class="form-group">
                                    @csrf
                                    <label for="locationID">Location ID</label>
                                    <input type="integer" class="form-control" name="locationID" placeholder="1"/>
                                    @if ($errors->has('locationID'))
                                        <span class="error bg-warning">{{$errors->first('locationID')}}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="locationName">Location Name</label>
                                    <input type="text" class="form-control" name="locationName" placeholder="Store room"/>
                                    @if ($errors->has('locationName'))
                                        <span class="error bg-warning">{{$errors->first('locationName')}}</span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                <!-- The input code end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
