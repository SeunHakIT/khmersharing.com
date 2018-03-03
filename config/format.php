<?php 
/**
* 
*/
class format
{
	// public function formatDate(){
	// 	date('F j,Y,g:i a',strtotime($date));
	// }
 public function formatDat($date){
 	return date('F j,Y,g:i a',strtotime($date));
 }


 public function Readmore($text,$limit=600){
 	$text=$text."";
 	$text=substr($text,0,$limit);
 	$text=$text."....";
 	return $text;
 }

 public function body($text,$limit=200){
 	$text=$text."";
 	$text=substr($text,0,$limit);
 	$text=$text."...";
 	return $text;
 }


  public function sibar($text,$limit=50){
 	$text=$text."";
 	$text=substr($text,0,$limit);
 	$text=$text."..";
 	return $text;
 }





}

 ?>