<?php 
function redirect($file)
{
    header('location:'.URLROOT.$file);
}
function redirectTime($file,$secondes =3)
{
    header( "refresh:".$secondes.";url=".URLROOT.$file );# code...
}