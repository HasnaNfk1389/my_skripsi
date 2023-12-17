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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="style/css/sb-admin-2.css">
    <link rel="stylesheet" href="style/css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       
        @if(session('loggedUserRole')==='teacher')
        @include('layout.lecturerMenu')     
        @include('layout.lecturerNotification')
        @endif
        @if(session('loggedUserRole')==='user')
        @include('layout.studentmenu')     
        @include('layout.notification')
        @endif

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Materi</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul Materi</th>
                                                    <th colspan="2">Link</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>BAB I</td>
                                                    <td>Memahami kondisi wilayah dan posisi strategis Indonesia sebagai poros maritim dunia</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB II</td>
                                                    <td>Menganalisis sebaran flora dan fauna di Indonesia dan dunia berdasarkan karakteristik ekosistem</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB III</td>
                                                    <td>Menganalisis sebaran dan pengelolaan sumber daya kehutanan, pertambangan, kelautan, dan pariwisata sesuai prinsip-prinsip pembangunan berkelanjutan</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB IV</td>
                                                    <td>Menganalisis ketahanan pangan nasional, penyediaan bahan industri, serta potensi energi baru dan terbarukan di Indonesia</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB V</td>
                                                    <td>Menganalisis dinamika kependudukan di Indonesia untuk perencanaan pembangunan</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB VI</td>
                                                    <td>Menganalisis keragaman budaya bangsa sebagai identitas nasional berdasarkan keunikan dan sebaran</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                                <tr>
                                                    <td>BAB VII</td>
                                                    <td>Menganalisis jenis dan penanggulangan bencana alam melalui edukasi, kearifan lokal, dan pemanfaatan teknologi modern</td>
                                                    <td><button class="button button2">Open</button></td>
                                                    <td><button class="button button1">Download</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--  Content Row -->
                            <div class="row">
                                <!-- Content Column -->
                                <div class="col-lg-6 mb-4">
                                </div>
                                <div class="col-lg-6 mb-4">
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
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Bersiap untuk pergi?</h5>
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