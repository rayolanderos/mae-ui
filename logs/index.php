<?php 
$page_id = 2; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<table id="log-table" class="table table-striped table-condensed">
					<thead>
						<tr>
							<th colspan="2">
								<form class="form-inline">
									<label>Sort by:</label>
									<select>
										<option>Date</option>
										<option>Title</option>
										<option>Number</option>
									</select>
									<label>Order by:</label>
									<select>
										<option>Desc</option>
										<option>Asc</option>
									</select>
								</form>

							</th>
							<th colspan="4">
								<button class="btn btn-primary pull-right">Add new text entry <i class="fa fa-plus" aria-hidden="true"></i></button>
							</th>
						</tr>
						<?php $logs =  get_mae_api();  ?>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th class="tc">Input</th>
							<th class="tc">Type</th>
							<th> Content </th>
							<th class="tc"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($logs as $key => $log) { 
							if($log->type != "test" ) { ?>
								<tr id="<?php echo $log->id;?>">
									<!-- <td class="favorite"><i class="fa fa-star" aria-hidden="true"></i></td> -->
									<td><?php echo str_pad($key, 4, '0', STR_PAD_LEFT); ?></td>
									<td><?php echo format_date($log->date)?></td>
									<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
									<td class="tc" class="<?php echo $log->type;?>"><i class="fa <?php echo get_journal_type_icon($log->type);?>" aria-hidden="true"></i></td>
									<td><?php echo get_value_display($log->value, $log->type); ?>
									<td class="tc">
										<a href="javascript:void(0);" class="remove-btn btn" data="<?php echo $log->id;?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</td>
								</tr>
							<?php } 
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="pagination">
									<ul>
										<li><a href="#">&laquo;</a></li>
										<li><a href="#">1</a></li>
										<li class="active"><a href="#">2</a></li>
										<li class="disabled"><a href="#">...</a></li>
										<li><a href="#">6</a></li>
										<li><a href="#">7</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</section>
		</div>
		<?php //var_dump($logs); ?>
	</div>
</body>

</html>