@extends('layouts.index')
@section('content')
<div class="box">
    <!-- /.box-header -->
    {!! Form::open(['action' => 'AmenityController@store','enctype'=>'multipart/form-data']) !!}
    <div class="box-body">
        
        <div class="form-group">
        {!! Form::label('title', 'Title')!!}
        {!! Form::text('title','', ['class' => 'form-control','placeholder'=>"Saisir le title"]);!!}
       
        </div>     
            <div class="form-group">  
              {!! Form::label('picture', 'Photo') !!}  
              {!! Form::file('picture', ['class' => 'form-control']) !!}
            </div>
            
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
                {!! Form::submit('Enregistre', ['class' => 'btn btn-primary'])!!}
                
            </div>
            {!! Form::close() !!}
  </div>
  <!-- /.box -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->
  @endsection