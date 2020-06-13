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
        <div class="container">

            <main role="main" >


                <!-- Search function -->
                <form action="/admin/locationss/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group form-inline mb-3">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search lists"> <span class="input-group-btn">

                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </span>
                    </div>
                </form>
                <!-- ./Search function end -->

                <div class="btn-toolbar justify-content-between mb-3" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group mr-7">
                        <a class="btn btn-secondary btn-outline" href="{{ route('locationss.create') }}" role="button">Add Location<i class="material-icons align-bottom">add_location</i></a>
                    </div>
                    <form action="{{ route('locationss.export') }}">
                        <div class="btn-group mr-7">
                            <button type="submit"  class="btn btn-primary btn-outline float-right">Export<i class="material-icons align-bottom">file_download</i></button>
                        </div>
                    </form>
                </div>

                  <!-- This will be taken out from DB -->
                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Location ID</th>
                        <th scope="col">Location Name</th>
                        <th scope="col">Added at</th>
                        <th scope="col">Updated at</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                                @if(count($locations) > 0)
                                @foreach($locations as $location)
                                <tr>

                                    <td>
                                        <a href="{{ route('locationss.edit',$location->locationID) }}">{{$location->locationID}}</a>
                                    </td>
                                    <td>
                                            {{$location->locationName}}
                                    </td>
                                    <td>
                                            <small>Added at {{$location->created_at}}</small>
                                    </td>
                                    <td>
                                        <small>Updated at {{$location->updated_at}}</small>
                                    </td>
                                    <td>
                                    <form action="{{ route('locationss.destroy',$location->locationID) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger float-right" value="Delete"/>
                                    </form>
                                    </td>


                                </tr>


                        @endforeach
                    @else
                            <p>no locations found</p>
                    @endif
                </tbody>
                  </table>
                  <div class="row justify-content-center"> {{$locations->links()}} </div>

            </main>
            </div>



 @endsection
