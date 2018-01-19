<div class="card bordered-top">
  <div class="card-body">
      <h4 class="card-title text-center">Please Participate</h4>
      <form action="/agelimit/poll" method="post">
      {{ csrf_field() }}
      
        <p class="form-text">
           Your phone number is to help us ensure that only Ugandans can vote.
           <br> <br>
            As a matter of fact it
           wont even touch our servers, we will send it to <a href="https://authy.com/" target="_blank">
               Authy
           </a> for verification
        </p>
          <!-- Phone Number  -->
          <div class="form-group">
            <label class="{{ $errors->has("phoneNumber")?'text-danger':'' }}">Phone Number</label>
            <input type="text" name="phoneNumber" value="{{ old('phoneNumber') }}"
                  class="form-control {{$errors->has("phoneNumber")?'is-invalid':''}}"  
                  placeholder="Phone Number">
            @if($errors->has("phoneNumber"))
            <div class="invalid-feedback">
                {{$errors->first("phoneNumber")}}
            </div>
            @endif           
          </div>
          <div class="btn-group">
           <input type="submit" value="Agree" name="choice" class="btn btn-primary">
           <input type="submit" value="Disagree" name="choice" class="btn btn-danger"> 
            </div>
      </form>
  </div>
</div>


@push('scripts')
<div id="fb-root"></div>
    <script>
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@endpush
