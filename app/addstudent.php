<?PHP
session_start();
$islog = $_SESSION['islog'];
if (!($islog == true)) {
    echo "<script>window.location.href='/login.html'</script>";
}
class studentDB extends SQLite3
{
    function __construct()
    {
        $this->open('krm/db/std.db');
    }
}

$db = new studentDB();
function wsql($database, $table, $name, $id, $status)
{
    $database->exec("INSERT INTO $table (name,id,status) VALUES ('" . $name . "','" . $id . "'," . $status . ")");
};
function readsql($database, $table)
{
    $sql = "SELECT * FROM $table ORDER BY name";
    $results = $database->query($sql);
    $data  = [];
    $data2 = [];
    $data3 = [];
    while ($row = $results->fetchArray()) {
        array_push($data, $row['name']);
        array_push($data2, $row['id']);
        array_push($data3, $row['status']);
    };
    return [$data, $data2, $data3];
};
$stuname = [];
$stuid = [];
$stustat = [];
[$stuname, $stuid, $stustat] = readsql($db, 'user');
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
            <a class="navbar-brand" href="#"><img src="../favicon.ico" width="30" height="30" class="d-inline-block align-top" alt="">&nbsp; Hypno&nbsp; <i class="fa fa-chevron-right" aria-hidden="true"></i> &nbsp;Öğrenci Düzenleme</a>
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
                        Your Company
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
                        <h1>&nbsp; Your Company</h1>
                    </div>
                </div>
                <div class="container bg-transparent win-x">
                    <div class="d-inline-flex ">
                        <div class="info-card-body flex bg-white info-card-left text-center ">
                            <div class="p-3">
                                <i class="fas fa-user-plus panel-icon"></i>
                            </div>
                            <div class='container'>
                                <button class="hype-item-btn hype-btn-orange width-fill" data-toggle="modal" data-target="#addStudent">Öğrenci Ekle</button>
                                <div class="modal fade height-85" id="addStudent">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> <i class="fas fa-user-plus"></i> &nbsp; Öğrenci Ekle</h4>
                                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                            </div>

                                            <form action="<?php echo  $_SERVER['PHP_SELF']; ?>" method='post' class='text-left was-validated'>
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="studentname">Öğrenci Adı & SoyAdı:</label>
                                                        <input type="text" class="form-control" id="studentname" autocomplete="off" placeholder="Öğrenci İsmini Giriniz" name="studentname" required>
                                                        <div class="valid-feedback">Geçerli.</div>
                                                        <div class="invalid-feedback">Lütfen bu alanı doldurun.</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="studentid">Öğrenci Numarası:</label>
                                                        <input type="text" class="form-control" id="studentid" autocomplete="off" placeholder="Öğrenci Numarasını Giriniz" name="studentid" required>
                                                        <div class="valid-feedback">Geçerli.</div>
                                                        <div class="invalid-feedback">Lütfen bu alanı doldurun.</div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="studentstatus">Öğrenci Sınıf Düzeyi:</label>
                                                        <select class="form-control" id="studentstatus" placeholder="Öğrenci Numarasını Giriniz" name="studentstatus" required>
                                                            <option value="9">9.Sınıf</option>
                                                            <option value="10">10.Sınıf</option>
                                                            <option value="11">11.Sınıf</option>
                                                            <option value="12">12.Sınıf</option>
                                                            <option value="13">Mezun</option>
                                                        </select>

                                                    </div>
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type='submit' class='btn btn-outline-primary'> <i class="fas fa-save "></i> &nbsp; Kaydet</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fas fa-times-circle "></i> &nbsp; Close</button>
                                                </div>
                                                <?php
                                                if (isset($_POST['studentstatus']) && isset($_POST['studentname']) && isset($_POST['studentid'])) {
                                                    if (in_array($_POST['studentid'], $stuid)) {
                                                        echo "<script>alert('Girdiğiniz id  ile önceden kayıt edilmiş öğrenci var ')</script>";
                                                    } else {
                                                        wsql($db, 'user', $_POST['studentname'], $_POST['studentid'], $_POST['studentstatus']);
                                                    }
                                                }
                                                ?>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="info-card-body flex bg-white info-card-left text-center ">
                            <div class="p-3">
                                <i class="fas fa-user-slash panel-icon"></i>
                            </div>
                            <div class='container'>
                                <button class="hype-item-btn hype-btn-orange width-fill">Öğrenci Kaldır</button>
                            </div>
                        </div>
                        <div class="info-card-body flex bg-white info-card-left text-center ">
                            <div class="p-3">
                                <i class="fas fa-user-edit panel-icon"></i>
                            </div>
                            <div class='container'>

                                <!-- Button to Open the Modal -->
                                <button type="button" class="hype-item-btn hype-btn-orange width-fill" data-toggle="modal" data-target="#myModal">
                                    Öğrenci Listesi
                                </button>

                                <!-- The Modal -->
                                <div class="modal fade height-85" id="myModal">
                                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> <i class="fas fa-list-ul "></i> &nbsp; Öğrenci Listesi</h4>
                                                <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><span class='graduate p-2'>9</span>.Sınıf </a>
                                                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                                                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                                                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8">
                                                        <div class="tab-content" id="v-pills-tabContent">
                                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">...</div>
                                                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                                                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                                                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>
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