<?php
include('../config/db.php');

session_start();

# kayıt kısmı
if (isset($_POST['login'])) {
    #forumdan gelen veriler
    $usermail = clean($_POST['usermail']);
    $password = clean($_POST['password']);

    $stmt = $conn->prepare('SELECT * FROM users WHERE usermail=:usermail AND password=:password');
    $stmt->execute(array(':usermail' => $usermail, ':password' => $password));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
     #kullanıcı kontrolü
    if ($stmt->rowCount() > 0) {
        $_SESSION["usermail"] = $row['usermail'];
        echo '<script>window.location.href="adminindex.php"</script>';
    } else {
        $message = 'Şifreniz eşleşmiyor';
    }
}



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

    <div class="container">
        <div id="loginbox" style="margin-top: 50px;" class="mainbox col-lg-6 offset-md-3 col-md-8 offset-sm-2">
            <div class="card card-inverse card-info">
                <div class="card-header">
                    <div class="card-title text-center">Giriş Yap</div>

                </div>
            </div>
            <div style="padding-top: 30px;" class="card-block">
                <div style="display: none;" id="login-alert" class="alert alert-danger col-md-12"></div>
                <form id="loginform" class="" role="form" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <!-- hata olduğundan buradan mesaj gelecek" -->
                    <?php if (!empty($message)) : ?>
                        <p class="text-danger"><?= $message ?></p>
                    <?php endif; ?>
                    <div style="margin-bottom: 25px;" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="email" class="form-control" name="usermail" value="" placeholder="username or email" />
                    </div>
                    <div style="margin-bottom: 25px;" class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password" />
                    </div>

                    <div style="margin-top: 10px;" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls">
                            <button name="login" class="btn btn-lg btn-success btn-block" type="submit">Giriş Yap</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>

</html>