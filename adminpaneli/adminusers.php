<?php
session_start();




include('../config/db.php');
?>


<?php

#kullanıcı silme kodu
if (isset($_GET['dsil'])) {
  $sql = "DELETE FROM  users WHERE id=:userdel_id ";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':userdel_id', $_GET['dsil']);

  if ($stmt->execute()) {

?>
    <script>
      alert("kullanıcı silindi");
      window.location.href = ('adminusers.php');
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

#kullanıcı maili güncelleme kodu
if (isset($_POST['update_item'])) {
  $id = $_POST['edit_item_id'];
  $email = clean($_POST['eemail']);
  $password = $_POST['epass'];
  $sql = "UPDATE users SET  usermail =:usermail, password =:pass WHERE id =:id ";
  $q = $conn->prepare($sql);
  $q->execute(array(':usermail' => $email, ':pass' => $password, ':id' => $id));
  echo '<script>window.location.href="adminusers.php"</script>';
}

?>


<?php include('parts/aheader.php'); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <h2>kullanıcıların Sayfası</h2>
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
        $sth  = $conn->prepare('SELECT * from users');
        $sth->execute();
        $count = $sth->rowCount();

        if ($count > 0) {
          // output data of each row
          while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $id = $row['id'];
            $email = $row['usermail'];
            $password = $row['password'];
            echo "<tr>
            <td>$id</td>
            <td> $email</td>
            <td> $password</td>
         
            ";

        ?>
            <td>
              <div class='btn-group' role='group' aria-label='...'>

                <a href="#editModal<?php echo $id; ?>" data-toggle="modal"><button type='button' class='btn btn-warning btn-sm'>edit</button></a>
                <a href="?dsil=<?php echo $id; ?>"><button type='button' class='btn btn-danger btn-sm'>sil</button></a>
              </div>


            </td>
            <!-- editModal-->
            <div class="modal fade" id="editModal<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="sawModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit penceresi</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" role="form " method="post">

                      <input type="hidden" name="edit_item_id" value="<?php echo $row['id'] ?>">
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input name="eemail" value="<?php echo $row['usermail']; ?>" class="form-control form-control-lg" placeholder="" id="email" type="text">
                      </div>
                      <div class="form-group">
                        <label for="pdetail">parola</label>
                        <input name="epass" value="<?php echo $row['password']; ?>" class="form-control form-control-lg" placeholder="Email" id="atitle" type="password">
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Edit</button>
                      </div>
                    </form>

                  </div>

                </div>
              </div>
            </div>




        <?php
          }
        }
        ?>

        <!-- modallar ve </tr> gelck --->


      </tbody>
    </table>
  </div>
</main>
</div>
</div>





<?php include('parts/afooter.php'); ?>