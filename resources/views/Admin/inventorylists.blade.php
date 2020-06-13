
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
                <form action="/admin/inventoriess/search" method="POST" role="search">
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
                        <a class="btn btn-secondary btn-outline" href="{{ route('inventoriess.create') }}" role="button">Add Item<i class="material-icons align-bottom">create_new_folder</i></a>
                    </div>
                    <form action="{{ route('inventoriess.export') }}">
                        <div class="btn-group mr-7">
                            <button type="submit"  class="btn btn-primary btn-outline float-right">Export<i class="material-icons align-bottom">file_download</i></button>
                        </div>
                    </form>
                </div>

                  <!-- This will be taken out from DB -->
                  <table class="table table-bordered">
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
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>



                  @if(count($inventories) > 0)
                        @foreach($inventories as $inventory)
                        <tr>

                            <td>
                                <a href="{{ route('inventoriess.edit',$inventory->serialNo) }}">{{$inventory->serialNo}}</a>
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
                            <td>
                            <form action="{{ route('inventoriess.destroy',$inventory->serialNo) }}" method="POST">
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
                  <div class="row justify-content-center"> {{$inventories->links()}} </div>

            </main>
            </div>


@endsection
