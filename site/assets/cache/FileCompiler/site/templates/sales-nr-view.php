<?php include(\ProcessWire\wire('files')->compile('partials/_sales_header.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 

$updateSuccess = "";

if ($input->post->update_status) {

	$parent = $pages->get("id={$input->urlSegment1}");
	$p = new \ProcessWire\Page();
	$p->template = "app_status";
	$p->parent = $parent;
	$p->of(false);
	$p->title = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10)));
	$p->app_status = $input->post->app_status;
	$p->app_status_client_id = $input->post->app_status_client_id;
	$p->app_status_date = $input->post->app_status_date;
	$p->app_status_process = $input->post->app_status_process;
	$p->app_status_segment = $input->post->app_status_segment;
	$p->app_status_callback_time = $input->post->app_status_callback_time;
	$p->app_status_comment = $input->post->app_status_comment;
	$p->app_status_reject_reason = $input->post->app_status_reject_reason;
	$p->app_status_reject_reason_other = $input->post->app_status_reject_reason_other;
	
	$p->save();
	//now update parent to include same status
	$parent->of(false);
	$parent->app_status = $input->post->app_status;
	$parent->app_status_process = $input->post->app_status_process;
	$parent->save();
	
	$updateSuccess = "Status updated successfully.";
}

if ($input->post->travel_submit) {

	$parent = $pages->get("id={$input->urlSegment1}");

	$tp = new \ProcessWire\Page();
	$tp->template = "app_status";
	$tp->parent = $parent;
	$tp->of(false);
	$tp->title = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10)));
	$tp->stat = $input->post->month."-".$input->post->year;
	$tp->save();
	$updateSuccess = "Travel plan updated successfully.";
}

