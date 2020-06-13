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

        <div class="col-sm-6">
            <ol class="float-sm-left">
              <div class="btn-group mr-7">
                  <a class="btn btn-secondary btn-outline float-right" href="{{ route('locations.index') }}" role="button">Back</a>
              </div>
            </ol>
          </div>

          <div class="container">
            <main role="main" >
                @if(isset($details))
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Location details</h2>
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
                        @foreach($details as $location)
                        <tr>

                            <td>
                                <a href="{{ route('locations.edit',$location->locationID) }}">{{$location->locationID}}</a>
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
                            <form action="{{ route('locations.destroy',$location->locationID) }}" method="POST">
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
