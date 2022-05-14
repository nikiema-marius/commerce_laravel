@extends('layouts.app1')
{{--start contenu--}}

@section('contenu')
	

<div class="hero-wrap hero-bread" style="background-image: url('storage/produit_images/v5.jpg');">
	<div class="container">
	  <div class="row no-gutters slider-text align-items-center justify-content-center">
		<div class="col-md-9 ftco-animate text-center">
			<p class="breadcrumbs"><span class="mr-2"><a href="{{URL::to('/')}}">Home</a></span> <span>Cart</span></p>
		  <h1 class="mb-0 bread">My Cart</h1>
		</div>
	  </div>
	</div>
  </div>

  <section class="ftco-section ftco-cart">
		  <div class="container">
			  <div class="row">
			  <div class="col-md-12 ftco-animate">
				  <div class="cart-list">
					  <table class="table">
						  <thead class="thead-primary">
							<tr class="text-center">
							  <th>&nbsp;</th>
							  <th>&nbsp;</th>
							  <th>Product name</th>
							  <th>Price</th>
							  <th>Quantity</th>
							  <th>Total</th>
							</tr>
						  </thead>
						  <tbody>
							

							
						  </tbody>
						</table>
					</div>
			  </div>
		  </div>
		  <div class="row justify-content-end">
			  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				  <div class="cart-total mb-3">
					  <h3>Coupon Code</h3>
					  <p>Enter your coupon code if you have one</p>
						<form action="#" class="info">
				<div class="form-group">
					<label for="">Coupon code</label>
				  <input type="text" class="form-control text-left px-3" placeholder="">
				</div>
			  </form>
				  </div>
				  <p><a href="{{URL::to('/paiement')}}" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
			  </div>
			  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				  <div class="cart-total mb-3">
					  <h3>Estimate shipping and tax</h3>
					  <p>Enter your destination to get a shipping estimate</p>
						<form action="#" class="info">
				<div class="form-group">
					<label for="">Country</label>
				  <input type="text" class="form-control text-left px-3" placeholder="">
				</div>
				<div class="form-group">
					<label for="country">State/Province</label>
				  <input type="text" class="form-control text-left px-3" placeholder="">
				</div>
				<div class="form-group">
					<label for="country">Zip/Postal Code</label>
				  <input type="text" class="form-control text-left px-3" placeholder="">
				</div>
			  </form>
				  </div>
				  <p><a href="{{URL::to('/paiement')}}" class="btn btn-primary py-3 px-4">Estimate</a></p>
			  </div>
			  <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
				  <div class="cart-total mb-3">
					  <h3>Cart Totals</h3>
					  <p class="d-flex">
						  <span>Subtotal</span>
						  <span>$20.60</span>
					  </p>
					  <p class="d-flex">
						  <span>Delivery</span>
						  <span>$0.00</span>
					  </p>
					  <p class="d-flex">
						  <span>Discount</span>
						  <span>$3.00</span>
					  </p>
					  <hr>
					  <p class="d-flex total-price">
						  <span>Total</span>
						  <span>$17.60</span>
					  </p>
				  </div>
				  <p><a href="{{URL::to('/paiement')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
			  </div>
		  </div>
		  </div>
	  </section>
	  @endsection

{{-- end contenu--}}


{{--
	<script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
  </body>
</html>
	--}}