?>
<div class="uk-container uk-container-large uk-text-small" data-uk-height-viewport="expand: true">
	<?php $p = $pages->get("id={$input->urlSegment1}"); ?>
	
	<!-- <div class="uk-padding-small uk-padding-remove-horizontal uk-flex uk-flex-right">
		<a href="<?=$pages->get("id=25925")->url?>nri/edit/?id=<?=$p->id?>&view=iframe" class="uk-button uk-button-primary uk-border-rounded"><span uk-icon="icon:pencil;ratio:0.9"></span> Edit</a>	
	</div> -->
	<div class="uk-grid uk-grid-small">
		<div class="uk-width-1-2">
			<table class="uk-table uk-table-divider uk-table-border uk-table-striped uk-table-hover">
				<tr>
					<th colspan="2" class="uk-text-center">Query Details</th>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Reference</td>
					<td class="">&nbsp;<?=$p->unique_id?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Product Type</td>
					<td class="">&nbsp;<?=$p->nri_product?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Travelling Plan</td>
					<td class="uk-position-relative">&nbsp;<?=$p->stat?>
					<?php if ($user->hasRole('tl') || $user->hasRole('rm')) { ?>
						<a href="#travelPlan" class="uk-icon-link uk-margin-small-right uk-position-center-right" uk-icon="file-edit" uk-toggle></a>
					<?php } ?>
					</td>
				</tr>
				<tr id="travelPlan" hidden>
					<td colspan="2">
						<div class="uk-width-1-1">
							<form class="uk-grid uk-grid-small" action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post">
								<div class="uk-width-expand">
									<select name="month" id="month" class="uk-select">
										<option value="Jan">January</option>
										<option value="Feb">February</option>
										<option value="Man">March</option>
										<option value="Apr">April</option>
										<option value="May">May</option>
										<option value="Jun">June</option>
										<option value="Jul">July</option>
										<option value="Aug">August</option>
										<option value="Sep">September</option>
										<option value="Oct">October</option>
										<option value="Nov">November</option>
										<option value="Dec">December</option>
									</select>
								</div>
								<div class="uk-width-expand">
									<select name="year" id="year" class="uk-select">
										<option>2020</option>
										<option>2021</option>
										<option>2022</option>
									</select>
								</div>
								<div class="uk-width-expand">
									<input type="submit" class="uk-button uk-button-primary uk-button-rounded" name="travel_submit" value="Save"/>
								</div>
							</form>
						</div>
					</td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Customer Name</td>
					<td class="">&nbsp;<?=$p->fname." ".$p->lname?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Mobile Number</td>
					<td class="">&nbsp;<?=$p->mobile?><br/><?=$p->alternate_contact?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Email</td>
					<td class="">&nbsp;<?=$p->email?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Assigned to</td>
					<td class=""><?php
					if ($p->assigned_to) {
						echo $p->assigned_to->title;
					}else{
						echo "Not assigned";
					}
					?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Entry Date</td>
					<td class="">&nbsp;<?=date('d-m-y G:i', $p->created);?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Last Updated</td>
					<td class="">&nbsp;<?=date('d-m-y G:i', $p->modified);?></td>
				</tr>
				<tr>
					<td class="uk-text-right uk-text-blue">Status</td>
					<td class="">&nbsp;<?php
					if ($p->child("sort=-id")->app_status != "") {
						echo $p->child("sort=-id")->app_status->title;
					}else{
						echo "Fresh";
					}
					?></td>
				</tr>
				<?php if ($p->child("sort=-id")->app_status_client_id != ""): ?>
					<tr>
						<td class="uk-text-right uk-text-blue">Client ID</td>
						<td><?=$p->child("sort=-id")->app_status_client_id?></td>
					</tr>	
				<?php endif ?>
				<?php if ($p->child("sort=-id")->app_status_date != ""): ?>
					<tr>
						<td class="uk-text-right uk-text-blue">Account opening date</td>
						<td><?=$p->child()->app_status_date?></td>
					</tr>	
				<?php endif ?>
				<?php if ($p->child("sort=-id")->app_status_segment != ""): ?>
					<tr>
						<td class="uk-text-right uk-text-blue">Segment</td>
						<td><?=$p->child()->app_status_segment->title?></td>
					</tr>	
				<?php endif ?>
				<?php if ($p->child("sort=-id")->app_status_comment != ""): ?>
					<tr>
						<td class="uk-text-right uk-text-blue">Comment</td>
						<td><?=$p->child("sort=-id")->app_status_comment?></td>
					</tr>	
				<?php endif ?>
			</table>
		</div>
		<div class="uk-width-1-2">
			<table class="uk-table uk-table-border uk-table-divider uk-table-striped uk-table-hover">
				<tr>
					<th colspan="2" class="uk-text-center">Call Details</th>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Call End Time</td>
					<td class="uk-width-1-2"><?=date('d-m-y h:i a', $p->modified);?></td>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Call Status</td>
					<td class="uk-width-1-2">-NA-</td>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Call LMS User</td>
					<td class="uk-width-1-2">-NA-</td>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Next Call Time</td>
					<td class="uk-width-1-2"></td>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Call Description</td>
					<td class="uk-width-1-2">Fresh Entry</td>
				</tr>
				<tr>
					<td class="uk-width-1-2 uk-text-right uk-text-blue">Doc Pickup Time</td>
					<td class="uk-width-1-2"></td>
				</tr>
			</table>
			<?php 
			if ($user->hasRole('tl') || $user->hasRole('rm')) {
				
				switch ($input->get->source) {
					case 'success':
						//echo "success";
						break;
					case 'reject':
						//echo "reject";
						break;
					default: ?>
					<hr class="uk-hr" />
					<div class="uk-panel uk-padding-small uk-background-muted">
						<h3 class="uk-h4">Update Status</h3>
						<div class="uk-width-1-1">
							<?php 
								$f = $fields->get("id=202");
								$status_options = $f->type->getOptions($f);
							?>
							<select id="status_update" class="uk-select">
								<option value="">Select</option>
								<?php foreach ($status_options as $so): ?>
									<option value="<?=$so->id?>"><?=$so->title?></option>
								<?php endforeach ?>
							</select>
							<form action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post" id="status_1" class="uk-margin stat_update_form uk-grid uk-grid-small" style="display: none">
								<input type="hidden" name="app_status" value="1" />
								<div class="uk-margin-small uk-width-1-2">
									<select id="app_status_process" class="uk-select" name="app_status_process" tabindex="1" required>
										<option>Select process status</option>
										<?php 
											$r = $fields->get("id=212");
											$reject_options = $r->type->getOptions($r);
										?>
										<?php foreach ($reject_options as $ro): ?>
											<option value="<?=$ro->id?>"><?=$ro->title?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="uk-margin-small uk-width-1-2 follow-up-fields" style="display: none">
									<input type="text" class="uk-input calendar" tabindex="2" placeholder="Callback Date" name="app_status_date" />
								</div>
								<div class="uk-margin-small uk-width-1-2 follow-up-fields" style="display: none">
									<select id="callback_time" class="uk-select" name="app_status_callback_time" tabindex="3" />
										<option value="">Select Time</option>
										<?php 
										$t = $fields->get("id=210");
										$time_options = $t->type->getOptions($t);
										foreach ($time_options as $to): ?>
											<option value="<?=$to->id?>"><?=$to->title?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="uk-margin-small uk-width-1-2">
									<textarea class="uk-textarea" rows="2" name="app_status_comment" placeholder="Comments" tabindex="1" autofocus></textarea>	
								</div>
								<div class="uk-margin-small uk-width-1-1 uk-text-center">
									<input type="submit" name="update_status" class="uk-button uk-button-primary" value="Update" tabindex="2" />
								</div>
							</form>
							<form action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post" id="status_2" class="uk-margin stat_update_form uk-grid uk-grid-small" style="display: none">
								<input type="hidden" name="app_status" value="2" />
								<div class="uk-margin-small uk-width-1-2">
									<select id="reject_reason" class="uk-select" name="app_status_reject_reason" tabindex="1" required>
										<option>Select reason</option>
										<?php 
											$r = $fields->get("id=207");
											$reject_options = $r->type->getOptions($r);
										?>
										<?php foreach ($reject_options as $ro): ?>
											<option value="<?=$ro->id?>"><?=$ro->title?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="uk-margin-small uk-width-1-2">
									<input type="text" id="rejectOther" class="uk-input" tabindex="2" placeholder="Other reject reason" name="app_status_reject_reason_other" style="display: none;"/>
								</div>
								<div class="uk-margin-small uk-width-1-1">
									<textarea class="uk-textarea" rows="2" name="app_status_comment" placeholder="Comments" tabindex="3"></textarea>
								</div>
								<div class="uk-margin-small uk-width-1-1 uk-text-center">
									<input type="submit" name="update_status" class="uk-button uk-button-primary" value="Update" tabindex="4" />
								</div>
							</form>
							<form action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post" id="status_3" class="uk-margin stat_update_form uk-grid uk-grid-small" style="display: none">
								<div class="uk-margin-small uk-width-1-2">
									<input type="hidden" name="app_status" value="3" />
									<input type="text" class="uk-input" tabindex="1" placeholder="Client ID" name="app_status_client_id" required minlength="12" maxlength="18" autofocus />
								</div>
								<div class="uk-margin-small uk-margin-remove-top uk-width-1-2">
									<input type="text" id="fromDate" class="uk-input" tabindex="2" placeholder="Date of account opening" name="app_status_date" required/>
								</div>
								<div class="uk-margin-small uk-width-1-2">
									<select id="status_update" class="uk-select" name="app_status_segment" tabindex="3" required>
										<option value="">Select Segment</option>
										<option>Priority</option>
										<option>Premium</option>
										<option>Personal</option>
									</select>
								</div>
								<div class="uk-margin-small uk-width-1-2">
									<textarea class="uk-textarea" rows="1" name="app_status_comment" placeholder="Comments" tabindex="4" required></textarea>	
								</div>
								<div class="uk-margin uk-text-center uk-width-1-1">
									<input type="submit" name="update_status" class="uk-button uk-button-primary" value="Update" tabindex="5" />
								</div>
							</form>
							<form action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post" id="status_5" class="uk-margin stat_update_form uk-grid uk-grid-small" style="display: none">
								<div class="uk-margin-small uk-margin-remove-top uk-width-1-2">
									<input type="hidden" name="app_status" value="5" />
									<input type="text" class="uk-input calendar" tabindex="2" placeholder="Callback Date" name="app_status_date" required/>
								</div>
								<div class="uk-margin-small uk-margin-remove-top uk-width-1-2">
									<select id="callback_time" class="uk-select" name="app_status_callback_time" tabindex="3" required>
										<option value="">Select Time</option>
										<?php 
										$t = $fields->get("id=210");
										$time_options = $t->type->getOptions($t);
										foreach ($time_options as $to): ?>
											<option value="<?=$to->id?>"><?=$to->title?></option>
										<?php endforeach ?>
									</select>
								</div>
								<div class="uk-margin-small uk-width-1-1">
									<textarea class="uk-textarea" rows="1" name="app_status_comment" placeholder="Comments" tabindex="4" required></textarea>	
								</div>
								<div class="uk-margin uk-text-center uk-width-1-1">
									<input type="submit" name="update_status" class="uk-button uk-button-primary" value="Update" tabindex="5" />
								</div>
							</form>
							<form action="<?=$page->url.$input->urlSegment1?>?view=iframe" method="post" id="status_6" class="uk-margin stat_update_form uk-grid uk-grid-small" style="display: none">
								<input type="hidden" name="app_status" id="app_status_rest" value="" />
								<div class="uk-margin-small uk-width-1-1">
									<textarea class="uk-textarea" rows="1" name="app_status_comment" placeholder="Comments" tabindex="1"></textarea>	
								</div>
								<div class="uk-text-center uk-width-1-1">
									<input type="submit" name="update_status" class="uk-button uk-button-primary" value="Update" tabindex="2" />
								</div>
							</form>
						</div><!-- width-medium -->

						<?php if ($updateSuccess != ""): ?>
						<div class="uk-margin">					
							<div id="update_alert" class="uk-alert uk-alert-success uk-text-center"><?=$updateSuccess;?></div>
						</div>
						<?php endif ?>
					</div>
			<?php	
				break;
				} 
			}//user role tl or tm
			?>
		</div>
		<div class="uk-width-1-1 uk-margin-top"><hr class="uk-hr"/>
			<table class="uk-table uk-table-divider uk-table-border uk-table-striped uk-table-hover uk-margin-bottom">
				<tr class="uk-text-center">
					<th>Call Date & Time</th>
					<th>Call Status</th>
					<th>Call LMS User</th>
					<th>Next Call Time</th>
					<th>Call Description</th>
					<th>Doc Pickup Time</th>
					<th>Comments</th>
				</tr>
				<?php if ($p->count() > 0): ?>
					<?php foreach ($p->children("sort=-id") as $log): ?>
					<tr>
						<td width="10%"><?php echo date('d-m-y G:i', $log->created); ?></td>
						<td width="15%"><?=$log->app_status->title?></td>
						<td width="15%"><?=$log->createdUser->title?></td>
						<td width="15%"><?=$log->app_status_date." ".$log->app_status_callback_time->title?></td>
						<td width="15%"><?php if($log->stat != ""){echo "Travel Plan: ".$log->stat;}else{$log->app_status_comment;}?></td>
						<td width="10%"></td>
						<td width="20%"><?=$log->app_status_comment?></td>
					</tr>
					<?php endforeach ?>
				<?php else: ?>
					<tr>
						<td colspan="6" class="uk-text-muted"><i>No records found.</i></td>
					</tr>
				<?php endif ?>
			</table>
		</div>
	</div>
	
</div><!-- uk-container -->
<?php include(\ProcessWire\wire('files')->compile('partials/_sales_footer.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>