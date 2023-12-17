<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Task Collection</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="style/vendor/fontawesome-free/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href ="style/css/sb-admin-2.css">
    <link rel="stylesheet" href ="style/css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
@include('layout.lecturerMenu')     
@include('layout.lecturerNotification')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tugas Baru</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                        <form action="/postTugas" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                            <input type="text" id="task_id" name="task_id" value="{{isset($editTugas['task_id']) ? $editTugas['task_id'] : ''}}"readonly>
                                                <div class="col-25">
                                                    <label for="tname">Nama Tugas</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="text" id="tname" name="tname" placeholder="Masukkan Judul Tugas" value='{{isset($editTugas['judul']) ? $editTugas['judul'] : ''}}'>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="tkelas">Kelas</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="text" id='kelas' name="kelas" placeholder="Masukkan Kelas " value='{{session('loggedUserClass')}}'>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="dtugas">Deskripsi Tugas</label>
                                                </div>
                                                <div class="col-75">
                                                    <textarea class="form-control" type="text" name="namatugas" id="namatugas" placeholder="Masukkan deskripsi sesuai perintah tugas yang perlu dikerjakan, seperti: Buat A, Hitung A, Kirim A.">{{isset($editTugas['deskripsi']) ? $editTugas['deskripsi'] : ''}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="tanggal">Upload File</label>
                                                </div>
                                                <div class="col-75">
                                                <!-- <input type="text" id="file" name="file" placeholder="Masukkan File"> -->
                                                <input type="file" id="file" name="file" multiple>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="ttglmasuk">Tenggat pengumpulan</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="date" name="tanggalmasuk" id="tanggalmasuk" placeholder="Masukkan Tanggal Masuk " value='{{isset($editTugas['tenggat']) ? $editTugas['tenggat'] : ''}}'>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <button class="button button1" type="submit">Submit</button>
                                            </div>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

                    <div class="row">
                        
                    </div>

                   <!--  Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            
                            <!-- Approach -->
                            

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bersiap Untuk Pergi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Apakah kamu yakin?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/login">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="style/vendor/jquery/jquery.min.js"></script>
    <script src="style/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="style/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="style/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="style/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="style/js/demo/chart-area-demo.js"></script>
    <script src="style/js/demo/chart-pie-demo.js"></script>

</body>

</html>