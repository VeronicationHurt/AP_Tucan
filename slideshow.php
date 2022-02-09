
                    


                 <?php 
 include  'connect.php';





  

   $sql = mysql_query("SELECT `nazev` FROM `slideshow` ");
                
               $quest =($sql);
    while ($row = mysql_fetch_object($quest)) {
           
           echo("<div class='slideshow-container'>");           
           echo("<div class='mySlides fade'>"); 
           echo("<img src='slideshow/". $row->nazev . "'class='osmdesat' >'  ");
            echo("</div>"); 
            
              echo("</div>");   
                      }
              
              
              ?>
           <br>

      <script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
   
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {
    slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 2000);
}
</script>

             