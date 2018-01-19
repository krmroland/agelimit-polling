<template>
<div>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>#</th>
                <td>Name</td>
                <th>Value</th>
                <th>State</th>
                <th>Last Activated</th>
                <th>Recent Mode Of Activation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <template>
            <token-row 
                v-for="(token,index) in tokens" 
                :token='token'
                :index="index"
                :key="token.id"
                @removed="destroyToken(index)"
            ></token-row>
        </template>     
        </tbody>
    </table>
    
</div>
  
</template>

<script>
import EditToken from "./editToken";

import TokenActivator from "./editToken";

import TokenRow from "./tokenRow";
    export default
    {
        props:["data"],
        components:{EditToken,TokenActivator,TokenRow},

        data(){
            return {
                tokens:this.data,
            }
        },
        methods:{
            destroyToken(index){
               this.tokens.splice(index,1);

            }
        }
    }
</script>
