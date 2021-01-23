
  <?php  include ('header.php'); ?>
  <div class="container" style="margin-top:20px;">
    <h1 style="text-align:center;color:black;">Çalışmalarım</h1><br>
   
    <hr noshade style="margin-top:-20px;">
    <div class="container">
     
       
          <div class="lightbox-gallery">
            <div class="container">
              <div class="intro">
               
              </div>
              <div class="row photos">
              <?php
            $sth  = $conn->prepare('SELECT * from works');
            $sth->execute();
            $count = $sth->rowCount();
            #yapılan iş varsa sıralayacak 
            if ($count > 0) {
              // her bir veriyi yazdır
              while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $image = $row['image'];
                $workname = $row['workname'];
       
                echo " <div class='Portfolio col-md-3'><a href=\"uploads/".$image."\" data-lightbox='photos'>" ;
                echo "  <img class='img-fluid' src=\"uploads/".$image."\" '></a>    " ;
            echo" <div class='desc'>$workname</div>
            </div>
           " ;
         
              }}
            ?>
            <!--
                <div class="Portfolio col-md-3"><a href="img/pos.png" data-lightbox="photos">
                <img class="img-fluid"src="img/pos.png"></a>
                  <div class="desc">X firması pos kurulumu</div>
                </div>
               
            -->
           
      
       
    
      
        </div>
    </div>

  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"
    integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ=="
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css"
    integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA=="
    crossorigin="anonymous" />


    <?php  include ('footer.php'); ?>