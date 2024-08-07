<?php 
 $qry = $conn->query("SELECT * from `transaction_list` where id = '{$_GET['id']}' ");
 if($qry->num_rows > 0){
     foreach($qry->fetch_assoc() as $k => $v){
         $$k=$v;
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
$user_qry =$conn->query("SELECT *,concat(firstname,' ',lastname) as `name` FROM `users`");
$user_res = $user_qry->fetch_all(MYSQLI_ASSOC);
$user_arr = array_column($user_res,'name','id');
?>

<div class="card card-outline card-primary">
    <div class="card-header d-flex">
        <h5 class="card-title col-auto flex-grow-1">Transaction's Details</h5>
        <div class="col-auto">
        <button class="btn btn-sm btn-success btn-flat mr-2" type="button" id="print"><i class="fa fa-print"></i> Print</button>
        <button class="btn btn-sm btn-success btn-flat mr-2" type="button" id="print2"><i class="fa fa-print"></i> Print Hot</button>    
    </div>
    </div>
    <div class="card-body">
        <div class="container-fluid" id="print_out">
        <div id='transaction-printable-details' class='position-relative'>
            <?php if($status == 1): ?>
            <style>
                #transaction-printable-details:before {
                    content: 'RECEIVED';
                    color: #f5f5f5;
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
            <?php endif; ?>
            <div id="invoice" class="p-5 hide-invoice">
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
<!-- FIN IMPRESSION -->

<script>
    $(function(){
        $('.table td,.table th').addClass('py-1 px-2 align-middle')

        $('#print').click(function(){
            start_loader()
            var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Transaction Details - Print View")
            var p = $('#print_out').clone()
            p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            p.find('.btn').remove()
            _el.append(_head)
            _el.append('<div class="d-flex justify-content-center">'+
                      '<div class="col-1 text-right">'+
                      '</div>'+
                      '<div class="col-10">'+
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
                         }, 200);
                     }, 500);
        })

        $('#print2').click(function(){
            start_loader()
            var _el = $('<div>')
            var _head = $('head').clone()
                _head.find('title').text("Transaction Details - Print View")
            var p = $('#print_out').clone()
            p.find('hr.border-light').removeClass('.border-light').addClass('border-dark')
            p.find('.btn').remove()
            p.find('img').remove() // Add this line to remove images directly
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
                         }, 200);
                     }, 500);
        })
    })
</script>

<style>
.resize-img {
    height: 50px; 
    width: auto;
}
</style>
