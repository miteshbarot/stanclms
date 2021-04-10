<?php include 'partials/_sales_header.php'; 

if ($input->urlSegment1) {
	switch ($input->urlSegment1) {
		case 'personal-loan':
			$pl_active = "uk-active";
			break;
		case 'credit-card':
			$cc_active = "uk-active";
			break;
		case 'source-reports':
			$sr_active = "uk-active";
			break;
		case 'my-exports':
			$me_active = "uk-active";
			break;		
		
		default:
			# code...
			break;
	}
}else{
	$session->redirect($page->url."source-reports/");
}

?>
<style>
	.uk-tab.uk-subnav>.uk-active>a{
		color: #FFF !important;
		border-radius: 5px 5px 0 0;
	}
</style>
<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
	<div class="uk-margin">
		<ul class="uk-tab uk-text-bold">
<?php if ($user->hasRole('central') || $user->hasRole('superuser')) { ?>
			<li><a href="<?=$pages->get("id=25925")->url?>">Dashboard</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
			<?php 
		  }else{
			 if($user->product=='1'){ ?>
			<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
		     <?php }else if($user->product=='2'){ ?>
		     	<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
			<?php }else if($user->product=='3'){ ?>
			<li><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
		    <?php }else if($user->product=='4'){ ?>
		     <li><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
		     <?php 
		     	}
		 	} 
		 ?>



			<li class="<?=$sr_active?>"><a href="<?=$pages->get("id=25925")->url?>report/source-reports/">Source Reports</a></li>
			<?php if (!$user->hasRole('sales-executive')): ?>
			<li class="<?=$me_active?>"><a href="<?=$pages->get("id=25925")->url?>report/my-exports/">My Exports</a></li>
			<?php endif ?>
		</ul>
	</div>
	
