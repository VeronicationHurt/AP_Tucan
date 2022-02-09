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
    <li class="menu" ><a href="index.php?page=akce"> Akce </a>          </li>
    <li class="menu"><a href="index.php?page=prostory">Prostory</a>                                                 </li>
    <li class="menu"><a href="index.php?page=fotogalerie">Fotogalerie</a>                                           </li>
    <li class="menu"><a href="index.php?page=kontakty">Kontakty</a>                                                 </li>
    <li class="menu"><a href="index.php?page=bariste">Baristé</a>                                                   </li>

</ul>    
    
   <div class="logoclass"><a href="index.php?page=onas"> <img src="brownlogo.jpg"   class="logo"/></a>             </div>
     
  <div class="facebookclass"> <a href="https://www.facebook.com/cafeetucan/">
                              <img src="http://www.archcitydefenders.org/wp-content/uploads/2014/07/fbook.png" class="facebook"> </a>     </div>
                    
              </div>                         
                  </div>
        
     
<?php
    session_start();                  
                       
  $page = "onas";
	include "connect.php";
	
	parse_str($_SERVER['QUERY_STRING']);
	
	$pole = array( "$page" , ".php" );
	$filename = implode("", $pole);
  
	if (file_exists($filename))
	{
			include $filename;
	}
	else
	{ 
			include "onas.php";
	}
	?>
             
                 
          </div>   
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