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
?>
<head>
     <!--begin::Global Stylesheets Bundle(used by all pages)-->
     <link href="/admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
     <link href="/admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    <style>
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6 !important;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

 
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="card" style="width: 75%;">
            <div class="card-header">
                <div class="text-center">
                <h3 class="text-dark"><?php echo isset($id) ? "Update " : "Nouvelle " ?>Transaction</h3>
                </div>
               
            </div>
            <div class="card-body">
                
            
                <form action="" id="transaction-form">
                <input type="hidden" name ="id" value="<?php echo isset($id) ? $id : '' ?>">
                    <div class="row g-3">
                    <div class="col-sm-4 shadow p-3 mb-5 bg-white rounded" style="width: 30%;">
                            <label for="transfer_type" class="form-label">Type de Tranfert</label>
                            <select class="from-select" name="transfer_type" id="transfer_type">
                                <option value="SGIS-Z" <?php echo isset ($meta['transfer_type']) && $meta['tranfer_type'] == 'SGIS-Z' ? 'selected': ''?>>SGIS-Z</option>
                                <option value="OM" <?php echo isset ($meta['transfer_type']) && $meta['tranfer_type'] == 'OM' ? 'selected': ''?>>OM</option>
                                <option value="FLOOZ" <?php echo isset ($meta['transfer_type']) && $meta['tranfer_type'] == 'FLOOZ' ? 'selected': ''?>>FLOZZ</option>
                            
                                </select>

                       
                        <div class="mb-3">
                            <label for="code"> Code de Transfert</label>
                            <input placeholder="<?php echo isset($traking_code) ?>" type="text" class="form-control" id="code" required name="code" value="<?php echo isset($meta['code']) ? $meta['code'] :'' ?>">
                        </div>
                        </div>
                        <div></div>
                        <div class="col-md-6 shadow-sm p-3 mb-5 bg-white rounded justify-content-center">
                            <div class="mb-3 ">
                                <label for="sender_lastname" class="form-label">Nom de l'émetteur</label>
                                <input type="text" class="form-control" id="sender_lastname" required name="sender_lastname" value="<?php echo isset($meta['sender_lastname']) ? $meta['sender_lastname'] :'' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="sender_contact" class="form-label">N° de Tel de l'émétteur</label>
                                <input type="text" pattern="[0-9\s\/+]+" class="form-control" id="sender_contact" required name="sender_contact" value="<?php echo isset($meta['sender_contact']) ? $meta['sender_contact'] :'' ?>">
                            </div>
                         
                        </div>
                        <div class="col-sm-4 shadow p-3 mb-5 bg-white rounded">
                            <div class="col-auto">
                            <label for="sender_middlename">Document d'identification</label>
                                <select class="form-select" id="sender_address" name="sender_address">
                                    <option value="" disabled <?php echo !isset($meta['sender_address']) ? "selected" :'' ?>>Document</option>
                                    <option value="CNIB" <?php echo isset($meta['sender_address']) && $meta['sender_address'] == 'CNIB' ? 'selected' : '' ?>>CNIB</option>
                                    <option value="Passport" <?php echo isset($meta['sender_address']) && $meta['sender_address'] == 'Passport' ? 'selected' : '' ?>>Passport</option>
                                    <option value="Carte Consulaire" <?php echo isset($meta['sender_address']) && $meta['sender_address'] == 'CarteConsulaire' ? 'selected' : '' ?>>Carte Consulaire</option>
                                    <option value="Acte de Naissance" <?php echo isset($meta['sender_address']) && $meta['sender_address'] == 'ActedeNaissance' ? 'selected' : '' ?>>Acte de Naissance</option>           
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sender_firstname" class="form-label">Numéro du Document</label>
                                <input type="text" class="form-control" id="sender_firstname" required name="sender_firstname" value="<?php echo isset($meta['sender_firstname']) ? $meta['sender_firstname'] :'' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="receiver_address" class="form-label">Date d'établissement</label>
                                <input type="text" class="form-control" id="receiver_address" required name="receiver_address" value="<?php echo isset($meta['receiver_address']) ? $meta['receiver_address'] :'' ?>">
                            </div>
                        </div>
                        
                        <div class="col-md-6 shadow-sm p-3 mb-5 bg-white rounded">
                            <div class="mb-3">
                            <label for="receiver_lastname" class="form-label">Nom du Beneficiaire</label>
                                <input type="text" class="form-control" id="receiver_lastname" required name="receiver_lastname" value="<?php echo isset($meta['receiver_lastname']) ? $meta['receiver_lastname'] :'' ?>">
                            

                            </div>
                            
                            <div class="md-2">
                                <label for="sender_contact" class="form-label">N° de Tel du Bénéficiaire</label>
                                <input type="text" pattern="[0-9\s\/+]+" class="form-control" id="receiver_contact" required name="receiver_contact" value="<?php echo isset($meta['receiver_contact']) ? $meta['receiver_contact'] :'' ?>">
                            </div>
                          
                      
                        </div>
                    </div>
                    
                    <div class="row justify-content-center shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="form-group" style="width: 30%;">
                            <label for="sending_amount" class="control-label">Montant du Transfert</label>
                            <input type="text" pattern="[0-9.]+" class="form-control shadow-sm p-3 mb-5 bg-white rounded" id="sending_amount" required name="sending_amount" value="<?php echo isset($sending_amount)  ?>">
                        </div>
                        <div class="form-group" style="width: 30%;">
                            <label for="fee" class="control-label">Frais</label>
                            <input type="text" pattern="[0-9.]+" class="form-control shadow-sm p-3 mb-4 bg-white rounded" id="fee" required name="fee" value="<?php echo isset($fee)  ?>">
                        </div>
                        <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="purpose" class="control-label">Motif du Transfert</label>
                            <input placeholder="Optionel" class="form-control form-control-sm rounded-0" id="purpose" name="purpose" style="resize:none"><?php echo isset($purpose) ? $purpose :'' ?></textarea>
                        </div>
                        <?php if($_settings->userdata('type') == 1): ?>
                        <div class="mb-3">
                            <label for="branch_id" class="form-label">Branch</label>
                            <select name="branch_id" id="branch_id" class="form-select">
                                <option value="" disabled <?php echo !isset($meta['branch_id']) ? "selected" :'' ?>></option>
                                <?php 
                                    $branch_qry = $conn->query("SELECT * FROM branch_list WHERE `status` = 1 ".(isset($meta['branch_id']) && $meta['branch_id'] > 0 ? " OR id = '{$meta['branch_id']}'" : '' )." ORDER BY `name` ASC ");
                                    while($row = $branch_qry->fetch_assoc()):
                                ?>
                                <option value="<?php echo $row['id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    <?php else: ?>
                        <input type="hidden" name="branch_id" value="<?php echo $_settings->userdata('branch_id') ?>">
                    <?php endif; ?>
                    </div>
                </div>
                
                    </div>
                    
                </form>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary" form="transaction-form">Enregistrer</button>
                <a class="btn btn-danger" href="?page=transaction">Annuler</a>
            </div>
        </div>
    </div>
