   <?php   $pageName = 'akce';  ?>

 <div class="akce ">
 
   <?php 
                // https://www.w3schools.com/php/php_mysql_select_limit.asp limited množnství    
             
 include  'connect.php';





                                  //  SELECT * FROM TABLE ORDER BY ID DESC LIMIT 1

   $sql = mysqli_query("SELECT `nazev`,`datum`,`text`,`obrazek` FROM `akce` ORDER BY id DESC LIMIT 1,10");
                
              $quest =($sql);
    while ($row = mysql_fetch_object($quest)) {
           echo("<h4>");           
           echo($row->nazev . ""); 
            echo("</h4>"); 
            
              echo("<h5>");   
            echo($row->datum . "<br>");  
            echo("</h5>"); 
            
            echo("<p class='crop'>");
            echo ("<img src='images/" . $row->obrazek . "' class='imaa' alt='Ilustrační obrázek'> " );
                 
                echo($row->text . "<br>");
              echo("</p> <br>");  
        
                }                                 
               
  if(!$quest){
         echo("Nepodařilo se zobrazit obsah!");
         var_dump($sql);
      
   }             







?>  
               </div>
                       
  