<div class="card bordered-top">
  <div class="card-body">
      <h4 class="card-title text-center">Brief result summary</h4>
      <div id="container"></div> 
      <hr>
      <h4 class="text-center text-primary">Disclaimer</h4>
     
    <p class="mb-2">
       This poll is meant to collect and express the opinions of Ugandans and has nothing
       to do with the Government in any way. Email
        <strong class="text-primary">
            rolandmbasa@gmail.com
        </strong>   
        for any inquiries
    </p>
  </div>
</div>


@push('scripts')
<script src="/js/highcharts.js"></script>
    <script>
    Highcharts.setOptions({
    chart: {
        spacingLeft: 0,

    },

    colors: ['#ff1e90',"#004180", '#3B9E4D', '#FF0066', '#FF6666'],
    
    credits:{
        enabled:false
    }

});

        Highcharts.chart('container', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        distance: 5,
                        format: '<b>{point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }

                    },
                    showInLegend:{
                        enabled:true,

                    } 
                }
            },
            series: [{
                name: 'Opinions',
                colorByPoint: true,
                data: {!! \App\AgeLimitPoll::simplePieChart() !!}
            }]
        });
    </script>
@endpush
