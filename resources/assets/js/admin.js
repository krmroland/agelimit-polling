import "./bootstrap";

import Highcharts from "highcharts";

Highcharts.setOptions({
    chart: {
        spacingLeft: 0,

    },

    colors: ['#ff1e90',"#004180",  '#3B9E4D', '#FF0066', '#FF6666'],
    
    credits:{
        enabled:false
    }

});


window.Highcharts=Highcharts;

Vue.component("TokensTable",require("./tokens/table"));
Vue.component("Modal",require("./components/modal"));
Vue.component("Notifications",require("./components/Notifications"));
Vue.component("pie",require("./charts/pie"));
Vue.component("lineChart",require("./charts/lineChart"));

const app = new Vue({
    el:"#app"
});
