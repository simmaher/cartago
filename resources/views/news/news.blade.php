@extends('layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">LES news</h4> </div>
            
            <!-- /.col-lg-12 -->
        </div> 
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <a href="{{asset('news/create')}}"class="btn btn-primary"><i class="fa fa-plus"></i></a> 
                    <div class="table-responsive">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>ID news</th>
                                    <th>TITLE</th>
                                    <th>DESCRIPTION</th>
                                    <th>PICTURE</th>
                                    <th>ACTION</th>     
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($news as $new)
                                <tr>
                                   
                                    <td>{{$new->id}}</td>
                                    <td>{{$new->title}}</td>
                                    <td>{{$new->description}}</td>
                                    <td><img src="{{asset('storage/images/'.$new->picture)}}" alt="showcase image" height="50" width="80"></td>
                                    
                                   
                                    <td>
                                            <a href="/news/{{$new->id}}/edit"class="btn btn-success"><i class="fa fa-edit"></i></a></td>
                                            <td> {!! Form::open(['action' => ['NewsController@destroy', $new->id],'method'=>'DELETE']) !!}
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