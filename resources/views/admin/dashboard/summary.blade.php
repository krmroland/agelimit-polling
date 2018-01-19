@inject('summary', 'App\Admin\Summary')

<!-- pie charts -->
<div class="row">
    @foreach ($summary->pieCharts() as $title=> $pie)
    <div class="col-md-6 ">
        <div class="card mt-2 bordered-top">
          <div class="card-body">
              <h4 class="card-title text-center">
                  {{ $title }}
              </h4>
              <pie :data="{{ $pie }}"></pie>
          </div>
        </div>
    </div>
        
    @endforeach
   {{--  line graphs --}}
    @foreach ($summary->lineCharts() as $title=>$chart)
    <div class="col-md-12 ">
        <div class="card mt-2 bordered-top">
          <div class="card-body">
              <h4 class="card-title text-center">
                  {{ $title }}
              </h4>
              <line-chart :data="{{ $chart }}"></line-chart>
          </div>
        </div>
    </div>
        
    @endforeach
</div>
