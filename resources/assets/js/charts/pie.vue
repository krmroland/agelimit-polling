<template>
    <div>
        
    </div>
</template>

<script>
    export default
    {
        props:["data","seriesLabel"],
        mounted(){

            Highcharts.chart(this.$el, {
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
                    name: this.seriesLabel,
                    colorByPoint: true,
                    data:this.data,
                }]
            });

        },

        data(){
            return {
            
            }
        }
    }
</script>
