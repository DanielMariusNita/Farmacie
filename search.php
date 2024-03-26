<?php
include 'p_con.php';
if(isset($_POST["submit"]))
{
    //Grabbing the data

    $cautare=$_POST["cautare"];
    echo $cautare;
}
$query="";