@extends('layouts.index')
@section('content')
 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row d-flex justify-content-center">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of News</div>
                <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$n}}</div>
                  </div>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-calendar fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Earnings (Monthly) Card Example -->
       <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Number of Deals </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$d}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-chart-area fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Number of Amenities</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{$a}}</div>
              </div>
              <div class="col-auto">
                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    
  </div>

 
  <!-- Content Row -->
  <div class="row">

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
        <div class="card">
          <div class="card-header card-header-warning">
            <h5 class="card-title">Amenities List</h5>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <th>ID</th>
                <th>Title</th>
                <th>Picture</th>
              </thead>
              <tbody>
                @foreach ($amenitys as $amenity)
                <tr>
                  <td>{{$amenity->id}}</td>
                  <td>{{$amenity->title}}</td>
                  <td><img src="{{asset('storage/images/'.$amenity->picture)}}" alt="showcase image" width="30"></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
     


 
  </div>

 </div>

    <!-- Content Column -->
    <div class="col-lg-6 mb-4">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h5 class="card-title">News List</h5>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-primary">
              <th>ID</th>
              <th>Title</th>
              <th>Picture</th>
            </thead>
            <tbody>
              @foreach ($news as $new)
              <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->title}}</td>
                <td><img src="{{asset('storage/images/'.$new->picture)}}" alt="showcase image" width="30"></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
   



</div>

</div>
<!-- /.container-fluid -->

</div>

<!-- End of Main Content -->

@endsection