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
     
<ul>
    <li><a href="akce.php"> Akce </a>          </li>
    <li><a href="prostory.php">Prostory</a>    </li>
    <li><a href="fotogalerie.php">Fotogalerie</a></li>
    <li><a href="kontakty.php">Kontakty</a>    </li>
    <li><a href="bariste.php">Baristé</a>  </li>

</ul>
       <center>
    <a href="index.php"> <img src="brownlogo.jpg" class="logo"> </a>  </center>
        <div class="facebook"><a href="https://www.facebook.com/cafeetucan/"> <img src="http://www.archcitydefenders.org/wp-content/uploads/2014/07/fbook.png" class="facebook"> </a> </div>

      
              </div>                         
                  </div>
                  </div>     
                  
                  
                  <?php
include "connect.php";
$login = mysql_real_escape_string($_POST["name"]);/* nick zadaný ve formuláři pro přihlašování */
$heslo = mysql_real_escape_string($_POST["heslo"]);/* heslo zadané ve formuláři pro přihlašování */

/* — SQL DOTAZ PRO OVĚŘENÍ PRAVOSTI PŘIHLAŠOVACÍH DAT V DATABÁZI A UŽIVATELEM ZADANÝCH — */
$dotaz = mysql_query("select * from uzivatele where jmeno = '$login' and heslo = '$heslo'");
$overeni = mysql_num_rows($dotaz);
$row = mysql_fetch_array($dotaz);

if($overeni == 1) {
echo"Přihlášení alles gut!";
} else {
 echo"Zadal jsi špatný login nebo heslo!";
}
?>
                  
                  
                  
                           <br>
                  
                  
                  
                  
                  
                  
                         <div><?php include 'footer.php';?></div>
            </body>
                  </html>