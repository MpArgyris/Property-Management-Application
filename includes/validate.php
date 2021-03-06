<?php

function validateEmail(&$errors,$fieldList,$fieldName){
	
	$pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
	
	if (validateText($errors,$fieldList,$fieldName)){
		
		if(preg_match($pattern,$fieldList[$fieldName])){
			return true;
		}else{
			$errors[$fieldName] = 'invalid email address';
			return false;
		}
		
	}else{
		return false;
	}
	
}

function validateText(&$errors,$fieldList,$fieldName){
	if (!isset($fieldList[$fieldName]) || empty($fieldList[$fieldName])){
		$errors[$fieldName] = 'required';
		return false;
	}else{
		return true;
	}
}

function validateDOB(&$errors,$fieldList,$fieldName,$required=false){
	if (validateText($errors,$fieldList,$fieldName)){
		
		$date = DateTime::createFromFormat('Y-m-d',$fieldList[$fieldName]);
		
		if ($date && $date->format['Y-m-d'] == $fieldList[$fieldName]){
			return true;
		}else{
			$errors[$fieldName] = 'invalid date of birth';
			return false;
		}
		
	}else{
		if ($required == false){
			unset($errors[$fieldName]);
			return true;
		}else{
			return false;
		}
	}
}

?>