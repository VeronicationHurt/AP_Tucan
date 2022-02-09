<div class="sirka"><a href="index.php?page=nabidka"><button>Zpět</button></a></div>
           <div class="akce">

<?php 
 include  'connect.php';


              if (isset($_SESSION['user'])) {


  

   $sql = mysql_query("SELECT `id`,`nazev`,`datum`,`text`,`obrazek` FROM `akce` ");
                
               $quest =($sql);
    while ($row = mysql_fetch_object($quest)) {
            $id=$row->id;
           echo("<h4>");           
           echo($row->nazev . ""); 
            echo("</h4>"); 
            
              echo("<h5>");   
            echo($row->datum . "<br>");  
            echo("</h5>"); 
           
            echo("<p>");
            echo ("<img src='images/" . $row->obrazek . "' class='imaa'> " );
                 
                echo($row->text . "<br>");
              echo("</p>");  
              
              
              ?>
              <div class="odkaz">
            
               <a href="index.php?page=upravit&cislo=<?php echo ($id) ?>" class="odkaz" >Změnit</a>
              
              <a href="index.php?page=smazat&cislo=<?php echo ($id) ?>" class="odkaz">Smazat</a> 
               </div>
              <?php
                 echo("<div class='linka'> </div>");
                }
               
  if(!$quest){
         echo("Nepodařilo se zobrazit obsah!");
         var_dump($sql);
      
   }                







?>
           </div>   <?php  } else { echo("Jen pro adminy!");}?>
 