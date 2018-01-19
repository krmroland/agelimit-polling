<template>
    <div>
        
    </div>
</template>

<script>
    export default
    {
        props:["data"],
        mounted(){

                    

            Highcharts.chart(this.$el, {
                chart: {
                    type: 'line'
                },
                title: {
                    text: this.label
                },
                xAxis: {
                    categories:this.data.categories,
                },
                yAxis: {
                    title: {
                        text: this.data.yAxisLabel
                    }
                },
                plotOptions: {
                    line: {
                        dataLabels: {
                            enabled: true
                        },
                        enableMouseTracking: false
                    }
                },
                series:this.data.series
            });

        },

        data(){
            return {
            
            }
        }
    }
</script>
