<?php
session_start();


include('../config/db.php');
?>
<?php include('parts/aheader.php'); ?>

<?php 

#silme kodu
if (isset($_GET['dsil'])) {



  $sql = "DELETE FROM contact WHERE id=:userdel_id ";

  $stmt = $conn->prepare($sql);
  $stmt->bindValue(':userdel_id', $_GET['dsil']);

  if ($stmt->execute()) {

?>
    <script>
      alert("ileti silindi");
      window.location.href=('admincontact.php');
      exit;
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("ileti silinemedi");
      window.location.href=('admincontact.php');
      exit;
    </script>
<?php


  }
}
?>




<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
  <h2>İletişim Sayfası</h2>
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
        $query =  "SELECT *FROM contact ORDER BY id DESC";
        $run = $conn->query($query);

        while ($row = $run->fetch()) :
        ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php  echo substr($row["message"], 0, 10);   ?> <a href="#look<?php echo $row['id']; ?>" data-toggle="modal"><button type='button' class='btn btn-primary btn-sm'>içeriği görüntüle</button></a></td>
            <td>
              <div class='btn-group' role='group' aria-label='...'>
                <a href="?dsil=<?php echo $row['id']; ?>"><button type='button' class='btn btn-danger btn-sm'>sil</button></a>
              </div>
            </td>
          </tr>



          <!-- Modal -->
          <div class="modal fade" id="look<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="sawModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">İçerik Görüntüleme</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <div class="modal-body">



                            <input type="hidden" name="edit_item_id" value="<?php echo $row['id'] ?>">
                            <div class="form-group">



                              <?php echo $row["message"];   ?>

                            </div>orem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tincidunt nunc pulvinar sapien et ligula ullamcorper. Urna et pharetra pharetra massa. Est ultricies integer quis auctor. Purus sit amet luctus venenatis lectus magna fringilla urna. Nisl pretium fusce id velit. Purus sit amet luctus venenatis lectus magna fringilla urna. Aenean et tortor at risus viverra adipiscing. Morbi enim nunc faucibus a pellentesque sit amet porttitor eget. Turpis egestas sed tempus urna et pharetra pharetra massa massa. Viverra accumsan in nisl nisi scelerisque eu ultrices vitae auctor. Suscipit tellus mauris a diam maecenas sed enim ut. Purus viverra accumsan in nisl nisi scelerisque eu.

Nunc sed velit dignissim sodales ut eu sem integer vitae. Aenean sed adipiscing diam donec adipiscing tristique risus nec. Turpis cursus in hac habitasse platea dictumst. Convallis aenean et tortor at risus viverra. Tellus pellentesque eu tincidunt tortor aliquam. Elementum curabitur vitae nunc sed velit. Neque ornare aenean euismod elementum nisi quis. Ut porttitor leo a diam sollicitudin tempor id eu nisl. Quam id leo in vitae turpis massa sed elementum tempus. Nisl nisi scelerisque eu ultrices vitae auctor. Cursus risus at ultrices mi tempus imperdiet nulla malesuada pellentesque. Egestas maecenas pharetra convallis posuere morbi leo urna molestie. Nunc sed blandit libero volutpat sed cras ornare arcu. Cursus euismod quis viverra nibh cras. Sed viverra ipsum nunc aliquet bibendum enim. Tellus elementum sagittis vitae et leo duis ut diam quam.

                        </div>
                      </div>
                    </div>


        <?php endwhile; ?>

      </tbody>
    </table>
  </div>
</main>
</div>
</div>





<?php include('parts/afooter.php'); ?>