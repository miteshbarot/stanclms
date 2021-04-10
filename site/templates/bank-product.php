<?php

$p = $pages->get("id=1016");
$page->of(false);
echo "<pre>";
foreach($p->fields as $f){
	echo $f."<br/>";
    //$page->$f = $p->$f;
}
echo "</pre>";
$page->save();

echo "Page saved";