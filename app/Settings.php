<?php
function self_url($title){
    $search = array(" ","ö","ü","ı","ğ","ç","ş","/","?","&","'",",","A","B","C","Ç","D","E","F","G","Ğ","H","I","İ","J","K","L","M","N","O","Ö","P","R","S","Ş","T","U","Ü","V","Y","Z","Q","X");
    $replace = array("-","o","u","i","g","c","s","-","","-","","","a","b","c","c","d","e","f","g","g","h","i","i","j","k","l","m","n","o","o","p","r","s","s","t","u","u","v","y","z","q","x");
    $new_text = str_replace($search,$replace,trim($title));
    return $new_text;
}
function tema(){
	$ayar = DB::table('ayar')->where("id","=",1)->get();
	$ayar=(Array)$ayar[0];
    return $ayar["tema"];
    //return "w3css";
}
function temalar(){
    return "bootstrap,w3css,distribution";
}  