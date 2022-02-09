

<?php 
 include  'connect.php';

    if (isset($_SESSION['user'])) {

  $id= $_GET['cislo'];
  
     ?>  
     
    <div class="sirka"> 
    <a href="index.php?page=nabidka" ><button >Zpět</button></a>

     
                   <h2>Aktualizace události: </h2>  <br>
      <form action="#" method="post" enctype="multipart/form-data">   
                <table class="sirka">                    
   <tr> <td>  Název: </td>                    
 <td>  <textarea name = "nazev" cols="80" rows="3"  style="vertical-align: middle;"><?php $sql = mysql_query("SELECT `nazev` FROM `akce` WHERE id='$id'");
                 $quest =($sql);
                while ($row = mysql_fetch_object($quest)) {echo($row->nazev . ""); }?></textarea> </td> </tr>   
   
    <tr> <td>  Datum: </td>                    
 <td>  <textarea name = "datum" cols="80" rows="3"  style="vertical-align: middle;"><?php $sql = mysql_query("SELECT `datum` FROM `akce` WHERE id='$id'");
                 $quest =($sql);
                while ($row = mysql_fetch_object($quest)) {echo($row->datum . ""); }?></textarea> </td> </tr> 
   
   <tr> <td>  Text: </td>                    
 <td>  <textarea name = "text" cols="80" rows="15"  style="vertical-align: middle;"><?php $sql = mysql_query("SELECT `text` FROM `akce` WHERE id='$id'");
                 $quest =($sql);
                while ($row = mysql_fetch_object($quest)) {echo($row->text . ""); }?></textarea> </td> </tr>   
   
   
       <tr> <td>  Obrázek: </td>                    
 <td> <?php $sql = mysql_query("SELECT `obrazek` FROM `akce` WHERE id='$id'");
                                               $quest =($sql);
                                          while ($row = mysql_fetch_object($quest)) {
    
                                              echo ("<img src='images/" . $row->obrazek . "' class='imaaupravit'> " );
                                            } ?> <br> <input type="file" name="fileToUpload" id="fileToUpload" ></td> </tr>   
      
                                               
  
                <tr><td></td> <td> <input name = "submit" type="submit" value="Upravit"  />  <br>  </td> </tr>                             
                                        
                                  </table>  
                                       
                                </form>     <br>   </div>


<?php
if(isset($_POST['submit'])) {
         $datum = mysql_real_escape_string($_POST['datum']);
          $text = mysql_real_escape_string($_POST['text']);
          $nazev = mysql_real_escape_string($_POST['nazev']); 
if (isset($_FILES["fileToUpload"]["name"])) {

    $name = $_FILES["fileToUpload"]["name"];
    

    if (!empty($name)) {
    $obrazek =  basename($_FILES["fileToUpload"]["name"]);  
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    $obrazek =  basename($_FILES["fileToUpload"]["name"]);
     
    $newfilename = time() . basename($_FILES["fileToUpload"]["name"]);

    
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

 if($check !== false) {
       // echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else{
      echo '<script language="javascript">';
       echo 'alert("File is not an image.")';
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
    
    
   
     
   
         if ($uploadOk == 0) {
         echo '<script language="javascript">';
    echo 'alert("Nelze provést.")';
    echo '</script>';
   
              }
         
  
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "images/" . $newfilename)) {
       
    
      $sql = mysql_query("UPDATE `akce` SET `text`='$text' , `datum`='$datum' ,`nazev`='$nazev', `obrazek`='$newfilename' WHERE id='$id'") or die(mysql_error());
      $quest =($sql);
      echo"Úspěšně změněno" ;

      
            echo 'Uploaded';
            header("Refresh:1");
    }   

    } else {
        
         if($nazev=="") {
                   echo"Nebyl vyplněn obsah!";
       } else if($text=="")  {
                          echo"Nebyl vyplněn obsah!";
      } else if($datum==""){
                         echo"Nebyl vyplněn obsah!";
        } else {


      $sql = mysql_query("UPDATE `akce` SET `text`='$text' , `datum`='$datum' ,`nazev`='$nazev' WHERE id='$id'") or die(mysql_error());
      $quest =($sql);
      echo"Úspěšně změněno" ;
     header("Refresh:1");
    }
}  } }


} else {
               echo ("Jen pro adminy");
              
              }

?>

