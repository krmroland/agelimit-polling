<template>
   <div class="row">
    <div class="col-md-12">
        <h4 class="card-title text-center">
            System Unread Notifications
            <span class="badge badge-secondary badge-pill">
                {{ notifications.length }}
            </span>
        </h4>
    </div>
    <div class="col-md-12 table-responsive" v-for="(notification,index) in notifications">
        <notification 
            :data="notification" 
            @markedAsRead="removeNotifcation(index)"
        ></notification>
    </div>
       
   </div>
</template>

<script>
import Notification from "./notification";
    export default
    {
        components:{Notification},

        props:["data"],

        data(){
            return {
                notifications:this.data,
            }
        },
        methods:{
            removeNotifcation(index){
                console.log(index);
                this.notifications.splice(index,1);
            }
        }
    }
</script>
