@extends('layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">LES Deals</h4> </div>
            
            <!-- /.col-lg-12 -->
        </div> 
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <a href="{{asset('deals/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i></a> 
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID DEALS</th>
                                    <th>TITLE</th>
                                    <th>DESCRIPTION</th>
                                    <th>PICTURE</th>
                                    <th>ACTION</th>     
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($deals as $deal)
                                <tr>
                                   
                                    <td>{{$deal->id}}</td>
                                    <td>{{$deal->title}}</td>
                                    <td>{{$deal->description}}</td>
                                    <td><img src="{{asset('storage/images/'.$deal->picture)}}" alt="showcase image" height="50" width="80"></td>
                                    
                                   
                                    <td>
                                            <a href="/deals/{{$deal->id}}/edit"class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                            <td> {!! Form::open(['action' => ['DealsController@destroy', $deal->id],'method'=>'DELETE']) !!}
                                              {!! Form::submit('-', ['class' => 'btn btn-danger']) !!}
                                              {!! Form::close() !!}
                                           </td>
                                         
                                        
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table> 
                    </div>
                </div>
            </div>
        </div>
       
    </div>
   
</div>
@endsection