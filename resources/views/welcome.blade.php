@extends('layouts.app')
@section('content')
<div id="fb-root"></div>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1170545579669296";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container-fluid">
  <div class="card bordered-top">
    <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
      <h5 class="card-title text-center">
        As a Ugandan, do you think the age limit bill should be changed?</h5>

          <div class="fb-share-button" data-href="http://lawma.ug" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flawma.ug%2F&amp;src=sdkpreparse">Share</a></div>
        </div>
      </div>                
      <div class="row">
        <div class="col-md-5 mt-2 mt-xl-1">
          @include('agelimit.form')
          @include('agelimit.subscriptions')
        </div>
        <div class="col-md-7 mt-2 mt-xl-1">
          @include('agelimit.simplePieChart')   
        </div>
      </div>
    </div>

    @endsection

