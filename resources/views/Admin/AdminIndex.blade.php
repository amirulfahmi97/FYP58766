@extends('Admin.layouts.app')

@section('content')
<!--Left navigation bar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/SNETLogo.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">Sabah Net</span>

      </a>
      <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                                <li class="nav-item">
                                <a class="nav-link" href="{{route('inventoriess.index')}}">
                                    <i class="material-icons align-bottom">folder</i>
                                    Inventory List
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('locationss.index')}}">
                                    <i class="material-icons align-bottom">location_on</i>
                                    Location Lists
                                </a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="{{route('user.index')}}">
                                    <i class="material-icons align-bottom">group</i>
                                    User List
                                </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('locationss.create')}}">
                                        <i class="material-icons align-bottom">add_location</i>
                                    Add Location
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('inventoriess.create')}}">
                                        <i class="material-icons align-bottom">create_new_folder</i>
                                    Add Item
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('user.create')}}">
                                        <i class="material-icons align-bottom">person_add</i>
                                    Add User
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admineventlog">
                                        <i class="material-icons align-bottom">event_note</i>
                                    Event Log
                                    </a>
                                </li>

                </ul>
            </nav>
        </div>


        </nav>
      </div>
</aside>

<!-- The dashboard on the right -->
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <main role="main" >
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <div class="card-small card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        You are logged in as admin!
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <!-- shows the amount of rows of data in the inventories table -->
                                @if($inventoriesCount > 0)
                                <h3>{{$inventoriesCount}}</h3>
                                @else
                                    <p>no locations found</p>
                                @endif

                                <p>Total Numbers of Items</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <!-- shows the amount of rows of data in the locations table -->
                            @if($locationCount > 0)
                                    <h3>{{$locationCount}}</h3>
                            @else
                                <p>no locations found</p>
                            @endif

                        <p>Total Numbers of Location</p>
                        </div>
                        <div class="icon">
                        <i class="ion icon ion-map"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="card card-danger">
                    <div class="card-header">
                    <h3 class="card-title">Pie Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                    </div>
                    </div>
                    <div class="card-body">
                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
            </main>
        </div>
    </section>
</div>



@endsection
