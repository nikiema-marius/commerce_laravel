@extends('layouts.appadmin')
@section('title')
    Modifier Slider
@endsection
@section('contenu')


        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Modifier Slider </h4>
                  @if (Session::has('status'))
                        <div class="alert alert-success">
                          {{Session::get('status')}}
                        </div>      
                    @endif

                    @if (count($errors)>0)
                    {{--affichage de l'erreur required qui se trouve dans le categorycontroller--}}
                    <div class="alert alert-danger">
                      <ul>                        
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                      </ul>
                    </div>
                        
                    @endif
                      {!!Form::open(['action'=>'App\Http\Controllers\SliderController@modifierslider','method'=>'POST','class'=>'cmxform','id'=>'commentForm','enctype'=>'multipart/form-data'])!!}
                      {{{ csrf_field() }}} 
                            <div class="form-group">
                                {{Form::hidden('id',$slider->id)}}
                                {{Form::label('','Première description',['for'=>'cname'])}}
                                {{Form::text('description1',$slider->description1,['class'=>'form-control','id'=>'cname'])}}
                    
                                </div>


                                <div class="form-group">
                                    {{Form::label('','deuxième description',['for'=>'cname'])}}
                                    {{Form::text('description2',$slider->description2,['class'=>'form-control','id'=>'cname'])}}
                        
                                </div>

                                <div class="form-group">
                                    {{Form::label('','image',['for'=>'cname'])}}
                                    {{Form::file('slider_image',['class'=>'form-control','id'=>'cname'])}}
                        
                                </div>
           
                        {{Form::submit('Modifier',['class'=>'btn btn-primary'])}}
                        {!!Form::close()!!}
                  </form>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')

  {{--<script src="backend/js/form-validation.js"></script>
  <script src="backend/js/bt-maxLength.js"></script>--}}
    
@endsection