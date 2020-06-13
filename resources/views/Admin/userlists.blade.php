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

                <div class="content-header">
                    <div class="container-fluid">
                      <div class="row mb-2">
                        <div class="col-sm-6">
                          <h1 class="m-0 text-dark">User List</h1>
                        </div><!-- /.col -->

                      </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                  </div>
        <div class="container">

            <main role="main" >


                <!-- Search function -->
                <form action="/admin/user/search" method="POST" role="search">
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
                        <a class="btn btn-secondary btn-outline" href="{{route('user.create')}}" role="button">Add User<i class="material-icons align-bottom">add_location</i></a>
                    </div>

                </div>

                  <!-- This will be taken out from DB -->
                  <table class="table table-bordered">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">IC Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Type</th>
                        <th scope="col">Created at</th>
                        <th scope="col">Updated at</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                                @if(count($staffs) > 0)
                                @foreach($staffs as $staff)
                                <tr>

                                    <td>
                                        <a href="{{ route('user.edit',$staff->userID) }}">{{$staff->userID}}</a>
                                    </td>
                                    <td>
                                            {{$staff->userName}}
                                    </td>
                                    <td>
                                            {{$staff->icNo}}
                                    </td>
                                    <td>
                                            {{$staff->address}}
                                    </td>
                                    <td>
                                            {{$staff->phoneNo}}
                                    </td>
                                    <td>
                                            {{$staff->usertype}}
                                    </td>
                                    <td>
                                            <small>Added at {{$staff->created_at}}</small>
                                    </td>
                                    <td>
                                        <small>Updated at {{$staff->updated_at}}</small>
                                    </td>
                                    <td>
                                    <form action="{{ route('user.destroy',$staff->userID) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger float-right" value="Delete"/>
                                    </form>
                                    </td>


                                </tr>


                        @endforeach
                    @else
                            <p>no user found</p>
                    @endif
                </tbody>
                  </table>
                  <div class="row justify-content-center"> {{$staffs->links()}} </div>

            </main>
            </div>



 @endsection
