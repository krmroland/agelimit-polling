<!-- Modal -->
<div class="modal animated bounceInUp" id="editTokenModel" tabindex="-1" role="dialog" aria-labelledby="addTokenForm" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mx-auto" id="addTokenForm">Edit Token</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
      {{ method_field("PATCH") }}
      {{ csrf_field() }}
      <div class="modal-body">
          <!-- Token  -->
          <div class="form-group">
            <label class="{{$errors->has("value")?'text-danger':''}}">Token</label>
            <input type="text" name="value" class="form-control {{$errors->has("value")?'is-invalid':''}}"  placeholder="Token" value="{{ old('value') }}">
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
          Edit Token
        </button>
      </div>
    </form>
    </div>
  </div>
</div>
@push('scripts')
<script>

$("#editTokenModel").on("show.bs.modal",function(event){
   var token= $(event.relatedTarget).data('token');

   var modal=$(this);

    modal.find(".modal-body input").val(token.value);
 
    modal.find('form').attr("action","/admin/tokens/"+token.id);


});

</script>

  @if ($errors->has("value"))
  <script>
    $("#editTokenModel").modal("show");
  </script>

  @endif
@endpush
