     <?php 
 
 include "connect.php";
      if(isset($_POST['submit'])){
$jmeno = mysql_real_escape_string($_POST["jmeno"]);/* nick zadaný ve formuláři pro přihlašování */
$heslo = mysql_real_escape_string($_POST["heslo"]);/* heslo zadané ve formuláři pro přihlašování */
$md5heslo = md5($heslo);/* Pomocí funkce md5() heslo zahashujeme */
	$select = mysql_query("SELECT * FROM registrovani WHERE jmeno = '".$jmeno."' AND heslo = '".md5($heslo)."' ") or die(mysql_error());
  $row=mysql_fetch_array($select);
                                           


	  if ($row["jmeno"] == $jmeno && $row["heslo"] == md5($heslo) && ("" !== $jmeno || "" !== md5($heslo))){
                 session_start();
    
          
      
     
       
       $_SESSION['user'] = $jmeno;
        
        if (isset($_SESSION['user'])) {
      
    header( "Location: index.php?page=nabidka");
  
}else {
echo("Není session");

}}else{

    echo("Špatné jméno nebo heslo.");
   
    
	}
  }
 
 
 
?>        
                     
<form action="#" method="post">     
    <table class="prihlaseni" >
      <tr>
        <td>Přezdívka: </td>
        <td><input type="text" name="jmeno" value="" size="17" tabindex="1" /></td>
      </tr>
      <tr>
        <td>Heslo: </td>
        <td><input type="password" name="heslo" value="" size="17" tabindex="2" /></td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="submit" value="Přihlásit se" /></td>
      </tr>
      
    </table>
  </form>
  
  

