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

            <div class="col-sm-6">
                <ol class="float-sm-left">
                  <div class="btn-group mr-7">
                      <a class="btn btn-secondary btn-outline float-right" href="{{ route('user.index') }}" role="button">Back</a>
                  </div>
                </ol>
              </div>

              <div class="container">
                <main role="main" >
                    @if(isset($details))
                        <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>User details</h2>
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
                            @foreach($details as $user)
                            <tr>
                                <td>
                                    <a href="{{ route('user.edit',$user->userID) }}">{{$user->userID}}</a>
                                </td>
                                <td>
                                        {{$user->userName}}
                                </td>
                                <td>
                                        {{$user->icNo}}
                                </td>
                                <td>
                                        {{$user->address}}
                                </td>
                                <td>
                                        {{$user->phoneNo}}
                                </td>
                                <td>
                                        {{$user->usertype}}
                                </td>
                                <td>
                                        <small>Added at {{$user->created_at}}</small>
                                </td>
                                <td>
                                    <small>Updated at {{$user->updated_at}}</small>
                                </td>
                                <td>
                                <form action="{{ route('user.destroy',$user->userID) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger float-right" value="Delete"/>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </main>
            </div>
@endsection
