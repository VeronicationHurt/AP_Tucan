    <div class="osmdesat  sirka mid">  
    
                          
<a href="index.php?page=nabidka"><button>Zpět</button></a>



                  
<form action="#" method="post" enctype="multipart/form-data">     <br>
    Vyberte obrázek:
    <input type="file" name="fileToUpload" id="fileToUpload">                 <br>
  
    <input type="submit" value="Nahrát" name="submit">       <br>                   <br>
</form>
 
 
  <?php  
             
include "connect.php";

     $sql = mysql_query("SELECT `id`,`nazev` FROM `slideshow` ");
                
               $quest =($sql);
    while ($row = mysql_fetch_object($quest)) {
    $id=$row->id;
 echo ("<img src='slideshow/" . $row->nazev . "' class='imaslide '> " );
          
          ?>   <div class="odkaz">
              <a href="index.php?page=smazatslide&cislo=<?php echo ($id) ?>" class="odkaz2">  Smazat</a> 
              
              
               </div> 
            <?php     }
            
             
            
            
        


if(isset($_POST['submit'])) {

    
    $nazev =  basename($_FILES["fileToUpload"]["name"]);
    $pic = "img";
    $newfilename = time() . basename($_FILES["fileToUpload"]["name"]);
    $target_dir = "slideshow/";
    $target_file = $target_dir .basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
   
  
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
     echo '<script language="javascript">';
    echo "alert('Obrázek je příliš velký.')";
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
     
   
    
    
   
     else if($check !== false) {
      
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

} else {




  
    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "slideshow/" . $newfilename)){ 
    
     $sql= mysql_query("INSERT INTO slideshow VALUES ('','$newfilename')") or die(mysql_error());
        
        echo"Úspěšně nahráno na server. <br>" ;
         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         
    }
}   }
 


            



  ?>      </div>