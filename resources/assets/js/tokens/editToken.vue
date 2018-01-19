<template>
    <modal :shouldShow.sync="showModal" @closed="$emit('done',token)">
        <h4 slot="title">Edit Token</h4>
        <form action="">
        <div class="form-group">
            <label :class="{'text-danger':error}">Token Name</label>
            <input type="text"
             v-model="name" 
             class="form-control" 
             :class="{'is-invalid':error}">
             <div class="invalid-feedback" v-text="error" v-if="error"></div>
        </div>
            <div class="form-group">
                <label :class="{'text-danger':error}">Token Value</label>
                <input type="text"
                 v-model="value" 
                 class="form-control" 
                 :class="{'is-invalid':error}">
                 <div class="invalid-feedback" v-text="error" v-if="error"></div>
            </div>
        </form>
        <button slot="footer" class="btn btn-primary" @click="editToken">
            <i class="fa fa-save"></i>
            Save Token
        </button>
    </modal>

</template>

<script>
    export default
    {
        props:["token","isEditing"],

        data(){
            return {
                error:'',
                showModal:this.isEditing,
                value:this.token.value,
                name:this.token.name
            }
        },
        methods:{
            editToken(){
                axios.put(`/admin/tokens/${this.token.id}`,{value:this.token.value,name:this.name})
                    .then(({data})=>{
                        this.error=null;
                        this.$emit('done',data);
                        flash('The token update was successful');


                    }) .catch();
            }
        },
        watch:{
            isEditing(newValue){
                this.showModal=newValue;
            }
        }
    }
</script>
