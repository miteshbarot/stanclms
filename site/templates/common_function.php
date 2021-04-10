<?php
// FUNCTION TO MUNG THE XML SO WE DO NOT HAVE TO DEAL WITH NAMESPACE
function mungXML($xml)
{
    $obj = SimpleXML_Load_String($xml);
    if ($obj === FALSE) return $xml;

    // GET NAMESPACES, IF ANY
    $nss = $obj->getNamespaces(TRUE);
    if (empty($nss)) return $xml;

    // CHANGE ns: INTO ns_
    $nsm = array_keys($nss);
    foreach ($nsm as $key)
    {
        // A REGULAR EXPRESSION TO MUNG THE XML
        $rgx
        = '#'               // REGEX DELIMITER
        . '('               // GROUP PATTERN 1
        . '\<'              // LOCATE A LEFT WICKET
        . '/?'              // MAYBE FOLLOWED BY A SLASH
        . preg_quote($key)  // THE NAMESPACE
        . ')'               // END GROUP PATTERN
        . '('               // GROUP PATTERN 2
        . ':{1}'            // A COLON (EXACTLY ONE)
        . ')'               // END GROUP PATTERN
        . '#'               // REGEX DELIMITER
        ;
        // INSERT THE UNDERSCORE INTO THE TAG NAME
        $rep
        = '$1'          // BACKREFERENCE TO GROUP 1
        . '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
        ;
        // PERFORM THE REPLACEMENT
        $xml =  preg_replace($rgx, $rep, $xml);
    }

    return $xml;

} // End :: mungXML()

function simpleXMLToArray($xml,
				$flattenValues=true,
				$flattenAttributes = true,
				$flattenChildren=true,
				$valueKey='@value',
				$attributesKey='@attributes',
				$childrenKey='@children'){

	$return = array();
	if(!($xml instanceof SimpleXMLElement)){return $return;}
	$name = $xml->getName();
	$_value = trim((string)$xml);
	if(strlen($_value)==0){$_value = null;};

	if($_value!==null){
		if(!$flattenValues){$return[$valueKey] = $_value;}
		else{$return = $_value;}
	}
	$children = array();
	$first = true;
	foreach($xml->children() as $elementName => $child){
		$value = simpleXMLToArray($child, $flattenValues, $flattenAttributes, $flattenChildren, $valueKey, $attributesKey, $childrenKey);
		if(isset($children[$elementName])){
			if($first){
				$temp = $children[$elementName];
				unset($children[$elementName]);
				$children[$elementName][] = $temp;
				$first=false;
			}
			$children[$elementName][] = $value;
		}
		else{
			$children[$elementName] = $value;
		}
	}
	if(count($children)>0){
		if(!$flattenChildren){$return[$childrenKey] = $children;}
		else{$return = array_merge($return,$children);}
	}

	$attributes = array();
	foreach($xml->attributes() as $name=>$value){
		$attributes[$name] = trim($value);
	}
	if(count($attributes)>0){
		if(!$flattenAttributes){$return[$attributesKey] = $attributes;}
		else{$return = array_merge($return, $attributes);}
	}

	return $return;
}

function random_code(){
		$today = date("Ymd");
		$rand = strtoupper(substr(uniqid(sha1(time())),0,6));
		$unique_id = $rand . $today;
		return $unique_id;
	}

?>