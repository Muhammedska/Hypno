<?php 
session_start();
$islog = $_SESSION['islog'];
if (!empty($islog)) {
    if ($islog == true) {
        
        $cname = $_SESSION['companyname'];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Hypno</title>
    <meta name="description" content="Özel eğitim kurumu">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>

<body>
    <div>
        <nav class="navbar fixed-top  navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="../favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">&nbsp; Hypno
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <div class="container-fluid height-fill" style="padding-top:56px;">
        <div class="row height-fill">
            <div class="col-sm-4 p-3 height-fill bg-dark text-light width-fill">
                <div class="text-center">
                    <img src="../favicon.png" class='org-logo rounded-circle' alt="organisation logo" srcset="">
                </div>
                <div class="hype-border-down width-fill-nt win-y my-4 p-3 text-center">
                    <div class="win-x">
                        <?php echo $cname;?>
                    </div>

                    <small><small>Eğitim Geleceğin Garantisidir....</small></small>
                </div>
                <div class="text-light hype-border-btn">
                    <div class="container p-3 my-3">
                        <form action="../app/addstudent.php" method="POST" class='form-group'>
                            <button type="submit" class='btn btn-outline-primary width-fill p-2'>
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i> &nbsp; Öğrencileri Düzenle
                            </button>
                        </form>
                        <form action="../app/givehomework.php" method="POST" class='form-group'>
                            <button type="submit" class='btn btn-outline-primary width-fill p-2'>
                                <i class="fa fa-wpforms" aria-hidden="true"></i> &nbsp; Ödevlendirme Yap
                            </button>
                        </form>
                        <form action="../app/orgedit.php" method="POST" class='form-group'>
                            <button type="submit" class='btn btn-outline-primary width-fill p-2'>
                                <i class="fa fa-wrench" aria-hidden="true"></i> &nbsp; Kurum Bilgisi Düzenle
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 p-3 height-fill bg-primary">
                <div class="container bg-dark text-light soft-edge my-3 p-3">
                    <div class="d-inline-flex width-fill">
                        <img src="../favicon.ico" alt="kurum logo" class='logo-panel' srcset="">
                        <h1>&nbsp; <?php echo $cname;?></h1>
                    </div>
                </div>
                <div class="container bg-transparent win-x">
                    <div class="d-inline-flex ">
                        <div class="info-card-body flex bg-white info-card-left text-center ">
                            <div class="text-center  rounded-circle info-border my-2">
                                21303
                            </div>
                            <div>
                                öğrenci sayınız
                            </div>
                        </div>
                        <div class="info-card-body flex bg-white info-card-left text-center ">
                            <div class="text-center  rounded-circle info-border my-2">
                                21303
                            </div>
                            <div>
                                öğrenci sayınız
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
</body>

</html>