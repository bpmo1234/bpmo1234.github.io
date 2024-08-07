<style>
    #uni_modal .modal-footer{
        display:none;
    }
</style>
<div class="container-fluid">
    <form action="" id="find-transaction">
        <div class="form-group">
            <input type="text" name="tracking_code" class="form-control form-control-lg rounded-0" required>
        </div>
    </form>
    <div class="form-group text-center">
        <button class="btn btn-flat btn-primary" form="find-transaction">Find</button>
        <button class="btn btn-flat btn-light" type="button" data-dismiss="modal">Cancel</button>
    </div>
</div>
<script>
    $(function(){
        $('#find-transaction').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=find_transaction",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("An error occured",'error');
					end_loader();
				},
				success:function(resp){
					if(typeof resp =='object' && resp.status == 'success'){
						location.href = "./?page=transaction/receive&id="+resp.id;
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $(".modal").animate({ scrollTop: 0 }, "fast");
                            end_loader()
                    }else{
						alert_toast("An error occured",'error');
						end_loader();
                        console.log(resp)
					}
				}
			})
		})
    })
</script>