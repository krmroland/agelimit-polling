<template>
     <tr>
        <td>{{ index+1 }}</td>
        <td>{{ tokenCopy.name }}</td>
        <td>{{ tokenCopy.value }}</td>
        <td>{{ tokenCopy.state }}</td>
        <td>{{ tokenCopy.updated_at }}</td>
        <td>{{ tokenCopy.modeOfActivation || '.........' }}</td>
        <td class="m-0 p-0" style="width:10px">
          <div class="btn-group">
            <button 
             type="button" 
             class="btn btn-outline-primary  btn-sm" 
             title="Eit token" 
             @click.prevent="isEditing=true"
             >
                <i class="fa fa-edit"></i>
            </button> 
            <button
                type="button"
                class="btn btn-outline-success  btn-sm"
                title="Activate Token"
                @click="activate"
            >
            <i class="fa" :class="icon"></i>
            </button>
            <button type="button" class="btn btn-outline-secondary btn-sm" @click="destroy">
              <i class="fa fa-trash"></i>
            </button>
          </div>
        </td>
        <edit-token 
            @done="tokenCopy=$event; isEditing=false"
            :token="tokenCopy"
            :isEditing.sync="isEditing"
        ></edit-token>
    </tr>
</template>

<script>
import EditToken from "./editToken";
    export default
    {
        components:{EditToken},
        props:["token","index"],

        data(){
            return {
                tokenCopy:this.token,
                isEditing:false,
                isActivating:false
            }
        },
        methods:{
            destroy(){
                confirm("The Token "+this.tokenCopy.name+" will be deleted").then(confirmed=>{
                    axios.delete('/admin/tokens/'+this.tokenCopy.id).then((done)=>{
                        flash("Token was deleted successfully");
                        this.$emit("removed");
                    });
                })
            },
            activate(){
                this.isActivating=true;
                axios.put(`/admin/token/${this.token.id}/activate`).then(({data})=>{
                    this.tokenCopy=data;
                    this.isActivating=false;
                    flash("Token updated successfully");
                }).catch(response=>{
                    this.isActivating=false;
                    flash("something went wrong","Sorry","error");
                });

            }
        },
        computed:{
            icon(){
                if (this.isActivating) {
                    return 'fa-spinner fa-spin';
                }
               const state=this.tokenCopy.state;

                if (state=="Active") {
                    return 'fa-check'
                };
                return state=='Un Used'?'fa-unlock':'fa-lock';
               
            }
        }
    }
</script>
