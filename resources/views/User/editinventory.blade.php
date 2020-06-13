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
                  <h1 class="m-0 text-dark">Edit Item Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="float-sm-right">
                    <div class="btn-group mr-7">
                        <a class="btn btn-secondary btn-outline float-right" href="{{ route('inventories.index') }}" role="button">Back</a>
                    </div>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>


<section class="content">
    <div class="container-fluid">
        <div class="row">



            <div class="col-md-7 mb-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="mb-3">
                            <!-- The input code start-->
                                <form method="POST" action="{{ route('inventories.update',$inventories->serialNo) }}" enctype="multipart/form-data">
                                        @method('PUT')
                                            @csrf
                                            <div class="form-group">
                                                @csrf
                                                <label for="serialNo">Serial Number</label>
                                                <input type="integer" class="form-control" name="serialNo" value="{{$inventories->serialNo}}" placeholder=""/>

                                            @if ($errors->has('serialNo'))
                                                <span class="error bg-warning">{{$errors->first('serialNo')}}</span>

                                            @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="assetTag">Asset Tag</label>
                                                <input type="text" class="form-control" name="assetTag" value="{{$inventories->assetTag}}" placeholder=""/>
                                            </div>

                                            <div class="form-group">
                                                <label for="itemName">Item Name</label>
                                                <input type="text" class="form-control" name="itemName" value="{{$inventories->itemName}}" placeholder=""/>
                                            </div>

                                            <div class="form-group">
                                                <label for="brand">Brand</label>
                                                <input type="text" class="form-control" name="brand" value="{{$inventories->brand}}" placeholder=""/>
                                            </div>

                                            <div class="form-group">
                                                <label for="type">Type</label>
                                                <input type="text" class="form-control" name="type" value="{{$inventories->type}}" placeholder=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5 order-md-2 mb-4">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="mb-3">

                                                <div class="form-group">
                                                    <label for="dateMoveIn">Date Move In</label>
                                                    <input type="date" class="form-control" name="dateMoveIn" value="{{$inventories->dateMoveIn}}" placeholder=""/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dateMoveOut">Date Move Out</label>
                                                    <input type="date" class="form-control" name="dateMoveOut" value="{{$inventories->dateMoveOut}}" placeholder=""/>
                                                </div>

                                                <div class="form-group">
                                                <label>Location</label>
                                                <select class="form-control" name = "locName">
                                                    <option value="{{$inventories->locName}}">{{$inventories->locName}}</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->locationID}}">[{{$location->locationID}}] {{$location->locationName}}</option>
                                                    @endforeach
                                                </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="place">Place</label>
                                                    <textarea rows="3" class="form-control" name="place">{{$inventories->place}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label for="status">Status</label>
                                                    <input type="text" class="form-control" name="status" value="{{$inventories->status}}" placeholder=""/>
                                                </div>

                                                <div class="form-group">
                                                    <label for="image">Item Photo</label>
                                                    <img src="{{ asset('./storage/image/' . $inventories->image) }}" />
                                                    <input type="file" name="image" class="form-control" value="{{$inventories->image}}"/>

                                                </div>



                                                <button type="submit" class="btn btn-primary">Save</button>

                                                <input type="reset" value="Reset" class="btn btn-primary float-right" name="reset" />
                                            </form>

                                    </form>
            <!-- The input code end-->
                                </div>
                            </div>
                        </div>
                    </div>




        </div>
    </div>
</section>


@endsection
