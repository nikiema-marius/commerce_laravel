@extends('layouts.appadmin')

@section('title')
    Commandes
@endsection
@section('contenu')

      


      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Commandes</h4>
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table id="order-listing" class="table">
                  <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Nom du client</th>
                        <th>Adresse du client</th>
                        <th>Panier</th>
                        <th>paiement id</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td>2012/08/03</td>
                        <td>2012/08/03</td>
                        <td>2012/08/03</td>
                        <td>
                          <label class="badge badge-info">On hold</label>
                        </td>
                        <td>
                          <button class="btn btn-outline-primary">Voir</button>
                        </td>
                    </tr>
                   
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