</div>

  
<script>
    $(document).ready(function(){
        $('.select2').select2({
            width: 'resolve'
        });
        $('#sending_amount').on('input', function(e){
            var amount = $(this).val();
            $.ajax({
                method: 'POST',
                data: {amount: amount},
                dataType: 'json',
                error: err => {
                    console.log(err);
                },
                success: function(resp){
                    if(resp.status == 'success'){
                        $('#fee').val(resp.fee);
                        $('#payable_amount').val(resp.payable);
                    } else {
                        console.log(resp);
                    }
                }
            });
        });
        $('#transaction-form').submit(function(e){
            e.preventDefault();
            var _this = $(this);
            $('.err-msg').remove();
            start_loader();
            $.ajax({
                url: _base_url_+"classes/Master.php?f=save_transaction",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        location.href = "./?page=transaction";
                    } else if(resp.status == 'failed' && !!resp.msg){
                        var el = $('<div>');
                        el.addClass("alert alert-danger err-msg").text(resp.msg);
                        _this.prepend(el);
                        el.show('slow');
                        $("html, body").animate({ scrollTop: _this.closest('.card').offset().top }, "fast");
                        end_loader();
                    } else {
                        alert_toast("An error occurred", 'error');
                        end_loader();
                        console.log(resp);
                    }
                }
            });
        });
    });
</script>
