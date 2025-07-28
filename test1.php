<?php
// Create Files & Choose ext and Write Content on it ; 
session_start();
if ($_SERVER['REQUEST_METHOD']==='POST' &&isset($_POST['create']) ){
$name=$_POST['filename'] ;
$ext=$_POST['ext'] ;
$area=$_POST['area'] ;
$file_name=$name . '.' .$ext;
if(!file_exists($file_name)) {
file_put_contents($file_name,$area);
$_SESSION['message']='file Created sucsseful';
header('Location:test1.php');
exit;

}else{
if(file_exists($file_name)) {
$_SESSION['message']="Doesn't Created" ;

header('Location:test1.php');
exit;

}

}
}
if (isset($_SESSION['message'])){
    echo $_SESSION['message'];
    unset($_SESSION['message']);

}

//=====================(((Change Color Background)))==========================;
$color=$_POST['color'] ?? $_COOKIE ['color'] ?? '' ;

if($_SERVER ['REQUEST_METHOD']=== 'POST' && isset( $_POST['change'])){
setcookie('color',$color,time()+60*30*24*60);
    header('Location:test1.php');
exit;

} 
 if($_SERVER ['REQUEST_METHOD']=== 'POST' && isset( $_POST['reset'])) {
    setcookie('color',$color,time()-1);

    header('Location:test1.php');

}






?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            text-align: center;
            
        }
    </style>
</head>
<body style="background-color:<?php echo $color?> " >
<h1>Create files & Change Bakground </h1>
<h3>Cookies & session</h3>
<form method="POST">
<input type="text" name="filename" required >
<br>
<select name="ext" >
    <option >TXT</option>
    <option >HTML</option>
    <option >CSS</option>
    <option >JS</option>
</select> 
<br>
<textarea name="area"  ></textarea >
<br>
<br>
<input type="color" name="color">
<br>
<br>
<BUtton name="create">Create</BUtton>
<br>
<br>
<button name="change">Change Background</button>
<br>
<br>
<button name="reset">Reset Background</button>


</form>
    
</body>
</html>