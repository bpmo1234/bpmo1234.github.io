<head>
     <!--begin::Global Stylesheets Bundle(used by all pages)-->
     <link href="/admin/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css"/>
    <link href="/admin/assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
</head>
<?php 
$date_from = isset($_GET['date_from']) ? $_GET['date_from'] : date("Y-m-d", strtotime(date("Y-m-d"). ' -1 week'));
$date_to = isset($_GET['date_to']) ? $_GET['date_to'] : date("Y-m-d");
?>
<style>
	.hide-print {
		display: none;
	}
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Rapports</h3>
		<div class="card-tools">
			<!-- <button href="?page=history/manage_record" class="btn btn-flat btn-primary"><span class="fas fa-print"></span>  Create New</button> -->
		</div>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="col-12">
				<form action="" id="filter">
					<div class="row align-items-end">
						<div class="form-group col-md-2">
							<label for="date_from" class="control-label">Date de début</label>
							<input type="date" name="date_from" class="form-control form-control-sm" value="<?php echo $date_from ?>" required>
						</div>
						<div class="form-group col-md-2">
							<label for="date_to" class="control-label">Date de fin</label>
							<input type="date" name="date_to" class="form-control form-control-sm" value="<?php echo $date_to ?>" required>
						</div>
						<div class="form-group col-md-4">
							<button class="btn btn-flat btn-primary">Filter</button>
							<button class="btn btn-flat btn-success" type="button" id="print"><i class="fa fa-print"></i> Imprimer</button>
						</div>
					</div>
				</form>
			</div>
			<div class="container-fluid" id="print_out">
				<div class="hide-print">
					<?php if ($date_from == $date_to): ?>
						<h3 class="text-center">As of <?php echo date("F d, Y", strtotime($date_from)) ?></h3>
					<?php else: ?>
						<h3 class="text-center">As of <?php echo date("F d, Y", strtotime($date_from)) ?> - <?php echo date("F d, Y", strtotime($date_to)) ?></h3>
					<?php endif; ?>
				</div>
				<table class="table table-bordered table-striped table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
					<colgroup>
						<col width="5%">
						<col width="15%">
						<col width="20%">
						<col width="20%">
						<col width="25%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr>
							<th>#</th>
							<th>Date de création</th>
							<th>Code de Transaction</th>
							<th>Client</th>
							<th>Info</th>
							<th>Montont</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$branch_qry = $conn->query("SELECT * FROM `branch_list`");
						$res = $branch_qry->fetch_all(MYSQLI_ASSOC);
						$branch_arr = array_column($res, 'name', 'id');
						$user_qry = $conn->query("SELECT *, CONCAT(firstname, ' ', lastname) AS `name` FROM `users`");
						$user_res = $user_qry->fetch_all(MYSQLI_ASSOC);
						$user_arr = array_column($user_res, 'name', 'id');
						$i = 1;
						$uwhere = " WHERE date(date_created) BETWEEN '{$date_from}' AND '{$date_to}' ";
						if ($_settings->userdata('type') == 2 && $_settings->userdata('branch_id') != null)
							$uwhere .= " AND (( user_id = '{$_settings->userdata('id')}' AND branch_id = '{$_settings->userdata('branch_id')}' ) OR id IN (SELECT transaction_id FROM `transaction_meta` WHERE meta_field = 'receive_user_id' AND meta_value = '{$_settings->userdata('id')}' ))";
						$sql = "SELECT * FROM `transaction_list` {$uwhere} ORDER BY unix_timestamp(`date_created`) DESC ";
						$qry = $conn->query($sql);
						while ($row = $qry->fetch_assoc()):
							$meta = array();
							$qry_meta = $conn->query("SELECT * FROM transaction_meta WHERE transaction_id = '{$row['id']}'");
							while ($mrow = $qry_meta->fetch_array()) {
								$meta[$mrow['meta_field']] = $mrow['meta_value'];
							}
							$sender_name = (isset($meta['sender_firstname']) ? $meta['sender_firstname'] : '') . ' ' . 
										   (isset($meta['sender_middlename']) ? $meta['sender_middlename'] : '') . ' ' . 
										   (isset($meta['sender_lastname']) ? $meta['sender_lastname'] : '');
							$receiver_name = (isset($meta['receiver_firstname']) ? $meta['receiver_firstname'] : '') . ' ' . 
											 (isset($meta['receiver_middlename']) ? $meta['receiver_middlename'] : '') . ' ' . 
											 (isset($meta['receiver_lastname']) ? $meta['receiver_lastname'] : '');
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
								<td><?php echo $row['tracking_code'] ?></td>
								<td><?php echo $sender_name ?></td>
								<td class="lh-1">
									<span class="text-muted">Processed By:</span> <span><?php echo isset($row['user_id']) ? $user_arr[$row['user_id']] : '' ?></span> <br>
									<span class="text-muted">Processed At:</span> <span><?php echo isset($row['branch_id']) ? $branch_arr[$row['branch_id']] : '' ?></span> <br>
									<?php if ($row['status'] == 0): ?>
										<span class="text-muted">Status: </span><span class="badge badge-primary rounded-pill">Pending</span>
									<?php elseif ($row['status'] == 1): ?>
										<span class="text-muted">Received At:</span> <span><?php echo isset($meta['received_branch_id']) ? $branch_arr[$meta['received_branch_id']] : '' ?></span> <br>
										<span class="text-muted">Processed (R) By:</span> <span><?php echo isset($meta['receive_user_id']) ? $user_arr[$meta['receive_user_id']] : '' ?></span> <br>
										<span class="text-muted">Status: </span><span class="badge badge-success rounded-pill">Received</span>
									<?php endif; ?>
								</td>
								<td class="text-right"><?php echo number_format($row['sending_amount'] + $row['fee'], 2) ?></td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(function(){
		$('#filter').submit(function(e){
			e.preventDefault();
			location.href = "./?page=reports&" + $(this).serialize();
		});
		$('#print').click(function(){
			start_loader();
			var _el = $('<div>');
			var _head = $('head').clone();
			_head.find('title').text("Transaction Details - Print View");
			var p = $('#print_out').clone();
			p.find('hr.border-light').removeClass('border-light').addClass('border-dark');
			p.find('.btn').remove();
			_el.append(_head);
			_el.append('<div class="d-flex justify-content-center">' +
				'<div class="col-1 text-right">' +
				'<img src="<?php echo validate_image($_settings->info('logo')) ?>" width="65px" height="65px" />' +
				'</div>' +
				'<div class="col-10">' +
				'<h4 class="text-center"><?php echo $_settings->info('name') ?></h4>' +
				'<h4 class="text-center">Transaction Report</h4>' +
				'</div>' +
				'<div class="col-1 text-right">' +
				'</div>' +
				'</div><hr/>');
			_el.append(p.html());
			var nw = window.open("", "", "width=1200,height=900,left=250,location=no,titlebar=yes");
			nw.document.write(_el.html());
			nw.document.close();
			setTimeout(() => {
				nw.print();
				setTimeout(() => {
					nw.close();
					end_loader();
				}, 200);
			}, 500);
		});
	});
</script>