<?php if ($input->urlSegment1 == 'source-reports'): ?>
	<div class="uk-section uk-section-small">
		<ul class="uk-tab uk-subnav uk-subnav-pill" uk-switcher>
		    <li><a href="#">Campaign Report</a></li>
			<li><a href="#">Sub-campaign Report</a></li>
		</ul>
		<ul class="uk-switcher uk-margin">
		    <li>
		    	<h2>Campaign Report</h2>
		    	<div class="uk-panel uk-margin-medium">
		    		<form action="./" method="get">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto">
							<select name="channel" class="uk-select" onchange="this.form.submit()">
								<option value="nri" <?php if ($input->get->channel == 'nri'): ?>selected <?php endif ?>>NRI</option>
								<option value="cc" <?php if ($input->get->channel == 'cc'): ?>selected <?php endif ?>>Credit Card</option>
								<option value="pl" <?php if ($input->get->channel == 'pl'): ?>selected <?php endif ?>>Personal Loan</option>
								<option value="bb" <?php if ($input->get->channel == 'bb'): ?>selected <?php endif ?>>Business Banking</option>
							</select>
						</div>
						<div class="uk-width-auto">
							<input type="text" class="uk-input" name="from" placeholder="From Date" id="fromDate" />
						</div>
						<div class="uk-width-auto">
							<input type="text" class="uk-input" name="to" placeholder="To Date" id="toDate" />
						</div>
						<div class="uk-width-auto">
							<select name="visits" class="uk-select">
								<option>Desktop & mobile visits</option>
								<option>Desktop visits only</option>
								<option>Mobile visits only</option>
							</select>
						</div>
						<div class="uk-width-expand">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-auto">
									<select name="source" class="uk-select">
										<option>Source type</option>
										<option>Bank website/Direct</option>
										<option>Branding Campaign</option>
										<option>Connectors</option>
										<option>CPC</option>
										<option>eDM</option>
										<option>Network CPA</option>
									</select>
								</div>
								<div class="uk-width-auto">
									<button type="submit" class="uk-button uk-button-primary uk-border-rounded">Get Report</button>
								</div>
								<?php if (!$user->hasRole('sales-executive')): ?>
								<div class="uk-width-auto">
									<button class="uk-button uk-button-orange uk-border-rounded exportclick">Export</button>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
					</form>
				</div>

				<ul class="uk-tab uk-subnav uk-subnav-pill" uk-switcher>
				    <li><a href="#">Display by campaign</a></li>
					<li><a href="#">Display by date</a></li>
					<li><a href="#">Display by campaign & date</a></li>
				</ul>
				<ul class="uk-switcher uk-margin">
					<?php if ($input->get->channel == "nri" || $input->get->channel == ""): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<!-- <th>App. code</th>
						    	<th>Product Type</th>
						    	<th>Customer Name</th>
						    	<th>Mobile Number</th>
						    	<th>Email</th>
						    	<th>Country of Residence</th>
						    	<th>Preferred City</th>
						    	<th>Status</th>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Visits</th>
						    	<th>Total Leads</th>
						    	<th>Verified Leads</th>
						    	<th>In Progress</th>
						    	<th>Reject</th>
						    	<th>Approved</th> -->
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Origination Date</th>
						    	<!-- <th>Source</th>
						    	<th>Campaign</th> -->
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Campaign</th>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "bb"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<!-- <th>App. code</th>
						    	<th>Product Type</th>
						    	<th>Customer Name</th>
						    	<th>Mobile Number</th>
						    	<th>Email</th>
						    	<th>Country of Residence</th>
						    	<th>Preferred City</th>
						    	<th>Status</th>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Visits</th>
						    	<th>Total Leads</th>
						    	<th>Verified Leads</th>
						    	<th>In Progress</th>
						    	<th>Reject</th>
						    	<th>Approved</th> -->
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Origination Date</th>
						    	<!-- <th>Source</th>
						    	<th>Campaign</th> -->
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Campaign</th>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "cc"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Total visits</th>
						    	<th>Drop offs	</th>
						    	<th>Otp done	</th>
						    	<th>Pixel Count	</th>
						    	<th>Customer completed apps	</th>
						    	<th>Telecaller completed apps	</th>
						    	<th>Completed Apps	</th>
						    	<th># Apps AIP done	</th>
						    	<th># AIP Approved	</th>
						    	<th># AIP Referred	</th>
						    	<th># AIP Rejected	</th>
						    	<th>Approved + Referred	</th>
						    	<th>Sent for pickup	</th>
						    	<th>Docs Picked up	</th>
						    	<th>Dispatched	</th>
						    	<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Date</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Date</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "pl"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Date</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Date</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>
				</ul>
		    </li>
			<li>
		    	<h2>Sub-campaign Report ("ad-group" param)</h2>
		    	<div class="uk-panel uk-margin-medium">
		    		<form action="./" method="get">
					<div class="uk-grid uk-grid-small">
						<div class="uk-width-auto">
							<select name="channel" class="uk-select" onchange="this.form.submit()">
								<option value="nri" <?php if ($input->get->channel == 'nri'): ?>selected <?php endif ?>>NRI</option>
								<option value="cc" <?php if ($input->get->channel == 'cc'): ?>selected <?php endif ?>>Credit Card</option>
								<option value="pl" <?php if ($input->get->channel == 'pl'): ?>selected <?php endif ?>>Personal Loan</option>
								<option value="bb" <?php if ($input->get->channel == 'bb'): ?>selected <?php endif ?>>Business Banking</option>
							</select>
						</div>
						<div class="uk-width-auto">
							<input type="text" class="uk-input" placeholder="From Date" id="fromDate" />
						</div>
						<div class="uk-width-auto">
							<input type="text" class="uk-input" placeholder="To Date" id="toDate" />
						</div>
						<div class="uk-width-auto">
							<select class="uk-select">
								<option>Source type</option>
								<option>Bank website/Direct</option>
								<option>Branding Campaign</option>
								<option>Connectors</option>
								<option>CPC</option>
								<option>eDM</option>
								<option>Network CPA</option>
							</select>
						</div>
						<div class="uk-width-expand">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-auto">
									<select class="uk-select">
										<option>Filter by source (se)</option>
										<option>ACC</option>
										<option>APO</option>
										<option>CDE</option>
										<option>NET</option>
									</select>
								</div>
								<div class="uk-width-auto">
									<button class="uk-button uk-button-primary uk-border-rounded">Get Report</button>
								</div>
								<?php if (!$user->hasRole('sales-executive')): ?>
								<div class="uk-width-auto">
									<button class="uk-button uk-button-orange uk-border-rounded">Export</button>
								</div>
								<?php endif ?>
							</div>
						</div>
					</div>
					</form>
				</div>

				<ul class="uk-tab uk-subnav uk-subnav-pill" uk-switcher>
				    <li><a href="#">Display by campaign</a></li>
					<li><a href="#">Display by date</a></li>
					<li><a href="#">Display by campaign & date</a></li>
				</ul>
				<ul class="uk-switcher uk-margin">
					<?php if ($input->get->channel == "nri" || $input->get->channel == ""): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Main Campaign</th>
						    	<th>Sub-Campaign</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Main Campaign</th>
				    			<th>Sub-Campaign</th>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "bb"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Main Campaign</th>
						    	<th>Sub-Campaign</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Main Campaign</th>
				    			<th>Sub-Campaign</th>
				    			<th>Origination Date</th>
						    	<th>Visits</th>
						    	<th>Total leads</th>
						    	<th>Verified leads</th>
						    	<th>In process</th>
						    	<th>Reject</th>
						    	<th>Approved</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "cc"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Ad Group</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Date</th>
				    			<th>Total visits</th>
				    			<th>Drop offs</th>
				    			<th>Otp done</th>
				    			<th>Pixel Count</th>
				    			<th>Customer completed apps</th>
				    			<th>Telecaller completed apps</th>
				    			<th>Completed Apps</th>
				    			<th># Apps AIP done</th>
				    			<th># AIP Approved</th>
				    			<th># AIP Referred</th>
				    			<th># AIP Rejected</th>
				    			<th>Approved + Referred</th>
				    			<th>Sent for pickup</th>
				    			<th>Docs Picked up</th>
				    			<th>Dispatched</th>
				    			<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Campaign</th>
				    			<th>Ad Group</th>
				    			<th>Date</th>
				    			<th>Total visits</th>
				    			<th>Drop offs</th>
				    			<th>Otp done</th>
				    			<th>Pixel Count</th>
				    			<th>Customer completed apps</th>
				    			<th>Telecaller completed apps</th>
				    			<th>Completed Apps</th>
				    			<th># Apps AIP done</th>
				    			<th># AIP Approved</th>
				    			<th># AIP Referred</th>
				    			<th># AIP Rejected</th>
				    			<th>Approved + Referred</th>
				    			<th>Sent for pickup</th>
				    			<th>Docs Picked up</th>
				    			<th>Dispatched</th>
				    			<th>Final Approvals</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>

					<?php if ($input->get->channel == "pl"): ?>					
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
						    	<th>Source</th>
						    	<th>Campaign</th>
						    	<th>Ad Group</th>
						    	<th>Total visits</th>
						    	<th>Drop offs</th>
						    	<th>Otp done</th>
						    	<th>Pixel Count</th>
						    	<th>Customer completed apps</th>
						    	<th>Telecaller completed apps</th>
						    	<th>Completed Apps</th>
						    	<th># Apps AIP done</th>
						    	<th># AIP Approved</th>
						    	<th># AIP Referred</th>
						    	<th># AIP Rejected</th>
						    	<th>Approved + Referred</th>
						    	<th>Sent for pickup</th>
						    	<th>Docs Picked up</th>
						    	<th>Dispatched</th>
						    	<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Date</th>
				    			<th>Total visits</th>
				    			<th>Drop offs</th>
				    			<th>Otp done</th>
				    			<th>Pixel Count</th>
				    			<th>Customer completed apps</th>
				    			<th>Telecaller completed apps</th>
				    			<th>Completed Apps</th>
				    			<th># Apps AIP done</th>
				    			<th># AIP Approved</th>
				    			<th># AIP Referred</th>
				    			<th># AIP Rejected</th>
				    			<th>Approved + Referred</th>
				    			<th>Sent for pickup</th>
				    			<th>Docs Picked up</th>
				    			<th>Dispatched</th>
				    			<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<li>
						<table class="uk-table uk-table-divider uk-table-hover uk-table-striped">
				    		<tr>
				    			<th>Source</th>
				    			<th>Campaign</th>
				    			<th>Ad Group</th>
				    			<th>Date</th>
				    			<th>Total visits</th>
				    			<th>Drop offs</th>
				    			<th>Otp done</th>
				    			<th>Pixel Count</th>
				    			<th>Customer completed apps</th>
				    			<th>Telecaller completed apps</th>
				    			<th>Completed Apps</th>
				    			<th># Apps AIP done</th>
				    			<th># AIP Approved</th>
				    			<th># AIP Referred</th>
				    			<th># AIP Rejected</th>
				    			<th>Approved + Referred</th>
				    			<th>Sent for pickup</th>
				    			<th>Docs Picked up</th>
				    			<th>Dispatched</th>
				    			<th>Disbursed</th>
				    		</tr>
				    		<tr><td colspan="7">No results found</td></tr>
				    	</table>
					</li>
					<?php endif ?>
				</ul>
		    </li>
		</ul>
	</div>	
