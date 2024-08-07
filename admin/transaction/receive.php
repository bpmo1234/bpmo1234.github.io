<?php
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * from `transaction_list` where id = '{$_GET['id']}' ");
    if($qry->num_rows > 0){
        foreach($qry->fetch_assoc() as $k => $v){
            $$k=stripslashes($v);
        }
    }
    $qry_meta = $conn->query("SELECT * FROM transaction_meta where transaction_id = '{$id}'");
    while($row = $qry_meta->fetch_array()){
        $meta[$row['meta_field']] = $row['meta_value'];
    }
}
$sender_name = $meta['sender_lastname'];
$receiver_name = $meta['receiver_lastname'];
$branch_qry =$conn->query("SELECT * FROM `branch_list`");
$res = $branch_qry->fetch_all(MYSQLI_ASSOC);
$branch_arr = array_column($res,'name','id');

?>
<div class="card card-outline card-info">
	<div class="card-header">
		<h3 class="card-title">Receiving Transaction</h3>
	</div>
	<div class="card-body">
        <div class="container-fluid" id="print_out">
        <div id='transaction-printable-details' class='position-relative'>
            <style>
                #transaction-printable-details:before {
                    content: 'RECEIVED';
                    color: #00000014;
                    transform: rotate(-45deg);
                    font-size: 10em;
                    font-weight: 800;
                    position: absolute;
                    width: calc(100%);
                    left: 0;
                    display: flex;
                    top: 26%;
                    z-index: -1;
                    justify-content: center;
                    align-items: center;
                }
            </style>
              <div class="row">
            <div class="col">
                <div style="display: flex; align-items: center;">
                    <img src="/mtms/images/colombe.png" alt=""
                         style="height: 50px; position:relative; top: -3px;">
                    <div style="margin-left: 10px;">
                        <h4 class="p-0 m-0">SINGBEOGO GLOBAL INTERNATIONAL SERVICE</h4>
                        <strong class="text-gray-700 p-0w">BUREAU DE TRANSFERT D'ARGENT ET DE CHANGE</strong>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
                <h1>Reçu</h1>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col">
                Orange Money : <strong> *144*3*2946856*MONTANT#</strong> / Moov Money :
                <strong>*155*5*0073403*MONTANT#</strong>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h6>Date : <strong><span id="invoice-date">20-07-2024 17:57</span></strong></h6>
                <h6>Montant : <strong><span><?php echo isset($sending_amount) ? number_format($sending_amount) : '' ?></span></strong></h6>
                <h6>Frais : <strong><span><?php echo isset($fee) ? number_format($fee) : '' ?></strong></h6>
                <h6>L'envoyeur : <strong><span><?php echo isset($sender_name) ? $sender_name : '' ?></span></strong></h6>
                <h6>Le receveur : <strong><span><?php echo isset($receiver_name) ? $receiver_name : '' ?></span></strong></h6>
                <h6>Tél. de l'envoyeur : <strong><span><?php echo isset($meta['sender_contact']) ? $meta['sender_contact'] : '' ?></span></strong></h6>
                <h6>Tel. du receveur : <strong><span><?php echo isset($meta['receiver_contact']) ? $meta['receiver_contact'] : '' ?></span></strong></h6>
                <h6>Motif : <strong><span><?php echo isset($purpose) && !empty($purpose) ? $purpose : 'N/A' ?></span></strong></h6>
            </div>
            <div class="col" style="text-align: right;">
                <div class="row">
                    <div class="col-4">Ouaga/Tel:</div>
                    <div class="col">
                        <div>Tel : (226) 70 48 65 30</div>
                        <div>Tel : (226) 76 28 56 35</div>
                        <div>Tel : (226) 76 81 89 02</div>
                        <div>Tel : (226) 78 26 94 48</div>
                    </div>
                </div>
            </div>
            <div class="col" style="text-align: right;">
                <div class="row">
                    <div class="col-4">Lomé/Tel:</div>
                    <div class="col">
                        <div>Tel : (228) 70 51 34 98</div>
                        <div>Tel : (228) 99 95 36 56</div>
                        <div>Tel : (228) 90 92 97 38</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col text-center">
                <h1 style="font-size: xx-large;">Code : <strong><span ><?php echo isset($code) ? $code : '' ?></span></strong></h1>
            </div>
            <div class="col-4">
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col m-5 text-center">
                <img src="/mtms/images/coris.png" alt="" class="resize-img">
                <img src="/mtms/images/yup.png" alt="" class="resize-img">
                <img src="/mtms/images/moneygram.jpeg" alt="" class="resize-img">
                <img src="/mtms/images/flooz.png" alt="" class="resize-img">
                <img src="/mtms/images/orangemoney.jpeg" alt="" class="resize-img">
                <img src="/mtms/images/rapidtransfer.png" alt="" class="resize-img">
                <img src="/mtms/images/wmoney.png" alt="" class="resize-img">
                <img src="/mtms/images/westernunion.jpeg" alt="" class="resize-img">
            </div>
        </div>
        <p class="text-center">La SGIS-Z décline toute responsabilité s&#039;il se révèle que les fonds proviennent d&#039;origine criminelle ou de source illégale; Le déposant déclare que les fonds mis en dépôt ne sont pas criminelle, ne proviennent pas d&#039;activités illégales et rassure connaître à qui il envoie.</p>

    </div>
    
    <form action="" id="receive-form">
			<input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
            <fieldset>
                <legend>Receiving Details</legend>
                <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receiver_presented_id_type" class="control-label">Receiver Presented ID Type</label>
                            <input type="text" class="form-control form-control-sm rounded-0" id="receiver_presented_id_type" required name="receiver_presented_id_type" value="<?php echo isset($meta['receiver_presented_id_type']) ? $meta['receiver_presented_id_type'] :'' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="receiver_presented_id_num" class="control-label">ID #</label>
                            <input type="text" class="form-control form-control-sm rounded-0" id="receiver_presented_id_num" required name="receiver_presented_id_num" value="<?php echo isset($meta['receiver_presented_id_num']) ? $meta['receiver_presented_id_num'] :'' ?>">
                        </div>
                    </div>
                </div>
                <?php if($_settings->userdata('type') == 1): ?>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="received_branch_id">Branch</label>
                        <select name="received_branch_id" id="received_branch_id" class="custom-select custom-select-sm select2">
                            <option value="" disabled <?php echo !isset($meta['received_branch_id']) ? "selected" :'' ?>></option>
                            <?php 
                                $branch_qry = $conn->query("SELECT * FROM branch_list where `status` = 1 ".(isset( $meta['received_branch_id']) &&  $meta['received_branch_id'] > 0 ? " OR id = '{$meta['received_branch_id']}'" : '' )." order by `name` asc ");
                                while($row = $branch_qry->fetch_assoc()):
                            ?>
                            <option value="<?php echo $row['id'] ?>" <?php echo isset($received_branch_id) && $received_branch_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
				</div>
                <?php else: ?>
                    <input type="hidden" name="received_branch_id" value="<?php echo $_settings->userdata('branch_id') ?>">
                <?php endif; ?>
            </fieldset>
		</form>
	<div class="card-footer">
		<button class="btn btn-flat btn-primary" form="receive-form">Enregister</button>
		<a class="btn btn-flat btn-default" href="?page=transection">annuler</a>
	</div>
