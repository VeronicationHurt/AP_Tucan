
                                       <h1> KONTAKTY</h1>
  
                           
                        
                        
                          <p class="osmdesat zarovnani"> Máte zájem o spolupráci s kavárnou, pronájem prostor, catering, anebo si chcete 
                          jen zamluvit stůl pro odpolední posezení? Dejte nám vědět.</p>
                                                          <br>
                                                         <br>
                          
                          
                          <table class="hodiny sirka">
                           <tr> <td> <img src="heart.svg" class="icon"></td> <td> TUCAN CAFÉ, s. r. o.</td>         </tr>
                            <tr> <td> <img src="telef.svg" class="icon"></td> <td>  555 555 555</td>         </tr>
                            <tr> <td> <img src="adresa.svg" class="icon"></td> <td > Valašské Meziříčí, Náměstí 5/8, 757 01</td>         </tr>                                                  
                           <tr> <td> <img src="mail.svg" class="icon"></td> <td> tucan@seznam.cz</td>         </tr> 
                            
                       </table>
                          
                       
                                 
                                  
                                                     <br>
                                  
                  <div class="formsforcontact sirka">      
                          <form name="contactform" method="post" action="#"   enctype="text/html">

                              <h3>Kontaktuje nás </h3>
                                <table>
                               <p class="formtitulek"> Jméno:   </p>
                               <input type="text" id="fname" name="fname"  value="<?php if(isset($_POST["fname"])){echo $_POST["fname"];}?>" placeholder="Jméno">
                              <br>
                                                                                                   
                               
                               <p  class="formtitulek"> Váš e-mail:  </p>
                               <input type="text" id="email" name="email" value="<?php if(isset($_POST["email"])){echo $_POST["email"];}?>" placeholder="napriklad@seznam.cz">
                                  
                                                                  <br>
                              <p  class="formtitulek">  Co nám chcete sdělit: </p>                                   
                               <textarea id="subject" name="subject" placeholder="Rád bych si zamluvil stůl pro 3 lidi na pátou hodinu..."  value="<?php if(isset($_POST["subject"])){echo $_POST["subject"];}?>" style="height:200px;widht:300px"></textarea>
                                                                    <br>
                               <input type="submit" id="submit" name="submit" value="Odeslat">
                                     </table>
                                   </form>
                    </div>
                                    <br>
                      <p class="sirka"> Anebo se domluvme osobně. Mrkněte na mapu. </p>         <br>
                                 
                            
                                 
                                 
                  
                                                      
      
 
                   <?php      
        if(isset($_POST['submit'])) {
    $to = "veronikahurtov@seznam.cz";
    $subject = "Zpráva z webu";  
    $body = $_POST['subject'];
    $body .= "\r \n Odesláno uživatelem:  ";
    $body .= $_POST['fname'];
    $from = $_POST['email'];
     $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
     
     if (strlen( $_POST['fname']) < 1) {
     echo '<script language="javascript">';
    echo 'alert("Bez jména nebudeme vědět, s kým se domlouváme. :( ")';
    echo '</script>';
           }
        else if(!preg_match($email_exp,$from)) {
    echo '<script language="javascript">';
    echo 'alert("Bez správné emailové adresy nebude možná zpětná vazba. :( ")';
    echo '</script>';
  }
 else if(strlen( $_POST['subject']) < 10) {
     echo '<script language="javascript">';
    echo 'alert("Nechcete nám toho napsat více?")';
    echo '</script>';
  } else {
  
    
    
    
    
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: ' .$from . "\r\n";
        
@mail($to,$subject, $body,$headers);
   echo '<script language="javascript">';
    echo 'alert("Email úspěšně odeslán. Kontaktujeme Vás hned jak si ho přečteme. :) ")';
    echo '</script>';
          }
         }
?>
    