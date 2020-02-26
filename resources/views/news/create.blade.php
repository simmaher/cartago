@extends('layouts.index')
@section('content')
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Ajouter Des News </h3>
    </div>
    <!-- /.box-header -->
    {!! Form::open(['action' => 'NewsController@store','enctype'=>'multipart/form-data']) !!}
    <div class="box-body">
        
        <div class="form-group">
        {!! Form::label('title', 'Title')!!}
        {!! Form::text('title','', ['class' => 'form-control','placeholder'=>"Saisir le title"]);!!}
       
        </div>
        <div class="form-group">
            {!! Form::label('description', 'Description')!!}
            {!! Form::textarea('description','', ['class' => 'form-control','placeholder'=>"Saisir une description "]);!!}
           
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