@extends('User.Layouts.app2')

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

        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0 text-dark">Edit Location Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="float-sm-right">
                    <div class="btn-group mr-7">
                        <a class="btn btn-secondary btn-outline float-right" href="{{ route('locations.index') }}" role="button">Back</a>
                    </div>
                  </ol>
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
                            <form method="POST" action="{{ route('locations.update',$location->locationID) }}">
                                    @method('PUT')
                                        @csrf
                                    <div class="form-group">




                                        <label for="locationID">Location ID</label>
                                        <input type="integer" class="form-control" name="locationID" value="{{$location->locationID}}" placeholder=""/>

                                        @if ($errors->has('serialNo'))
                                        <span class="error bg-warning">{{$errors->first('serialNo')}}</span>

                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="locationName">Location Name</label>
                                        <input type="text" class="form-control" name="locationName" value="{{$location->locationName}}" placeholder=""/>
                                    </div>

                                    <button type="submit" class="btn btn-primary ">UPDATE</button>
                                    <div class="btn-group mr-7">

                                    </div>

                            </form>
                        <!-- The input code end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
