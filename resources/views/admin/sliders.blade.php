@extends('layouts.appadmin')

@section('title')
    Sliders
@endsection
@section('contenu')

{{Form::hidden('',$increment=1)}}
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Sliders</h4>
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
                        <th>Première Description</th>
                        <th>Deuxième Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($slider as $sliders)
                    <tr>
                      <td>{{$increment}}</td>
                      <td><img src="storage/slider_images/{{$sliders->slider_image}} " alt=""></td>
                      <td>{{$sliders->description1}}</td>
                      <td>{{$sliders->description2}}</td>
                      <td>
                    
                            @if ($sliders->status  == 1)
                                 <label class="badge badge-success">activé</label>   
                            @else
                                <label class="badge badge-danger">deactivé</label>                                      
                            @endif 
                      </td>
                      <td>
                        <button class="btn btn-outline-primary" onclick="window.location = '{{url('/modifier_slider/'.$sliders->id)}}'">Modifier</button>
                        <button class="btn btn-outline-danger"><a href=" {{url('/supprimerslider/'.$sliders->id)}}" id="delete">Supprimer</a> </button>
                      
                        @if ($sliders->status== 1) 
                        <button class="btn btn-outline-warning" onclick="window.location = '{{url('/desactiver_slider/'.$sliders->id)}}'">desactiver</button>  
                        @else
                        <button class="btn btn-outline-success" onclick="window.location = '{{url('/activer_slider/'.$sliders->id)}}'">activer</button>  
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