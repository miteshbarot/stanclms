<?php namespace Processwire;
include 'partials/_sales_header.php'; 
include 'partials/_check_login.php'; 

if ($input->post->disposition) {
	$lead = $input->post->lead;
	$disp = $input->post->disposition;
	$summary = $input->post->comment;

	$parent = $pages->get("id={$lead}");
	$parent->of(false);
	$parent->disposition = $disp;
	$parent->save();


	$lp = new Page();
	$lp->template = "disposition";
	$lp->parent = $parent;
	$lp->title = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10)));
	$lp->of(false);
	$lp->disposition = $disp;
	$lp->summary = $summary;
	$lp->save();
}

?>
<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
	<?php if ($user->hasRole('superuser') || $user->hasRole('marketing')): ?>
	<div class="uk-margin">
		<ul class="uk-tab uk-text-bold">
			<li><a href="<?=$pages->get("id=25925")->url?>">Dashboard</a></li>
			<li class="uk-active"><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>report/source-reports/">Source Reports</a></li>
			<?php if (!$user->hasRole('sales-executive')): ?>
				<li><a href="<?=$pages->get("id=25925")->url?>report/my-exports/">My Exports</a></li>
			<?php endif ?>
		</ul>
	</div>
	<?php endif ?>

	<div class="uk-panel">
		<h1 class="uk-h2 uk-margin-bottom uk-text-light">Personal Loan</h1>
		<ul class="uk-tab uk-text-bold">
			<?php
			$nav = array(
				array('url' => "", "title" => "Call Process" ),
				array('url' => "call-reject", "title" => "Call Reject" ),
				array('url' => "doc-process", "title" => "Doc Process" ),
				array('url' => "doc-reject", "title" => "Doc Reject" ),
				array('url' => "dip-process", "title" => "Dip Process" ),
				array('url' => "dip-reject", "title" => "Dip Reject" ),
				array('url' => "dispatch", "title" => "Dispatch" ),
				array('url' => "follow-up", "title" => "Follow up" ),
			);

			for ($i=0; $i < count($nav); $i++) { 
				if ($nav[$i]['url'] == $input->urlSegment1) {
					$class = "uk-active";
				}else{
					$class = "";
				} ?>

			<li class="<?=$class?>"><a href="<?=$page->url.$nav[$i]['url']?>"><?=$nav[$i]['title']?></a></li>

			<?php } ?>
		</ul>

		<div class="uk-margin">
			<div class="uk-card uk-card-body uk-card-small uk-card-default">
				<div class="uk-flex uk-flex-middle uk-flex-between">
					<a href="#filtersForm" class="uk-display-block uk-width-expand" uk-toggle><h1 class="uk-h4 uk-text-blue uk-margin-remove">Filter Card Applications</h1></a>
					<a href="#filtersForm" class="uk-icon-link uk-margin-small-right" uk-icon="icon:chevron-down;ratio:1.5" uk-toggle></a>
				</div>
				<form action="./" method="get" id="filtersForm" class="uk-margin-top" hidden>
				<div class="uk-grid uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2">
					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">App Code</div>
							<input type="text" class="uk-input" tabindex="1" name="app_code" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">City</div>
							<!-- <select name="city" class="uk-select" tabindex="2">
								<option>All</option>
							</select> -->
							<input type="text" class="uk-input" tabindex="2" name="City" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter from Date <span class="uk-text-small uk-text-muted">(applied after)</span></div>
							<input type="text" class="uk-input" tabindex="3" name="from_date" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter to Date <span class="uk-text-small uk-text-muted">(applied before)</span></div>
							<input type="text" class="uk-input" tabindex="4" name="to_date" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Credit Card</div>
							<select name="cc" class="uk-select" tabindex="5">
								<option>All</option>
								<?php foreach ($pages->get("id=25926")->children as $c): ?>
									<option value="<?=$c->id?>"><?=$c->title?></option>
								<?php endforeach ?>
							</select>
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">PAN <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="6" name="pan" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Firstname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="7" name="firstname" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Lastname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="8" name="lastname" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Loan Status</div>
							<select name="loan_status" class="uk-select" tabindex="9">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Mobile number</div>
							<input type="tel" class="uk-input" tabindex="10" name="mobile" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Email ID <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="email" class="uk-input" tabindex="11" name="email" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Lead Source</div>
							<select name="lead_source" class="uk-select" tabindex="12">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-width-1-1 uk-text-center uk-margin">
						<input type="submit" class="uk-button uk-button-primary" value="Search" name="submit" />
						<?php if (!$user->hasRole('sales-executive')): ?>
							<a href="<?=$tpl?>assets/cc_export.xlsx" type="button" class="uk-button uk-button-secondary" download>Export</a>
						<?php endif ?>
					</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Getting Leads -->
		<?php
		switch ($input->urlSegment1) {
			case 'call-reject':
				$count = $pages->count("template=lead_template,product=1,disposition=5|6|7|8|9|10|11|12|13|14|15|16");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=5|6|7|8|9|10|11|12|13|14|15|16,sort=-id,limit=10");
				break;
			case 'follow-up':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=1");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=1,sort=-id,limit=10");
				break;
			case 'doc-process':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=17|18|19|20|21");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=17|18|19|20|21,sort=-id,limit=10");
				break;
			case 'doc-reject':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=23|24|25|26|27|28|29|30|31|32|33");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=23|24|25|26|27|28|29|30|31|32|33,sort=-id,limit=10");
				break;
			case 'dip-process':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=34|35|36");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=34|35|36,sort=-id,limit=10");
				break;
			case 'dip-reject':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=37|38|39|40");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=37|38|39|40,sort=-id,limit=10");
				break;
			case 'dispatch':
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition=41|42|43|44,");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition=41|42|43|44,sort=-id,limit=10");
				break;
			default:
				$count = $pages->count("template=lead_template|aggregator_lead_template,product=1,disposition='',");
				$leads = $pages->find("template=lead_template|aggregator_lead_template,product=1,disposition='',sort=-id,limit=10");
				break;
		}
		
		$pagination = $leads->renderPager();
		?>
		<!-- End of getting leads -->
		<div class="list-wrap">
			<h4 class="uk-h5">Showing <?=count($leads)?> of <?=$count?></h4>
			<div class="uk-overflow-auto">
				<table class="uk-table uk-text-small uk-table-striped uk-table-hover uk-table-divider">
					<tr>
						<th style="width: 50px" class="uk-text-center">#</th>
						<th style="width: 100px">App. Entry</th>
						<th style="width: 50px">App Code / AIP No.</th>
						<th style="width: 100px">Name<br/>Contact</th>
						<th style="width: 60px">City</th>
						<th style="width: 100px">Application Details</th>
						<th style="width: 100px">Applicant Type</th>
						<!-- <th style="width: 50px">Lock / Unlock</th> -->
						<th style="width: 100px">Status</th>
						<th style="width: 100px">AIP Status</th>
						<th style="width: 50px">PAN</th>
						<th style="width: 50px">View</th>
					</tr>
					<?php foreach ($leads as $l): ?>
					<?php
					//find city
					$city = $pages->get("template=cc_location_master,title={$l->pincode}");
					?>
					<tr>
						<td><?=$l->unique_id?></td>
						<td><?=date('d-M-y g:i',$l->created)?><br/>(Mobile Form)<br/>(N)</td>
						<td></td>
						<td>
							<div><?=$l->fname." ".$l->lname?></div>
							<div><?=$l->email?></div>
							<div><?=$l->mobile?> 
								<?php if ($l->otp_status): ?>
									<span class="uk-badge badge-green" uk-icon="icon:check;ratio: 1"></span>
									<?php else: ?>
									<span class="uk-badge" uk-icon="icon:close;ratio: 1"></span>
								<?php endif ?>
							</div>
						</td>
						<td><?=$city->city?> <!--Pull from Master--></td>
						<td>
							<div>Loan Amount: <b><?=$l->loan_amount?></b></div>
							<div>Tenure: <b><?=$l->tenure?> years</b></div>
							<div>Interest Rate: <b><?=$l->interest_rate?>%</b></div>
							<div>EMI: <b><?=$l->emi_amount?></b></div>
						</td>
						<td><?=$l->employment_type->title?></td>
						<!-- <td><a href="#" class="uk-label uk-label-large uk-label-default uk-text-uppercase">Lock</a></td> -->
						<td><div><?php echo $l->child->disposition->title;?></div>
							<div>
								<form method="post" action="<?=$page->url.$input->urlSegment1?>">
									<input type="hidden" name="lead" value="<?=$l->id?>" />
									<select name="disposition" id="disposition" class="uk-select uk-select-small" onchange="this.form.submit()">
										<option>Change Status</option>
										<?php
										switch ($input->urlSegment1) {
											case 'call-reject': ?>
												<option value="5">Fake Lead</option>
												<option value="6">Wrong Number</option>
												<option value="7">No office landline</option>
												<option value="8">Duplicate</option>
												<option value="9">NMC Profile</option>
												<option value="10">Low Income</option>
												<option value="11">No Documentation</option>
												<option value="12">Not Interested</option>
												<option value="13">Negative Company</option>
												<option value="14">Permanently not contactable</option>
												<option value="15">Already applied</option>
												<option value="16">Other criteria not met</option>
										<?php	break;
											case 'follow-up': ?>
												<option value="10">Low Income</option>
												<option value="11">No Documentation</option>
												<option value="12">Not Interested</option>
												<option value="13">Negative Company</option>
										<?php	break;
											case 'doc-process': ?>
												<option value="17">Appointment fixed</option>
												<option value="18">Appointment confirmed</option>
												<option value="19">Rescheduled</option>
												<option value="20">Doc Process Follow up</option>
												<option value="21">Customer no docs</option>
												<option value="22">Customer not available</option>
										<?php	break;
											case 'doc-reject': ?>
												<option value="23">No Documentation</option>
												<option value="24">Fake lead</option>
												<option value="25">No original</option>
												<option value="26">Incomplete documents</option>
												<option value="27">Permanently not contactable/responding</option>
												<option value="28">Negative Company</option>
												<option value="29">NMC profile</option>
												<option value="30">AIP Rejected</option>
												<option value="31">Negative Industry</option>
												<option value="32">Norms not met</option>
												<option value="33">Low Income</option>
										<?php	break;
											case 'dip-process': ?>
												<option value="34">Passed to dip checker</option>
												<option value="35">Require additional documents</option>
												<option value="36">Pending</option>
										<?php	break;
											case 'dip-reject': ?>
												<option value="37">Docs not valid</option>
												<option value="38">Negative area/OCL</option>
												<option value="39">Dip Reject Low Income</option>
												<option value="40">Negative profile</option>
										<?php	break;
											case 'dispatch': ?>
												<option value="41">Dispatched</option>
												<option value="42">Login</option>
												<option value="43">Approved</option>
												<option value="44">Declined</option>
										<?php	break;	
											default: ?>
												<optgroup label="Call Process">
													<option value="1">Follow up</option>
													<option value="2">Ringing</option>
													<option value="3">No Response</option>
													<option value="4">Moved back to sales</option>
												</optgroup>
												<optgroup label="Call Reject">
													<option value="5">Fake Lead</option>
													<option value="6">Wrong Number</option>
													<option value="7">No office landline</option>
													<option value="8">Duplicate</option>
													<option value="9">NMC Profile</option>
													<option value="10">Low Income</option>
													<option value="11">No Documentation</option>
													<option value="12">Not Interested</option>
													<option value="13">Negative Company</option>
													<option value="14">Permanently not contactable</option>
													<option value="15">Already applied</option>
													<option value="16">Other criteria not met</option>
												</optgroup>
												<optgroup label="Doc Process">
													<option value="17">Appointment fixed</option>
													<option value="18">Appointment confirmed</option>
													<option value="19">Rescheduled</option>
													<option value="20">Doc Process Follow up</option>
													<option value="21">Customer no docs</option>
													<option value="22">Customer not available</option>
												</optgroup>
												<optgroup label="Doc Reject">
													<option value="23">No Documentation</option>
													<option value="24">Fake lead</option>
													<option value="25">No original</option>
													<option value="26">Incomplete documents</option>
													<option value="27">Permanently not contactable/responding</option>
													<option value="28">Negative Company</option>
													<option value="29">NMC profile</option>
													<option value="30">AIP Rejected</option>
													<option value="31">Negative Industry</option>
													<option value="32">Norms not met</option>
													<option value="33">Low Income</option>
												</optgroup>
												<optgroup label="Dip Process">
													<option value="34">Passed to dip checker</option>
													<option value="35">Require additional documents</option>
													<option value="36">Pending</option>
												</optgroup>
												<optgroup label="Dip Reject">
													<option value="37">Docs not valid</option>
													<option value="38">Negative area/OCL</option>
													<option value="39">Dip Reject Low Income</option>
													<option value="40">Negative profile</option>
												</optgroup>
												<optgroup label="Dispatch">
													<option value="41">Dispatched</option>
													<option value="42">Login</option>
													<option value="43">Approved</option>
													<option value="44">Declined</option>
												</optgroup>
										<?php	break;
										} ?>
									</select>
								</form>
							</div>
						</td>
						<td>
							<div><?php echo !empty($l->stat && $l->stat == 'APPROVE') ? $l->stat : '-';  ?></div>
							<div><?php echo !empty($l->aip_ref_number) ? $l->aip_ref_number : '-';  ?></div>
								
							</td>
						<td><?=$l->pan?></td>
						<td>
							<div uk-lightbox>
								<a href="<?=$page->url?>edit/?u=<?=$l->id?>&view=iframe" title="Edit" class="uk-button uk-button-small uk-button-default" data-type="iframe">View</a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div><!-- overflow-auto -->

			<div class="uk-margin-medium uk-flex-center">
				<?=$pagination?>
			</div>
		</div><!-- list-wrap -->
	</div><!-- uk-section -->
</div><!-- uk-container -->
<?php include 'partials/_sales_footer.php'; ?>