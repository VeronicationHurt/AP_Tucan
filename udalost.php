  
         <div class="akce">
          
    <?php 
 include  'connect.php';





                                  //  SELECT * FROM TABLE ORDER BY ID DESC LIMIT 1

 $sql = mysql_query("SELECT `nazev`,`datum`,`text`,`obrazek` FROM `akce` ORDER BY id DESC LIMIT 1");
                
              $quest =($sql);
    while ($row = mysql_fetch_object($quest)) {
           echo("<h4>");           
           echo($row->nazev . ""); 
            echo("</h4>"); 
            
              echo("<h5>");   
            echo($row->datum . "<br>");  
            echo("</h5>"); 
            
            echo("<p class='zarovnani'>");
            echo ("<img src='images/" . $row->obrazek . "' class='imaa'> " );
                 
                echo($row->text . "<br>");
              echo("</p>");  
        
                }
               
  if(!$quest){
         echo("Nepodařilo se zobrazit obsah!");
         var_dump($sql);
      
   }             







?>  

 
 </div>