 <!DOCTYPE html>
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">


 <title>Tucan </title>
</head>
   <body>   
   
      <div class="grid">
             
              <div class="hero-image ">
                  <div class="background">
     
<ul >
    <li class="menu"><a href="akce.php"> Akce </a>          </li>
    <li class="menu"><a href="prostory.php">Prostory</a>    </li>
    <li class="menu"><a href="fotogalerie.php">Fotogalerie</a></li>
    <li class="menu"><a href="kontakty.php">Kontakty</a>    </li>
    <li class="menu"><a href="bariste.php">Baristé</a>  </li>

</ul>    
    
   <div class="logoclass"><a href="index.php"> <img src="brownlogo.jpg"   class="logo"/></a>             </div>
                    <div class="facebookclass"> <a href="https://www.facebook.com/cafeetucan/"><img src="http://www.archcitydefenders.org/wp-content/uploads/2014/07/fbook.png" class="facebook"> </a>     </div>

                    
              </div>                         
                  </div>
                  
    
       
                  
            
                
                  
   <form action="#" method="post" >     
  <table class="prihlaseni">
    <tr>
      <td>Jméno: </td>
      <td colspan="50"><input type="text" name="jmeno" value="<?php if(isset($_POST["jmeno"])){echo $_POST["jmeno"];}?>" tabindex="1" /></td>
    </tr>
    <tr>
      <td>Heslo: </td>
      <td colspan="50"><input type="password" name="heslo" value=""  tabindex="2" /></td>
    </tr>
    <tr>
      <td>Ověření hesla: </td>
      <td colspan="50"><input type="password" name="over_heslo" value=""  tabindex="3" /></td>
    </tr>
      <tr>
      <td colspan="50"><input type="submit" name="submit" value="Registrovat se" /></td>
     
    </tr>
  </table>
</form>

     
 
   <?php  
             if(isset($_SESSION['login'])){ 
             echo("Jste přihlášený, pokud se chcete zaregistrovat, odhlašte se, prosím.");
             }
             else{
include "connect.php";
if(isset($_POST['submit'])) {
    $jmeno = mysql_real_escape_string($_POST['jmeno']);
    $heslo = mysql_real_escape_string($_POST['heslo']);
    $over_heslo = mysql_real_escape_string($_POST['over_heslo']);
    $md5_heslo = md5($heslo);   /*md5=hashováni*/
    
   
    if(preg_match("/^([A-Za-z0-9])+$/i", $_POST["jmeno"]) === 0)  {
echo("Jméno obsahuje nepovolené znaky!");
   
   } else{
function duplicita($jmeno){
    $vysledek = false;
    $dotaz = "SELECT * FROM registrovani WHERE jmeno = '" . $jmeno . "'";
    $quest = mysql_query($dotaz);
    if(!$quest){
      exit();
    }
    if(mysql_num_rows($quest) > 0){
      $vysledek = true;
    }
    
    return($vysledek);
  }
       if($jmeno==""){echo"Nebyl vyplněn nick!";}
        else if(duplicita($_POST['jmeno'])){ echo("Uživatel již existuje, zvolte jiné jméno."); }
        else if($heslo==""){echo"Nebylo vyplněno heslo";}
        else if($over_heslo==""){echo"Nebylo vyplněno ověřovací heslo";}
       else if($heslo!=$over_heslo){echo"Vyplněná hesla se neshodují";}
   
    else{
      $sql= mysql_query("INSERT INTO registrovani VALUES ('','$jmeno','$md5_heslo')") or die(mysql_error());
        echo"Registrace byla úspěšně dokončena!";
        
    
    }
    
    
    
    
    
    
    
    
    

}   }     }  
 
?>
       
  <div class="footer grid-container-footer"> 



<div class="map">
          
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162.04251286857664!2d17.971108225865017!3d49.47165690328517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471390e0ed01652b%3A0xea9e6e83501adfa6!2sCAF%C3%89+TUCAN!5e0!3m2!1scs!2scz!4v1516028295244" class="mapa"  allowfullscreen></iframe>
</div>

<div ><a href="index.php?page=onas"> <img src="obdellogo.jpg" class="obdellogo" alt="Logo Tucan CAFÉ - obdelníkové"> </a></div>

<div class="login">
    <div class="adresa white"> <p>Valašské Meziříčí <br> Náměstí 5/8 <br> 756 22</p> </div>  <br> <br> <br>   <br>
                                <p> All rights reserved. </p>        <br> 
 
 
 <?php    if(isset ($_SESSION['user'])) { 
?>  <p> <a href="index.php?page=logout">Odhlášení</a> </p> 
    <p> <a href="index.php?page=nabidka">Upravit </a> </p>
    <?php } else { ?>
    <p> <a href="index.php?page=prihlaseni">Přihlásit se.</a></p>      <?php }?>
   </div>

</div>
      
</body>
</html>
