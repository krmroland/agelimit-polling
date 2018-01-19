@extends('layouts.app')
@section('content')

<div class="container" >
    <div class="col-md-10 mx-auto">
        <div class="card bordered-top">
          <div class="card-body">
              <h4 class="card-title text-center">Verify Your Phone Number</h4>
              <form action="{{ route('age-limit-verification.store') }}" method="post">
                {{ csrf_field() }}

                <p class="form-text">
                    We believe <a href="https://authy.com/" target="_blank">Authy</a> sent you a
                    verification  code <br> 
                    Please Verify your phone number to have your vote counted
                </p>
                <!-- Verification Code  -->
                <div class="form-group">
                  <label class="{{ $errors->has("token")?'text-danger':'' }}">
                      Verification Code
                  </label>
                  <input type="text" name="token" 
                  class="form-control {{$errors->has("token")?'is-invalid':''}}"  
                  placeholder="The verification code">
                  @if($errors->has("token"))
                  <div class="invalid-feedback">
                      {{$errors->first("token")}}
                  </div>
                  @endif      
              </div>
              <div class="form-group">
                 <button type="submit" class="btn btn-primary">

                     Verify Phone Number
                 </button>
             </div>     

         </form>
         <a href="{{ route('age-limit-verification.resendCode') }}">Resend Code</a>
       {{--   <a href="{{ route('age-limit-verification.resendCode',['type'=>'call']) }}">
             Call me instead
         </a> --}}
     </div>
 </div>
</div>
</div>


@endsection




