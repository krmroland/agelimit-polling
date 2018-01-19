@if(session()->has('flash_message'))
<script src="/js/alert.js"></script>  
<script>
    swal({
        title: "{!! session('flash_message.title') !!}",
        text: "{!! session('flash_message.message') !!}",
        type: "{!! session('flash_message.type') !!}",
        confirmButtonText:"Okay ",
        confirmButtonClass: "btn btn-primary",
        showCancelButton:false,
        buttonsStyling: false
    })
</script>
@endif