</div>
<fieldset>
                <!-- <legend class="text-info">Details</legend>
                <div class="col-12">
                    <dl>
                        <dt class="text-muted">Amount:</dt>
                        <dd class="pl-4"><?php echo isset($sending_amount) ? number_format($sending_amount,2) : '' ?></dd>
                        <dt class="text-muted">Purpose/Remarks:</dt>
                        <dd class="pl-4"><?php echo isset($purpose) && !empty($purpose) ? $purpose : 'N/A' ?></dd>
                        <dt class="text-muted hide-print">Sent From:</dt>
                        <dd class="pl-4 hide-print"><?php echo isset($branch_id) ? $branch_arr[$branch_id] : '' ?></dd>
                    </dl>
                </div> -->
            </fieldset>
            <script>
	$(document).ready(function(){
        $('.select2').select2({
			width:'resolve'
		})
		$('#receive-form').submit(function(e){
			e.preventDefault();
            var _this = $(this)
			 $('.err-msg').remove();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Master.php?f=save_receive",
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
                        print();
					}else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>')
                            el.addClass("alert alert-danger err-msg").text(resp.msg)
                            _this.prepend(el)
                            el.show('slow')
                            $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
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
    function print(){
        var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Transaction Details - Print View")
            var p = $('#print_out').clone()
            p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            p.find('.btn').remove()
            p.find('.hide-print').remove()
            _el.append(_head)
            _el.append('<div class="d-flex justify-content-center">'+
                      '<div class="col-1 text-right">'+
                      '<img src="<?php echo validate_image($_settings->info('logo')) ?>" width="65px" height="65px" />'+
                      '</div>'+
                      '<div class="col-10">'+
                      '<h4 class="text-center"><?php echo $_settings->info('name') ?></h4>'+
                      '<h4 class="text-center">Transaction Details</h4>'+
                      '</div>'+
                      '<div class="col-1 text-right">'+
                      '</div>'+
                      '</div><hr/>')
            _el.append(p.html())
            var nw = window.open("","","width=1200,height=900,left=250,location=no,titlebar=yes")
                     nw.document.write(_el.html())
                     nw.document.close()
                     setTimeout(() => {
                         nw.print()
                         setTimeout(() => {
                            nw.close()
                            end_loader()
						    location.href = "./?page=transaction";
                         }, 200);
                     }, 500);

    }
</script>
<style>
.resize-img {
    height: 50px; 
    width: auto;
}
</style>
