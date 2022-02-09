
                      <?php        
                        
                        if (isset($_SESSION['user'])) {
                      
                      
                       ?>
                       <h1>Co si přejete upravit?</h1>
                           <div class="backgroundnabidky"> 
                           
                                                 
                           
                         
                          <p>    <a href="index.php?page=uploadimage"> Přidat akci</a>   </p>  
                         <p>  <a href="index.php?page=vypisakci"> Upravit nebo smazat akci</a>   </p>          
                          <p>  <a href="index.php?page=slideshowchange" > Upravit slideshow</a>       </p>  
                           
                           
                  
                                     </div>      <?php  } else { echo("Jen pro adminy!");}?>
                            
                  
                            
                  
                        