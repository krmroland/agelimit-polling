@inject('token', 'App\Admin\AuthyToken')
@include('admin.dashboard.tokens.editModal')
<div class="card col-md-12 bordered-top mt-2">
  <div class="card-body">
  <div class="d-flex justify-content-between mb-3 flex-wrap align-items-center">
      <h4 class="card-title text-center mx-auto">Authy Tokens</h4>
      <div >
        @include('admin.dashboard.tokens.add')
      </div>
     
  </div>
      
<div class="table-responsive">
<tokens-table :data="{{ $token->getAll() }}"></tokens-table>

</div>

  </div>
</div>
