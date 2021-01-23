<?php include('header.php'); ?>

<section id="#about" class="container">
  <div class="row">
    <div class="col-md-3 col-sm-12">
    </div>
    <div class="col-md-6 col-sm-12 text-center ">
      <article>
        <header>
          <br>
          <h1>Hakkımda</h1>
          <?php
  #hakkında tablosunu görüntülemek için döngü oluşturdum
          foreach ($conn->query('SELECT * from  about WHERE id="1" ') as $row) {

          ?>
        </header>
        <p>
          <?php echo $row["about"]; ?>

        </p>



      <?php  } ?>
      </article>
    </div>

    <div class="col-md-3 col-sm-12">
    </div>

  </div>

</section>

<?php include('footer.php'); ?>