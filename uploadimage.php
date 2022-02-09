
                  
              <?php  if (isset($_SESSION['user'])) { ?>     
              
              
                  
                  
      <div class="sirka">            
      <a href="index.php?page=nabidka"><button>Zpět</button></a>

<form action="#" method="post" enctype="multipart/form-data"> 
 <table class="prihlaseni">   
 
   <tr>Obrázek:   </tr> 
   <tr><input type="file" name="fileToUpload" id="fileToUpload">  <br>    </tr>    
       
  <tr> Název akce:   </tr> 
  <tr><input type="text" name="nazev" id="nazev" >          <br>       </tr>    
                 
 <tr>Datum akce:   </tr> 
  <tr><input type="text" name="datum" id="datum" >              <br>      </tr>   
                   
   <tr>Něco o akci:   </tr>                                   
 <tr><textarea name="text" id="text" style="vertical-align: middle;"></textarea> <br>
    <input type="submit" value="Nahrát na server" name="submit" >                       
    </table>
</form>

     </div>                             



   <?php  
             
include "connect.php";

 
if(isset($_POST['submit'])) {
    $nazev = mysql_real_escape_string($_POST['nazev']);
    $datum = mysql_real_escape_string($_POST['datum']);
    $text = mysql_real_escape_string($_POST['text']);
    $obrazek =  basename($_FILES["fileToUpload"]["name"]);
    
    
    $pic = "img";
    $newfilename = time() . basename($_FILES["fileToUpload"]["name"]);
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   
     if (file_exists($target_file)) {
      echo '<script language="javascript">';
    echo "Sorry, file already exists.";
    echo '</script>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
     echo '<script language="javascript">';
    echo "Obrázek je příliš velký.";
    echo '</script>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
     echo '<script language="javascript">';
    echo 'alert("Jen JPG, JPEG, PNG & GIF soubory jsou povoleny")';
     echo '</script>';
    $uploadOk = 0;
}
     
    if($nazev==""){
    echo '<script language="javascript">';
    echo'alert("Nebyl vyplněn název!")';
    echo '</script>';
    }
   
    else if($datum==""){
    echo '<script language="javascript">';
    echo'alert("Nebylo vyplněno datum")';
     echo '</script>';}
    else if($text==""){
    echo '<script language="javascript">';
    echo'alert("Nebyl vyplněn text k akci")';
     echo '</script>';}
    
    
   
     else if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else{
      echo '<script language="javascript">';
       echo 'alert("File is not an image.")';
        echo '</script>';
        $uploadOk = 0;
    }
   
         if ($uploadOk == 0) {
         echo '<script language="javascript">';
    echo 'alert("Nelze provést.")';
    echo '</script>';
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "images/" . $newfilename)) {
       
    
        $sql= mysql_query("INSERT INTO akce VALUES ('','$nazev','$datum','$text', '$newfilename')") or die(mysql_error());
        
        echo"Úspěšně nahráno na server. <br>" ;
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    
    }
}   }
           } else {
           
           echo("Jen pro adminy!");
           }







  ?>






