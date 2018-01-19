<div class="card mt-3 bordered-top">
  <div class="card-body">
      <notifications :data="{{Auth::user()->unreadNotifications  }}"></notifications>

      @if(Auth::user()->unreadNotifications->isEmpty())
      <div class="alert alert-dark text-center">
        There Are No read Notifications
      </div>
      @endif
    
  </div>
</div>
