<!-- This codes is use as templates so there are no need to retype them on each pages codes -->
@extends('Staff.layouts.app2')

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
              <a class="btn btn-secondary btn-outline float-right" href="{{ route('inventory.index') }}" role="button">Back</a>
          </div>
        </ol>
      </div>
    <div class="container">
        <main role="main" >
            @if(isset($details))
                <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <h2>Item details</h2>
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
                    @foreach($details as $inventory)
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
                </tbody>
            </table>
            @endif
        </main>
    </div>
@endsection
