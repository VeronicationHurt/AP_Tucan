       
     
      <?php     
 
     $connect = mysql_connect("sql2.webzdarma.cz", "kavarnatucan2060", "P1RsMLX");
      if(!$connect){
      echo ("Chyba: nepodařilo se připojit k databázi! <br>");
      exit();
     }      
     
    //zvolení databáze
     $database = mysql_select_db("kavarnatucan2060");
     if(!$database){
      echo ("Chyba: nepodařilo se vybrat databázi! <br>");
      exit();
     }
     
     mysql_query("SET NAMES 'utf8'");   
  ?>

