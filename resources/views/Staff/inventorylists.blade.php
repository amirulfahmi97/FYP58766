<!-- This codes is use as templates so there are no need to retype them on each pages codes -->
@extends('Staff.layouts.app2')

@section('content')

        <div class="container">

            <main role="main" >

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

                <!-- Search function -->
                <form action="/staff/inventory/search" method="POST" role="search">
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
                        <button type="button" class="btn btn-primary btn-outline float-right">Export<i class="material-icons align-bottom">file_download</i></button>
                    </div>
                </div>

                  <!-- This will be taken out from DB -->
                  <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Serial Number</th>
                        <th scope="col">Asset Tag</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date Move In</th>
                        <th scope="col">Date Move Out</th>
                        <th scope="col">Location Name</th>
                        <th scope="col">Place</th>
                        <th scope="col">Status</th>
                        <th scope="col">Item Photo</th>
                      </tr>
                    </thead>
                    <tbody>



                  @if(count($inventories) > 0)
                        @foreach($inventories as $inventory)
                        <tr>

                            <td>
                                {{$inventory->serialNo}}
                            </td>
                            <td>
                                {{$inventory->assetTag}}
                            </td>
                            <td>
                                {{$inventory->itemName}}
                            </td>
                            <td>
                                {{$inventory->brand}}
                            </td>
                            <td>
                                {{$inventory->type}}
                            </td>
                            <td>
                                {{$inventory->dateMoveIn}}
                            </td>
                            <td>
                                {{$inventory->dateMoveOut}}
                            </td>
                            <td>
                                {{$inventory->locName}}
                            </td>
                            <td>
                                {{$inventory->place}}
                            </td>
                            <td>
                                {{$inventory->status}}
                            </td>
                            <td>
                                <img src="{{ asset('./storage/image/' . $inventory->image) }}" />
                            </td>


                          </tr>

                        @endforeach
                    @else
                            <p>no locations found</p>
                    @endif
                </tbody>
                  </table>
                  <div class="row justify-content-center"> {{$inventories->links()}} </div>

            </main>
            </div>


@endsection
