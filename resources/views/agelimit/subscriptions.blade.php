<div class="card bordered-top mt-1">
  <div class="card-body">
      <h4 class="card-title text-center">Subscribe</h4>
      <form action="/subscriptions" method="post">
          {{ csrf_field() }}

          <p class="form-text small">
              Subscribe If you need a detailed analysis in your inbox 
          </p>
          <!-- Email  -->
          <div class="form-group">
            <label class="{{$errors->has("email")?'text-danger':''}}">Email</label>
            <input type="text" name="email" class="form-control {{$errors->has("email")?'is-invalid':''}}"  placeholder="Email" value="{{ old('email') }}">
            @if($errors->has("email"))
            <div class="invalid-feedback">
                {{$errors->first("email")}}
            </div>
            @endif           
          </div>

          <div class="form-group">
              <button type="submit" class="btn btn-primary">
                  Subscribe
              </button>
          </div>
      </form>
  </div>
</div>
