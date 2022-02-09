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
    <a href="index.php"> <img src="brownlogo.jpg" class="logo"> </a>     </center>
        <div class="facebook"><a href="https://www.facebook.com/cafeetucan/"> <img src="http://www.archcitydefenders.org/wp-content/uploads/2014/07/fbook.png" class="facebook"> </a> </div>

      
              </div>                         
                  </div>
                  </div>            <h1>Log in</h1>
                  
                                <div class="formsforcontact sirka">      
                          <form name="loginform"  onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                  
                           <input type="text" id="jmeno" name="name" value="<?php if(isset($_POST["jmeno"])){echo $_POST["jmeno"];}?>"placeholder="Jméno">
                              <br>
                           <input type="password" id="heslo" name="heslo"  placeholder="Heslo">
                               <br>
                           <input type="submit" name="submit" value="OK">
                                     </form>
                  
                  
                  
                                </div>
                  
                              <br>
                              <?php 
 include "connect.php";
      if(isset($_POST['submit'])){
$jmeno = mysql_real_escape_string($_POST["name"]);/* nick zadaný ve formuláři pro přihlašování */
$heslo = mysql_real_escape_string($_POST["heslo"]);/* heslo zadané ve formuláři pro přihlašování */

	$select = mysql_query("SELECT * FROM uzivatele WHERE jmeno = '".$jmeno."' AND heslo = '".$heslo."' ") or die(mysql_error());
  $row=mysql_fetch_array($select);
                                           


	  if ($row["jmeno"] == $jmeno && $row["heslo"] == $heslo && ("" !== $jmeno || "" !== $heslo)){
    session_start();
	         $_SESSION['user'] = $jmeno;
              header("Location: nabidka.php");
	   
	}else{

    echo '<script language="javascript">';
    echo 'alert("Nesprávné údaje.")';
    echo '</script>';
   
    
	}
  }
  
    ?>
    
    
     <script>
function validateForm() {
    var x = document.forms["loginform"]["name"].value;
    var y = document.forms["loginform"]["heslo"].value;
    if (x == "") {
        alert("Nevyplnili jste jméno");
        return false;
    } else if(y==""){
    alert("Nevyplnili jste heslo");
    return false;
    }
}
         </script>
 

                  
                  
                  
                  
                  
                  
                  
                  
                         <div><?php include 'footer.php';?></div>
            </body>
                  </html>