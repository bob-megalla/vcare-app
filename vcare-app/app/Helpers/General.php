<?php
use Illuminate\Support\Facades\Config;

function uploadimage($folder,$image)

{
    // return dd($image->extension());
    $extention = strtolower($image->extension());
    $filename = time() . rand(100,999). "." .$extention ;
     $image->getClientOName= $filename;
     $image->move($folder,$filename);
     return $filename;

}



?>
