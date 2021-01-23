<?php
session_start();




include('../config/db.php');
?>


<?php

#silme kodu

if (isset($_GET['dsil'])) {


  $sql = "DELETE FROM works WHERE id=:work_id ";

  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':work_id', $_GET['dsil']);

  if ($stmt->execute()) {
?>
    <script>
      alert("iş silindi");
      window.location.href = ('adminworks.php');
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("kullanıcı silinemedi");
      window.location.href = ('adminusers.php');
    </script>
<?php


  }
}
?>


<?php include('parts/aheader.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <h2>Çalışmalar Sayfası</h2>
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <form class="form-signin" action="parts/jobuploader.php" method="post" enctype="multipart/form-data">
        <div class="card ">
          <div class="row mt-0">

          </div>
          <div class="form-group row mb-3">
            <div class="col-md-12 mb-0">
              <p class="mb-1">İş ismi</p> <input id="jobs" type="text" placeholder="referans" name="job" class="form-control input-box rm-border">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12 mb-2">
              <div class="form-group">
                <label for="exampleFormControlFile1">Referans resmi</label>
                <input type="file" name="file"/><br><br>
              </div>
            </div>
          </div>
          <div class="form-group row justify-content-center mb-0">
            <div class="col-md-12 px-3"> <input type="submit" name="record" value="Submit" class="btn btn-block btn-success rm-border"> </div>
          </div>
        </div>
      </form>

    </div>
    <div class="col-md-6 col-sm-6 ">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Header</th>
              <th>Header</th>
              <th>Header</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sth  = $conn->prepare('SELECT * from works');
            $sth->execute();
            $count = $sth->rowCount();

            if ($count > 0) {
              // output data of each row
              while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $id = $row['id'];
                $image = $row['image'];
                $workname = $row['workname'];
                echo "<tr>
            <td>$id</td>
            <td><img src=\"../uploads/".$image."\" height='100'/></td>
            <td> $workname</td>
         
            ";

            ?>
                <td>
                  <div class='btn-group' role='group' aria-label='...'>

                    
                    <a href="?dsil=<?php echo $id; ?>"><button type='button' class='btn btn-danger btn-sm'>sil</button></a>
                  </div>


                </td>
              


            <?php
              }
            }
            ?>

            <!-- modallar ve </tr> gelck --->


          </tbody>
        </table>
      </div>
    </div>
  </div>
</main>
</div>
</div>





<?php include('parts/afooter.php'); ?>