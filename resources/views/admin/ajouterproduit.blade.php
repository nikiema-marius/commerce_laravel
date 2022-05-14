@extends('layouts.appadmin')
@section('title')
    Ajouter Produit
@endsection
@section('contenu')


        <div class="row grid-margin">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter Produit </h4>
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
                      {!!Form::open(['action'=>'App\Http\Controllers\ProduitController@sauverproduit','method'=>'POST','class'=>'cmxform','id'=>'commentForm','enctype'=>'multipart/form-data'])!!}
                      {{{ csrf_field() }}} 
                      <div class="form-group">
                                {{Form::label('','Nom du Produit',['for'=>'cname'])}}
                                {{Form::text('product_name','',['class'=>'form-control','id'=>'cname'])}}                     
                      </div>
                      <div class="form-group">
                        {{Form::label('','Prix du Produit',['for'=>'cname'])}}
                        {{Form::number('product_price','',['class'=>'form-control','id'=>'cname'])}}              
                     </div>
                     <div class="form-group">
                        {{Form::label('','Categorie du produit')}}
                        {{Form::select('Product_categorie',$categories ,null,['placeholder'=>'Selectionner une categorie','class'=>'form-control'])}}             
                     </div>
                     <div class="form-group">
                        {{Form::label('','image du Produit',['for'=>'cname'])}}
                        {{Form::file('product_image',['class'=>'form-control','id'=>'cname'])}}            
                     </div>           
                      {{Form::submit('Ajouter',['class'=>'btn btn-primary'])}}
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