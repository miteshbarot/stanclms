<?php
$root = $config->urls->root;
$tpl = $config->urls->templates;

if ($input->urlSegment1 == 'delete') {
	$id = $input->urlSegment2;
	$pid = $pages->get("id={$id}");
	if ($pid) {
		$pid->of(false);
		$pid->delete();
	}
	$session->redirect($page->url);
}


if($input->post->import){
	//echo "Import starting...<br/>";
    // tmp upload folder for additional security
    // possibly restrict access to this folder using htaccess:
    // # RewriteRule ^.tmp_uploads(.*) - [F]
    $upload_path = $config->paths->templates . "uploads/";

    // new wire upload
    $u = new WireUpload('file');
    $u->setMaxFiles(1);
    //$u->setMaxFileSize(200*1024);
    $u->setOverwrite(false);
    $u->setDestinationPath($upload_path);
    $u->setValidExtensions(array('csv'));

    // execute upload and check for errors
    $files = $u->execute();

    if(!$u->getErrors()){
        // create the new page to add the files
        $uploadpage = new Page();
        $uploadpage->template = "partner-upload";
        $uploadpage->title = md5(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, rand(1,10)));
        $uploadpage->parent = $pages->get("id=28249"); //Home/Masters/Offers/
        $uploadpage->save();

        // add files upload
        foreach($files as $filename) {
            $uploadpage->file = $upload_path . $filename;
        }
        // save page
        $uploadpage->save();

        // remove all tmp files uploaded
        foreach($files as $filename) unlink($upload_path . $filename);
        $message .= "<p class='message'>File uploaded!</p>";

    } else {
        // remove files
        foreach($files as $filename) unlink($upload_path . $filename);

        // get the errors
        foreach($u->getErrors() as $error) $message .= "<p class='error'>$error</p>";
    }
}

//echo $message;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Standard Chartered Bank - <?=$page->title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/uikit.min.css">
	<link rel="stylesheet" type="text/css" href="<?=$tpl?>assets/css/override.css">
	<link rel="stylesheet" href="<?=$tpl?>assets/css/jquery-ui.min.css">
</head>
<body>
<header>
	<div class="bg_band"></div>
	<div class="uk-container uk-container-large">
		<nav class="uk-navbar uk-navbar-container p-logo uk-navbar-transparent" uk-navbar>
		    <div class="uk-navbar-left">
		        <a href="<?=$siteUrl?>"><img class="logo" src="<?=$tpl?>assets/images/logo.png"></a>
		    </div>
		    <div class="uk-navbar-right">
		        <!-- <h1 class="uk-margin-remove fs-22 fs-16-mobile ff-helvetica-bold uk-primary uk-text-right"><span class="ff-helvetica"><?=$page->parent->title?></span><br/><?=$page->title?></h1> -->
		    </div>
		</nav>
	</div>
</header>

<div class="uk-section">
	<div class="uk-container" uk-height-viewport="expand: true">
		
		<div class="page-content">
			<?php if ($input->urlSegment1 == "view"): ?>
			<?php 
				$f = $pages->get("id={$input->urlSegment2}");
				$file = fopen($f->file->httpUrl,"r");
				$offers = fgetcsv($file);
				fclose($file);
			?>
			<h1 class="uk-h2"><?=$f->file->name?></h1><hr class="uk-hr" />
			<table class="uk-table uk-table-divider uk-table-hover">
				<tr>
					<th>Title</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Product</th>
					<th>Credit Card</th>
					<th>PL Amount</th>
					<th>PL RoI(%)</th>
					<th>PL EMI</th>
				</tr>
				
				<?php
					$rows = [];
					if (($handle = fopen($f->file->httpUrl, "r")) !== FALSE) {
						while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
							$rows[] = $data;
						}
						fclose($handle);
					}
					for ($i=1; $i < count($rows) ; $i++) {
						echo "<tr><td>".$rows[$i][0]."</td>";
						echo "<td>".$rows[$i][1]."</td>";
						echo "<td>".$rows[$i][2]."</td>";
						echo "<td>".$rows[$i][3]."</td>";
						echo "<td>".$rows[$i][4]."</td>";
						echo "<td>".$rows[$i][5]."</td>";
						echo "<td>".$rows[$i][6]."</td>";
						echo "<td>".$rows[$i][7]."</td></tr>";
					}
				?>
			
			</table>
			
			
			<?php else: ?>
			<h1 class="uk-h2">Offers Data Upload</h1><hr class="uk-hr" />
			<form action="<?=$page->url?>" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
			    <div class="uk-inline uk-margin">
			        <label><span class="uk-text-small">Choose .CSV File</span>
			        	<div class="uk-margin-small-top"><input type="file" name="file" id="file" accept=".csv" required /></div>
			        </label>
			        <input type="submit" id="submit" class="uk-button uk-button-primary uk-margin uk-border-rounded" name="import" value="Import" />
			    </div>
			</form>
			
			<hr class="uk-hr" />
			
			<table class="uk-table uk-table-divider uk-table-hover">
				<tr>
					<th>File</th>
					<th>File Size</th>
					<th>Count</th>
					<th>Uploaded Date</th>
					<th>Uploaded By</th>
					<th>Delete</th>
				</tr>
			<?php foreach ($pages->get("id=28249")->children("template='partner-upload'") as $pa): ?>
				<tr>
					<td><a href="<?=$page->url?>view/<?=$pa->id?>" title="<?=$pa->file->name?>"><?=$pa->file->name?></a></td>
					<td><?=$pa->file->filesizeStr?></td>
					<td>
						<?php
							$rows = [];
							if (($handle = fopen($pa->file->httpUrl, "r")) !== FALSE) {
								while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
									$rows[] = $data;
								}
								fclose($handle);
							}
							echo count($rows);
						?>
					</td>
					<td><?=date('d-M-y g:i',$pa->created)?></td>
					<td><?=$pa->createdUser->title?></td>
					<td><a href="<?=$page->url?>delete/<?=$pa->id?>" class="uk-button-icon" uk-icon="icon:trash; ratio:1.1"></a></td>
				</tr>
			<?php endforeach ?>
			</table>
			<?php endif ?>
		</div>
	</div>
</div>

<footer>
	<div class="uk-background-3D uk-text-center fs-14 uk-text-white uk-padding-small">
		&copy; 2020. Standard Chartered Bank. All Rights Reserved.
	</div>
</footer>

<script type="text/javascript" src="<?=$tpl?>assets/js/uikit.min.js"></script>
<script type="text/javascript" src="<?=$tpl?>assets/js/uikit-icons.min.js"></script>
</body>
</html>        