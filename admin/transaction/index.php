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
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Transaction</h3>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="table-responsive">
                <table class="table table-striped table-row-dashed table-row-gray-300 align-middle gs-0 gy-4 table-bordered">
                    <colgroup>
                        <col width="3%">
                        <col width="14%">
                        <col width="10%">
                        <col width="15%">
                        <col width="15%">
                        <col width="15%">
                        <col width="10%">
                        <col width="15%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date de création</th>
                            <th>Code</th>
                            <th>Nom Expéditeur</th>
                            <th>Nom Bénéficiaire</th>
                            <th>Montant</th>
                            <th>Frais</th>
                            <th>Statut</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $i = 1;
                        $uwhere ="";
                        if($_settings->userdata('type') == 2 && $_settings->userdata('branch_id') != null)
                            $uwhere .= " where (( user_id = '{$_settings->userdata('id')}' and branch_id = '{$_settings->userdata('branch_id')}') or id in (SELECT transaction_id FROM `transaction_meta` where meta_field = 'receive_user_id' and meta_value = '{$_settings->userdata('id')}') )";
                        $qry = $conn->query("SELECT t.*, 
                            m1.meta_value as sender_lastname,
                            m2.meta_value as receiver_lastname
                            
                            FROM `transaction_list` t
                            LEFT JOIN `transaction_meta` m1 ON t.id = m1.transaction_id AND m1.meta_field = 'sender_lastname'
                            LEFT JOIN `transaction_meta` m2 ON t.id = m2.transaction_id AND m2.meta_field = 'receiver_lastname'
                            
                            {$uwhere}
                            ORDER BY t.date_created DESC ");
                        while($row = $qry->fetch_assoc()):
                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                <td><?php echo $row['tracking_code'] ?></td>
                                <td><?php echo $row['sender_lastname'] ?></td>
                                <td><?php echo $row['receiver_lastname'] ?></td>
                                <td class="text-right"><?php echo number_format($row['sending_amount']) ?></td>
                                <td class="text-right"><?php echo isset($row['fee']) ? number_format($row['fee']) : '' ?></td>
                                <td class="text-center">
                                    <?php if($row['status'] == 0): ?>
                                        <span class="badge badge-primary rounded-pill">En cours</span>
                                    <?php elseif($row['status'] == 1): ?>
                                        <span class="badge badge-success rounded-pill">Retiré</span>
                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                        Options
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu" role="menu">
                                    <?php if($row['status'] == 0): ?>
                                        <a class="dropdown-item" href="?page=transaction/receive&id=<?php echo $row['id']?>"> <span class="fa fa-hand text-green">Retiter</span></a>
                                        <?php endif; ?>
                                        <a class="dropdown-item" href="?page=transaction/view_details&id=<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> Voir</a>
                                        <?php if($row['status'] == 0): ?>
                                            <a class="dropdown-item" href="?page=transaction/send&id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editer</a>
                                        <?php endif; ?>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Supprimer</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Cette transaction sera totalement et irrécupérable, continuer?","delete_transaction",[$(this).attr('data-id')])
        })
        $('.table td,.table th').addClass('py-1 px-2 align-middle')
        $('.table').dataTable();
    })
    function delete_transaction($id){
        start_loader();
        $.ajax({
            url:_base_url_+"classes/Master.php?f=delete_transaction",
            method:"POST",
            data:{id: $id},
            dataType:"json",
            error:err=>{
                console.log(err)
                alert_toast("An error occured.",'error');
                end_loader();
            },
            success:function(resp){
                if(typeof resp== 'object' && resp.status == 'success'){
                    location.reload();
                }else{
                    alert_toast("An error occured.",'error');
                    end_loader();
                }
            }
        })
    }
</script>
