@extends('layouts.appadmin')

@section('title')
    Categories
@endsection
@section('contenu')


{{Form::hidden('',$increment=1)}}
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Categories</h4>
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
                        <th>Nom de la Categories</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $category)
                          <tr>
                              <td>{{$increment}}</td>
                              <td>{{$category->nom_categorie}}</td>
                              <td>
                                <button class="btn btn-outline-primary" onclick="window.location = '{{url('/modifier_categorie/'.$category->id)}}'">modifier</button>
                                <button class="btn btn-outline-danger"><a href=" {{url('/supprimercategorie/'.$category->id)}}" id="delete">Supprimer</a> </button>
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
   {{-- <script src="backend/js/data-table.js"></script>--}}
@endsection