<?php endif ?>

<?php if ($input->urlSegment1 == 'my-exports'): ?>
	<div class="uk-card uk-card-default uk-card-body">
		<h2 class="uk-h3">Export</h2>
		<form method="get" name="frmexport" id="frmexport">
		<div class="uk-grid uk-grid-small uk-child-width-expand">
			<div>
				<!-- <input type="text" class="uk-input" value="CC iprospect" tabindex="1" /> -->
			<select name="channel_ex" id="channel_ex" class="uk-select">
			<?php if ($user->hasRole('central') || $user->hasRole('superuser')) { ?>
				<option value="nri" <?php if ($input->get->channel == 'nri'): ?>selected <?php endif ?>>NRI</option>
				<option value="cc" <?php if ($input->get->channel == 'cc'): ?>slected <?php endif ?>>Credit Card</option>
				<option value="pl" <?php if ($input->get->channel == 'pl'): ?>selected <?php endif ?>>Personal Loan</option>
				<option value="bb" <?php if ($input->get->channel == 'bb'): ?>selected <?php endif ?>>Business Banking</option>
			<?php }else{
			if($user->product=='3'){
					echo "<option value='nri' selected >NRI</option>";
				}else if($user->product=='1'){
					echo "<option value='pl' selected >Personal Loan</option>";
				}else if($user->product=='2'){
					echo "<option value='cc' selected >Credit Card</option>";
				}else if($user->product=='4'){
					echo "<option value='bb' selected >Business Banking</option>";
				}
			 } 
			 ?>
			</select>
			</div>
			<div>
				<input type="text" class="uk-input" id="fromDate" placeholder="From Date" />
			</div>
			<div>
				<input type="text" class="uk-input" id="toDate" placeholder="To Date" />
			</div>
			<div>
				<button class="uk-button uk-button-orange uk-border-rounded btn_export">Export</button>
			</div>
		</div>
		</form>
	</div>
<?php endif ?>

</div><!-- uk-container -->
<script type="text/javascript">
	$(document).ready(function(){
		$(".btn_export").click(function(){
			//console.log("in expo");
			var channel =$("#channel_ex").val();
			var sdate =$("#fromDate").val();
			var edate =$("#toDate").val();
			//window.location.href="https://apply.standardchartered.co.in/sales-portal/report/sale-export-data/?param="+channel+"&start="+sdate+"&end="+edate;
			 window.open( 
             "https://apply.standardchartered.co.in/sales-portal/report/sale-export-data/?param="+channel+"&start="+sdate+"&end="+edate, "_blank");
			return false;

	});
});
</script>

<?php include 'partials/_sales_footer.php'; ?>