




<?php 
 session_start();



 
 include('../config/db.php');

?>
<?php  include ('parts/aheader.php'); ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <h2>Hakkında Sayfası</h2>
      
        <div class="row">
<section  class="col-lg-6 col-sm-12">
<?php
    

if(isset($_POST['kaydet']))
{


$acontent=clean($_POST['aboutcontent']);

     $sql = "UPDATE about SET about=? WHERE id=1";
 $stmt= $conn->prepare($sql);
         $stmt->execute(array($acontent));
         header('Location: '.$_SERVER['PHP_SELF']); 
}





  foreach($conn->query('SELECT * from  about WHERE id="1" ') as $row) 
    {

      ?>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">



       
    


      <div class="form-group">

        
  <div id="sample">

  <h4>
   İçerik
  </h4>
  <textarea class="form-control" name="aboutcontent"  required rows="15" id="pdetail"  style="width: 100%" >
  <?php echo $row["about"]; ?>
</textarea><br />
 
</div>
</div>






        <div class="form-group">
            <button type="submit" name="kaydet"class="btn btn-info btn-lg btn-block">Gönder</button>
        </div>


</form>
 <?php
    
  }

      ?>

    </section>


<section  class="col-lg-6 col-sm-12">


 <?php
    
  foreach($conn->query('SELECT * from about') as $row) 
    {

      ?>
      
<blockquote><?php echo $row["about"]; ?></blockquote>

         <?php
    }
   
?>

    </section>
        </div>



      </main>
    </div>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">eader
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <?php  include ('parts/afooter.php'); ?>