@extends('layouts.admin')
    @section('content')
            <div class="card bordered-top col-md-6 mx-auto mt-5">
              <div class="card-body">
                  <h4 class="card-title text-center">Admin Login</h4>
                  <form action="{{ route('postLogin') }}" method="post">
                  {{ csrf_field() }}
                  
                      <!-- Email  -->
                      <div class="form-group">
                        <label class="{{$errors->has("email")?'text-danger':''}}">Email Address</label>
                        <input type="text" name="email" class="form-control {{$errors->has("email")?'is-invalid':''}}"  placeholder="Email">
                        @if($errors->has("email"))
                        <div class="invalid-feedback">
                            {{$errors->first("email")}}
                        </div>
                        @endif           
                      </div>


                      <!-- Password  -->
                      <div class="form-group">
                        <label class="{{$errors->has("password")?'text-danger':''}}">Password</label>
                        <input type="password" name="password" class="form-control {{$errors->has("password")?'is-invalid':''}}"  placeholder="Password">
                        @if($errors->has("password"))
                        <div class="invalid-feedback">
                            {{$errors->first("password")}}
                        </div>
                        @endif           
                      </div>

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">
                              <i class="fa fa-save"></i>
                              Login
                          </button>
                      </div>
                  </form>
                  
                  
              </div>
            </div>
    @endsection

