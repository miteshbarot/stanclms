<?php
if ($input->post->assign_user) {
	$id = $input->post->id;
	$assign_user = $input->post->assign_user;

	$lead = $pages->get("id={$id}");
	$lead->of(false);
	$lead->assigned_to = $assign_user;
	$lead->save();
	$session->redirect($page->url);
}

 include(\ProcessWire\wire('files')->compile('partials/_sales_header.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
 include(\ProcessWire\wire('files')->compile('partials/_check_login.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
?>

<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">

	<?php if ($user->hasRole('superuser') || $user->hasRole('marketing')): ?>
		<div class="uk-margin">
			<ul class="uk-tab uk-text-bold">
				<li><a href="<?=$pages->get("id=25925")->url?>">Dashboard</a></li>
				<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
				<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
				<li class="uk-active"><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
				<li><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
				<li><a href="<?=$pages->get("id=25925")->url?>report/source-reports/">Source Reports</a></li>
				<?php if (!$user->hasRole('sales-executive')): ?>
					<li><a href="<?=$pages->get("id=25925")->url?>report/my-exports/">My Exports</a></li>
				<?php endif ?>
			</ul>
		</div>
	<?php endif ?>
	
	<div class="uk-panel">
		<h1 class="uk-h2 uk-margin-bottom uk-text-light">NRI Banking</h1>
		<ul class="uk-tab uk-text-bold">
			<?php
				$subnav = array(
					array('title' => 'All Leads', 'url' => '' ),
					array('title' => 'Request', 'url' => 'request' ),
					array('title' => 'Process', 'url' => 'process' ),
					array('title' => 'Reject', 'url' => 'reject' ),
					array('title' => 'Success', 'url' => 'success' ),
					array('title' => 'Follow up', 'url' => 'follow-up' )
				);
				for ($i=0; $i < count($subnav); $i++) { 
					if ($subnav[$i]['url'] === $input->urlSegment1) {
						$class = "class='uk-active'";
					}else{
						$class = "";
					}
				?>
				<li <?=$class?>><a href="<?=$page->url.$subnav[$i]['url']?>"><?=$subnav[$i]['title']?></a></li>
			<?php  } ?>
			<li><a href="<?=$pages->get("id=25925")->url?>report/">Campaign Report</a></li>
		</ul>

		<div class="uk-margin">
			<div class="uk-card uk-card-body uk-card-small uk-card-default">
				<div class="uk-flex uk-flex-middle uk-flex-between">
					<a href="#filtersForm" class="uk-display-block uk-width-expand" uk-toggle><h1 class="uk-h4 uk-text-blue uk-margin-remove">Filter NRI Applications</h1></a>
					<a href="#filtersForm" class="uk-icon-link uk-margin-small-right" uk-icon="icon:chevron-down;ratio:1.5" uk-toggle></a>
				</div>
				<form action="./" method="get" id="filtersForm" class="uk-margin-top" hidden>
				<div class="uk-grid uk-grid-small uk-flex-center uk-child-width-1-5@m uk-child-width-1-3@s uk-child-width-1-2">
					<?php if ($input->urlSegment1 != "follow-up"): ?>
						
					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">App Code</div>
							<input type="text" class="uk-input" tabindex="1" name="app_code" />
						</label>
					</div>

					<?php endif ?>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter from Date <span class="uk-text-small uk-text-muted">(applied after)</span></div>
							<input type="text" class="uk-input" tabindex="3" name="from_date" id="fromDate" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter to Date <span class="uk-text-small uk-text-muted">(applied before)</span></div>
							<input type="text" class="uk-input" tabindex="4" name="to_date" id="toDate" />
						</label>
					</div>

					<?php if ($input->urlSegment1 != "follow-up"): ?>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Select Country of residence</div>
							<select name="cc" class="uk-select" tabindex="5">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">City of opening account</div>
							<input type="text" class="uk-input" tabindex="2" name="City" />
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
							<div class="uk-margin-small-bottom">Select product</div>
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

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Disposition</div>
							<select name="lead_disposition" class="uk-select" tabindex="12">
								<option>All</option>
								<option value="1">In Process</option>
								<option value="2">Reject</option>
								<option value="3">Success</option>
								<option value="4">Following</option>
							</select>
						</label>
					</div>

					<?php endif ?>

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
			case 'process':
				$count = $pages->count("template=lead_template,product=3,app_status=1");
				$leads = $pages->find("template=lead_template,product=3,app_status=1,sort=-id,limit=10");
				break;
			case 'reject':
				$count = $pages->count("template=lead_template,product=3,app_status=2");
				$leads = $pages->find("template=lead_template,product=3,app_status=2,sort=-id,limit=10");
				break;
			case 'success':
				$count = $pages->count("template=lead_template,product=3,app_status=3");
				$leads = $pages->find("template=lead_template,product=3,app_status=3,sort=-id,limit=10");
				break;
			case 'follow-up':
				$count = $pages->count("template=lead_template,product=3,app_status=1,app_status_process=2");
				$leads = $pages->find("template=lead_template,product=3,app_status=1,app_status_process=2,sort=-id,limit=10");
				break;
		    case 'request':
				/* User Central or Superuser */
				if ($user->hasRole('central') || $user->hasRole('superuser')) {
					$count = $pages->count("template=lead_template,product=3,app_status!=1|2|3");
					$leads = $pages->find("template=lead_template,product=3,app_status!=1|2|3,sort=-id,limit=10");
				}

				/* User TL */
				$tl_cities = "";
				foreach ($user->tl_cities as $city) {
					$tl_cities .= $city->title."|";
				}
				$tl_cities = rtrim($tl_cities, "|");

				if ($user->hasRole('tl')) {
					$count = $pages->count("template=lead_template,product=3,city=$tl_cities,app_status!=1|2|3");
					$leads = $pages->find("template=lead_template,product=3,city=$tl_cities,app_status!=1|2|3,sort=-id,limit=10");
				}

				/* User RM */
				if ($user->hasRole('rm')) {
					$count = $pages->count("template=lead_template,product=3,assigned_to=$user,app_status!=1|2|3");
					$leads = $pages->find("template=lead_template,product=3,assigned_to=$user,app_status!=1|2|3,sort=-id,limit=10");
				}
				
				break;
			default:

				/* User Central or Superuser */
				if ($user->hasRole('central') || $user->hasRole('superuser')) {
					$count = $pages->count("template=lead_template,product=3");
					$leads = $pages->find("template=lead_template,product=3,sort=-id,limit=10"); //,app_status!=1|2|3
				}

				/* User TL */
				$tl_cities = "";
				foreach ($user->tl_cities as $city) {
					$tl_cities .= $city->title."|";
				}
				$tl_cities = rtrim($tl_cities, "|");

				if ($user->hasRole('tl')) {
					$count = $pages->count("template=lead_template,product=3,city=$tl_cities");
					$leads = $pages->find("template=lead_template,product=3,city=$tl_cities,sort=-id,limit=10");
				}

				/* User RM */
				if ($user->hasRole('rm')) {
					$count = $pages->count("template=lead_template,product=3,assigned_to=$user");
					$leads = $pages->find("template=lead_template,product=3,assigned_to=$user,sort=-id,limit=10"); //,app_status!=1|2|3
				}
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
						<th style="width: 50px">App Code</th>
						<th style="width: 50px">Entry Date</th>
						<th style="width: 70px">Product Type</th>
						<th style="width: 70px">Customer name / Country</th>
						<th style="width: 70px">Mobile/Email</th>
						<th style="width: 70px">Preferred City</th>
						<th style="width: 70px">Assigned To</th>
						<th style="width: 70px">Status</th>
						<th style="width: 50px">Last Updated</th>
						<th style="width: 50px"></th>
					</tr>
					<?php foreach ($leads as $l): ?>
					<tr>
						<td><?=$l->unique_id?></td>
						<td><?=date('d-m-y G:i',$l->created)?></td>
						<td><?=$l->nri_product?></td>
						<td><div><?=$l->fname." ".$l->lname?></div>
							<div><?=$l->country?></div>
						</td>
						<td>
							<div><?=$l->mobile?></div>
							<div><?=$l->email?></div>
						</td>
						<td><?=$l->city?></td>
						<td><?php
						if ($l->assigned_to) {
							echo "<div class='uk-margin-small-bottom'>".$l->assigned_to->title."</div>";
						}else{
							echo "<div class='uk-margin-small-bottom'>-NA-</div>";
						}
						
						if ($input->urlSegment1 != "success" && $input->urlSegment1 != "reject") {
						if ($user->hasRole('tl') || $user->hasRole('central')) {
							//only allow TL/Central to assign leads
						
						if ($l->assigned_to) { ?>
							<form action="<?=$page->url?>" method="post">
								<input type="hidden" name="id" value="<?=$l->id?>" class="ass1" />
								<select name="assign_user" class="uk-select uk-select-small" onchange="this.form.submit()">
									<option>Change User</option>
									<?php foreach ($users->find("id!=40,user_ref=$user") as $u): ?>
										<option value="<?=$u->id?>"><?=$u->title?></option>
									<?php endforeach ?>
								</select>
							</form>
						<?php }else{ ?>
							<?php if ($user->hasRole('central')): ?>
							<!-- central -->
							<form action="<?=$page->url?>" method="post">
								<input type="hidden" name="id" value="<?=$l->id?>" class="ass12" />
								<select name="assign_user" class="uk-select uk-select-small" onchange="this.form.submit()">
									<option>Assign User</option>
									<?php foreach ($users->find("id!=40,roles=tl|rm,product=3") as $u): ?>
										<option value="<?=$u->id?>"><?=$u->title." - ".$u->code?></option>
									<?php endforeach ?>
								</select>
							</form>
							<?php endif ?>

							<?php if ($user->hasRole('tl')): ?>
							<!-- TL -->
							<form action="<?=$page->url?>" method="post">
								<input type="hidden" name="id" value="<?=$l->id?>" class="ass13"/>
								<select name="assign_user" class="uk-select uk-select-small" onchange="this.form.submit()">
									<option>Assign User</option>
									<?php foreach ($users->find("id!=40,roles=rm,user_ref=$user,product=3") as $u): ?>
										<option value="<?=$u->id?>"><?=$u->title." - ".$u->code?></option>
									<?php endforeach ?>
								</select>
							</form>
							<?php endif ?>
						<?php } //$l->assigned_to

							}//$user->code = 'TL'|'Central'
						}//not success or reject
						?></td>
						<td><?php
						if ($l->child("sort=-id")->app_status != "") {
							echo $l->child("sort=-id")->app_status->title;
						}else{
							echo "Fresh";
						}
						?></td>
						<td><?=date('d-m-y G:i',$l->modified);?></td>
						<td>
							<div uk-lightbox>
								<a href="<?=$page->url?>view/<?=$l->id?>?view=iframe&source=<?=$input->urlSegment1?>" title="View" class="uk-button uk-button-small uk-button-default" data-type="iframe"><span uk-icon="icon:search;ratio:0.8"></span></a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div><!-- overflow-auto -->

			<div class="uk-margin-medium uk-flex uk-flex-center">
				<?=$pagination?>
			</div>
		</div><!-- list-wrap -->
	</div><!-- uk-section -->
</div><!-- uk-container -->
<?php include(\ProcessWire\wire('files')->compile('partials/_sales_footer.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>