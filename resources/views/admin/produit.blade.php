@extends('layouts.appadmin')

@section('title')
    Produits
@endsection
@section('contenu')
    
{{Form::hidden('',$increment=1)}}

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Produits</h4>
          @if (Session::has('status'))
              <div class="alert alert-success">
                {{Session::get('status')}}
                
              </div>      
         @endif
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Image</th>
                        <th>Nom du Produit</th>
                        <th>Categorie su Produit</th>
                        <th>Prix</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produits as $produit)
                          <tr>
                            <td>{{$increment}}</td>
                            <td><img src="storage/produit_images/{{$produit->produit_image}} " alt=""></td>
                            <td>{{$produit->nom_produit}}</td>
                            <td>{{$produit->categorie_produit}}</td>
                            <td>{{$produit->prix_produit}} FCFA</td>
                            <td>
                          
                                  @if ($produit->status  == 1)
                                       <label class="badge badge-success">activé</label>   
                                  @else
                                      <label class="badge badge-danger">deactivé</label>                                      
                                  @endif 
                            </td>
                            <td>
                              <button class="btn btn-outline-primary" onclick="window.location = '{{url('/modifier_produit/'.$produit->id)}}'">Modifier</button>
                              <button class="btn btn-outline-danger"><a href=" {{url('/supprimerproduit/'.$produit->id)}}" id="delete">Supprimer</a> </button>
                            
                              @if ($produit->status== 1) 
                              <button class="btn btn-outline-warning" onclick="window.location = '{{url('/desactiver_produit/'.$produit->id)}}'">desactiver</button>  
                              @else
                              <button class="btn btn-outline-success" onclick="window.location = '{{url('/activer_produit/'.$produit->id)}}'">activer</button>  
                              @endif
                            </td>
                        </tr>
                        {{Form::hidden('',$increment=$increment+1)}}
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>




@endsection
@section('scripts')
    {{--<script src="backend/js/data-table.js"></script>--}}
@endsection