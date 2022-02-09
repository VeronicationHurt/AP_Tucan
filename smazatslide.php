

<?php 
 
 if (isset($_SESSION['user'])) {
 
 include  'connect.php';
   $id= $_GET['cislo'];
    
       
       $sql= mysql_query("DELETE FROM slideshow WHERE id='$id'") or die(mysql_error());
          $quest =($sql);
          
            if(!$quest){
         echo("Nepodařilo se smazat obsah!");
         var_dump($sql);
      
   }       else {
        echo"Úspěšně smazáno" ;
                 header('Location: index.php?page=slideshowchange');
                 
                 }

       }  else {
       echo("Jen pro adminy!");
       }
?>