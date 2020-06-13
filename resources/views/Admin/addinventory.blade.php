<!-- This codes is use as templates so there are no need to retype them on each pages codes -->
@extends('Admin.Layouts.app2')

@section('content')

            <!-- Error messages -->
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
                  <h1 class="m-0 text-dark">Item Information</h1>
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
                                        {!! Form::open(['route' => 'inventoriess.store', 'method'=>'POST', 'files'=>'true', 'enctype'=>'multipart/form-data']) !!}


                                        {{ csrf_field() }}



                                                <div class="form-group row">
                                                {{Form::label('serialNo','Serial Number',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                    {{Form::text('serialNo','',['class'=>'form-control','placeholder'=>'123456789','id'=>'serialNo'])}}

                                                </div>
                                                </div>

                                                <div class="form-group row">
                                                    {{Form::label('assetTag','Asset Tag',['class'=>'control-label col-md-3'])}}
                                                    <div class="col-md-9">
                                                    {{Form::text('assetTag','',['class'=>'form-control','placeholder'=>'SN0000','id'=>'assetTag'])}}

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    {{Form::label('itemName','Item Name',['class'=>'control-label col-md-3'])}}
                                                    <div class="col-md-9">
                                                    {{Form::text('itemName','',['class'=>'form-control','placeholder'=>'','id'=>'itemName'])}}

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    {{Form::label('brand','Brand',['class'=>'control-label col-md-3'])}}
                                                    <div class="col-md-9">
                                                    {{Form::text('brand','',['class'=>'form-control','placeholder'=>'','id'=>'brand'])}}

                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    {{Form::label('type','Type',['class'=>'control-label col-md-3'])}}
                                                    <div class="col-md-9">
                                                    {{Form::text('type','',['class'=>'form-control','placeholder'=>'','id'=>'type'])}}

                                                    </div>
                                                </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5 order-md-2 mb-4">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="mb-3">

                                            <div class="form-group row">
                                                {{Form::label('dateMoveIn','Date Move In',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                {{Form::date('dateMoveIn','',['class'=>'form-control','placeholder'=>'','id'=>'dateMoveIn'])}}

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                {{Form::label('dateMoveOut','Date Move Out',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                {{Form::date('dateMoveOut','',['class'=>'form-control','placeholder'=>'','id'=>'dateMoveOut'])}}

                                                </div>
                                            </div>



                                            <div class="form-group row">
                                                <label class="control-label col-md-3">Location</label>
                                                <select class="col-md-9" name = "locName">
                                                    <option value="0">Please Select Location</option>
                                                    @foreach($locations as $location)
                                                        <option value="{{$location->locationName}}">[{{$location->locationID}}] {{$location->locationName}}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('locName'))
                                                <span class="error bg-warning">{{$errors->first('locName')}}</span>

                                                @endif
                                            </div>

                                            <div class="form-group row">
                                                {{Form::label('place','Place',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                {{Form::textarea('place','',['class'=>'form-control','rows'=>'3','placeholder'=>'','id'=>'place'])}}

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                {{Form::label('status','Status',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                {{Form::text('status','',['class'=>'form-control','placeholder'=>'','id'=>'status'])}}

                                                </div>
                                            </div>

                                            <div class="form-group row" {{ $errors->has('image') ? 'has-error' : '' }}>

                                                {{Form::label('image','Item Photo',['class'=>'control-label col-md-3'])}}
                                                <div class="col-md-9">
                                                {{Form::file('image',null)}}

                                                <p class="label">Small size photo only</p>
                                                </div>
                                            </div>


                                            <div class="align-bottom">
                                                {{Form::submit('Save',['class'=>'btn btn-primary upload-image'])}}
                                                <input type="reset" value="Reset" class="btn btn-primary float-right" name="reset" />
                                            </div>
                        </div>
                    </div>
                </div>
            </div>





                                    {!! Form::close() !!}
                                            <!-- The input code end-->
        </div>
    </div>
</section>




@endsection
