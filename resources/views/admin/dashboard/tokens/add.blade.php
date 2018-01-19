<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addTokenModel">
  <i class="fa fa-plus"></i>
</button>

<!-- Modal -->
<div class="modal animated bounceInUp" id="addTokenModel" tabindex="-1" role="dialog" aria-labelledby="addTokenForm" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto" id="addTokenForm">Add A new Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('tokens.store') }}" method="post">
      <div class="modal-body">
      
        {{ csrf_field() }}
        <!-- The Name of the token  -->
        <div class="form-group">
          <label class="{{$errors->has("name")?'text-danger':''}}">The Name of the token</label>
          <input type="text" name="name" class="form-control {{$errors->has("name")?'is-invalid':''}}"  placeholder="The Name of the token">
          @if($errors->has("name"))
          <div class="invalid-feedback">
              {{$errors->first("name")}}
          </div>
          @endif           
        </div>
        
          <!-- Token  -->
          <div class="form-group">
            <label class="{{$errors->has("value")?'text-danger':''}}">The Value of the token</label>
            <input type="text" name="value" class="form-control {{$errors->has("value")?'is-invalid':''}}"  placeholder="Token" value="{{ old("value") }}">
            @if($errors->has("value"))
            <div class="invalid-feedback">
                {{$errors->first("value")}}
            </div>
            @endif           
          </div>

          
   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">
          <i class="fa fa-save"></i>
          Add Token
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
@push('scripts')

  @if ($errors->has("value"))
  <script>
    $("#addTokenModel").modal("show");
  </script>

  @endif
@endpush
