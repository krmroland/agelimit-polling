<template>
    <div  class="alert alert-secondary text-center">
         <div>
            <strong>
                {{notification.type}}
            </strong> 
            <button class="btn btn-secondary btn-sm" @click="markAsRead">
                <i class="fa" :class="icon"></i>
               {{ btnText }}
            </button>
         </div>
         <hr>
        <div class="d-flex justify-content-between flex-wrap">
           <p>
               {{ notification.data['message'] }}
           </p>
           <p class="small ml-auto">
               {{ notification.created_at }}
           </p> 
        </div>
         
    </div>
</template>

<script>
    export default
    {
        props:["data"],

        data(){
            return {
                notification:this.data,
                icon:'fa-share',
                btnText:' Mark As read'
            }
        },
        methods:{
            markAsRead(){
                this.icon='fa-spinner fa-spin';
                this.btnText='processing';
                axios.put('/admin/notifications/'+this.notification.id)
                        .then(done=>{
                            this.$emit("markedAsRead",this.notification);
                            this.icon='fa-check';
                            this.btnText='read';
                            flash('Done');
                        }).catch(error=>{
                            this.icon='fa-times';
                            this.btnText='Error';
                            flash("Something went bad","Opps","error");
                        });
            }
        }
    }
</script>
