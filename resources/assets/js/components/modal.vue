<template>
    <div class="modal animated zoomIn" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header bg-gray">
            <h6 class="modal-title mx-auto" >
               <slot name="title"></slot>
            </h6>
            <button type="button" class="close"  aria-label="Close" @click.prevent="close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <slot></slot>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click.prevent="close">Close</button>
           
              <slot name="footer"></slot>
          </div>
        </div>
      </div>
    </div>
 
</template>

<script>
    export default
    {
        props:["shouldShow"],

        mounted(){
            if (this.shouldShow) {
                this.rootNode.modal('show')
            }else{
                this.rootNode.modal('hide');
            }
        },

        data(){
            return {
                

            }
        },
        methods:{
            close(){
                this.rootNode.modal('hide');
                this.$emit("closed");
                this.$emit("update:shouldShow",false);
            }
        },
        watch:{
            shouldShow(truethy,oldValue){
                console.log(truethy,oldValue);
                if (truethy) {
                    this.rootNode.modal("show");
                }else{
                    this.rootNode.modal("hide");
                    this.$emit("closed");
                    this.$emit("update:shouldShow",false);
                }
               


            }
        },
        computed:{
            rootNode(){
                return $(this.$el);
            }
        }


    }
</script>
