 <div class="footer grid-container-footer"> 



<div class="map">
          
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d162.04251286857664!2d17.971108225865017!3d49.47165690328517!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471390e0ed01652b%3A0xea9e6e83501adfa6!2sCAF%C3%89+TUCAN!5e0!3m2!1scs!2scz!4v1516028295244" class="mapa"  allowfullscreen></iframe>
 </div>
<div ><center><a href="index.php"> <img src="obdellogo.jpg" class="obdellogo"> </a></center></div>
 <div class="login">
                <div class="adresa white"> <p>Valašské Meziříčí <br> Náměstí 5/8 <br> 756 22</p> </div>  <br> <br> <br>   <br>
  <p> All rights reserved. </p>        <br> 
 
 
        <?php   if(isset ($_SESSION['user'])) { 
       ?> <p> <a href="logout.php">Odhlášení</a>  <?php } else { ?>
  <p><a href="prihlaseni.php">Přihlásit se.</a></p>      <?php }?>
   </div>

</div>
                          