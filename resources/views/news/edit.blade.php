@extends('layouts.index')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">{{$news->id}}</h4> </div>
        </div> 
        
    </div>
    <div>
            {!!  Form::open(['action' => ['NewsController@update',$news->id],'method'=>'PUT']) !!}
            <div class="box-body">
                

                        <div class="form-group">
                              {!! Form::label('title', 'Titre :')!!}
                              {!! Form::text('title', $news->title, ['class' => 'form-control','placeholder'=>"Saisir le titre de new"]);!!}
                        </div>
                            <div class="form-group">
                                    {!! Form::label('description', 'Description :')!!}
                                    {!! Form::textarea('description',$news->description, ['class' => 'form-control','placeholder'=>"Saisir la discription de new"]);!!}
                              </div>
                            <div class="form-group">
                                {!! Form::label('picture', 'Photo')!!}
                                {!! Form::file('picture', ['class' => 'form-control']);!!}
                               
                            </div>                      
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                              {!! Form::submit('Enregistre', ['class' => 'btn btn-primary'])!!}
                              
                          </div>
                          {!! Form::close() !!}
</div>

@endsection