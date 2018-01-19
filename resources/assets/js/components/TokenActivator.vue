<template>
    <button
     type="button" 
     class="btn btn-outline-success btn-sm"
     title="Activate token"
     @click.prevent='ActivateToken'
     >
      <i class="fa" :class="icon"></i>   
     </button>
      
    
</template>

<script>
    export default
    {
        props:["token"],

        data(){
            return {
                icon:this.tokenIcon,
                tokenCopy:this.token
            }
        },
        methods:{
            ActivateToken(){
                axios.put(`/admin/token/${this.token.id}/activate`).then(({data})=>{
                    this.token=data;
                }).catch(response=>{
                    //flash("something went wrong")
                });

            }
        },
        computed:{
            tokenIcon(){
               return this.tokenCopy.state=="Active"?'fa fa-check':"fa-unlock-alt";
            }
        }
    }
</script>
