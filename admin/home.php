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

<?php 
$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : date("Y-m-d", strtotime('-6 days'));
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : date("Y-m-d");

// Fetching data from the database for each day in the last 7 days
$data = [];
$total_sending_amount_weekly = 0;
$total_fee_weekly = 0;

for ($i = 0; $i < 7; $i++) {
    $date = date("Y-m-d", strtotime("-$i days"));
    $qry = $conn->query("SELECT SUM(sending_amount) as total_sending_amount, SUM(fee) as total_fee FROM `transaction_list` WHERE DATE(date_created) = '$date'");
    $result = $qry->fetch_assoc();
    $total_sending_amount = $result['total_sending_amount'] ?: 0;
    $total_fee = $result['total_fee'] ?: 0;
    $total_sending_amount_weekly += $total_sending_amount;
    $total_fee_weekly += $total_fee;
    $data[] = [
        'date' => $date,
        'total_sending_amount' => $total_sending_amount,
        'total_fee' => $total_fee
    ];
}

$data = array_reverse($data); // Reverse the array to start from the oldest date to the newest

?>
<div class="container">
    <div class="row my-3">
        <div class="col">
            <h4>Résumé des transactions des 7 derniers jours</h4>
        </div>
    </div>
    <div class="row my-2">
        <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body">
                    <canvas id="sendingAmountChart"></canvas>
                    <p class="text-center mt-2"><strong>Total Sending Amount: </strong><?php echo number_format($total_sending_amount_weekly); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 py-1">
            <div class="card">
                <div class="card-body">
                    <canvas id="feesChart"></canvas>
                    <p class="text-center mt-2"><strong>Total des Frais 7 jours: </strong><?php echo number_format($total_fee_weekly); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx1 = document.getElementById('sendingAmountChart').getContext('2d');
    var ctx2 = document.getElementById('feesChart').getContext('2d');

    var dates = <?php echo json_encode(array_column($data, 'date')); ?>;
    var sendingAmounts = <?php echo json_encode(array_column($data, 'total_sending_amount')); ?>;
    var fees = <?php echo json_encode(array_column($data, 'total_fee')); ?>;

    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Total Sending Amount',
                data: sendingAmounts,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [{
                label: 'Total des Frais 7 jours',
                data: fees,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>

<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Transaction</h3>
    </div>
    <div class="card-body">
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
