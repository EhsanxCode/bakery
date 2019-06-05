@extends('layouts.app')
@section('content')
<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Fill your detail and we will contact you as soon as we get your order.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
          </h4>
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                {{-- <h6 class="my-0">Product name</h6> --}}
                <h6 class="my-0">{{$item->name}}</h6>
                {{-- <small class="text-muted">Brief description</small> --}}
                <small class="text-muted">{{$item->description}}</small>
              </div>
              {{-- <span class="text-muted">$12</span> --}}
              <span class="text-muted">{{$item->price}}</span>
            </li>
          </ul>

        </div>

        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form action="/store/{{$item->id}}" method="GET" class="needs-validation" novalidate>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input name="fname" type="text" class="form-control" id="firstName" placeholder="First Name" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input name="lname" type="text" class="form-control" id="lastName" placeholder="Last Name" value="" required>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="phone">Phone Number</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">+</span>
                </div>
                <input name="phone" type="number" class="form-control" id="phone" placeholder="Phone no." required>
                <div class="invalid-feedback" style="width: 100%;">
                  Your phone number is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="size">Cake size</label>
              <div class="input-group">
                {{-- <select> --}}
                {{-- <option value="volvo">Volvo</option> --}}
                {{-- <option value="saab">Saab</option> --}}
                {{-- <option value="mercedes">Mercedes</option> --}}
                {{-- <option value="audi">Audi</option> --}}
                {{-- </select> --}}
                <input name="size" type="number" class="form-control" id="size" placeholder="Cake size" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Cake size is required.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email (Optional)</label>
              <input name="email" type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="radio">
              <label><input id='sp' onclick="javascript:yesnoCheck();" type="radio" name="optradio" value="delivery" checked>Delivery</label>
            </div>
            <div class="radio">
              <label><input type="radio" onclick="javascript:yesnoCheck();" value="self" name="optradio">Self pickup</label>
            </div>
            <script type="text/javascript">

            function yesnoCheck() {
                if (document.getElementById('sp').checked) {
                    document.getElementById('ifYes').style.display = 'block';
                    document.getElementById("address").required = true;
                }
                else {
                    document.getElementById('ifYes').style.display = 'none';
                    document.getElementById("address").required = false;
                    document.getElementById("address").value = '';
                }

            }

            </script>

            <div id='ifYes' class="mb-3">
              <label for="address">Address</label>
              <input name="address" type="text" class="form-control" id="address" placeholder="Koteshwor, Bhanktapur" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <label for="remark">Remark</label>
            <input name="remark" type="text" class="form-control" id="remark" placeholder="Any feature you want to mention?">
            <br>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </div>
    <br><br>
@include('inc.footer')
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();

    </script>

@endsection
