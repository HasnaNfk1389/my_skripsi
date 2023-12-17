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

        <!-- Sidebar -->
        @if(session('loggedUserRole')==='teacher')
@include('layout.lecturerMenu')     
@include('layout.lecturerNotification')
@endif
@if(session('loggedUserRole')==='admin')
@include('layout.lecturerMenu')     
@include('layout.lecturerNotification')
@endif
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Penambahan Materi</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="container">
                                        @if($kode==='Tambah Materi')
                                        <form action="/store_materi" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                



                                                <script>
            
                                                </script>



                                                <b>File Materi</b><br/>
                                                <input type="file" name="file" >
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="judul">Judul</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="text" id="judul" name="judul" placeholder="Masukan Judul (BAB)">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="deskripsi">Deskripsi Materi</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Materi">
                                                </div>
                     
                     
                                                <div class="form-group">
                                                    <select class="form-select mb-2 rounded-full" name="kelas" aria-label="Default select example">
                                                        <option selected value='All'>Preferensi Kelas</option>
                                                        <option value="All">Semua Kelas</option>                                    <option value="XI-IPS">XI-IPS</option>
                                                        <option value="XI-IPA">XI-IPA</option>
                                                        <option value="XI-Agama">XI-Agama</option>
                                                    </select>
                                                    </div>
                     
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col-25">
                                                    <label for="tanggal">Upload</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="file" id="myfile" name="myfile" multiple>
                                                </div>
                                            </div> -->
                                            <br>
                                            <div class="row">

                                                <button type="submit" name="submit" class="button button1">{{$kode}}</button>


                                    
                                            </div>
                                        </form>

                                        @endif



                                        @if($kode==='Edit Materi')
                                        <form action="/proses_edit_materi" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                



                                                <script>
            
                                                </script>



                                                <b>File Materi</b><br/>
                                                <input type="file" name="file">
                                                
                                                
                                                <a href='storage/{{$editMateri['path']}}'>Current File</a>

                                                <input type="hidden" id="judulcurrent" name="judulcurrent" value='{{$editMateri['nama_materi']}}' readonly>

                                                <input type="hidden" id="deskripsicurrent" name="deskripsicurrent" value='{{$editMateri['deskripsi_materi']}}'readonly>

                                                <input type="hidden" id="idcurrent" name="idcurrent" value='{{$editMateri['id']}}'readonly>
                                                
                                                <input type="hidden" id="useridcurrent" name="useridcurrent" value='{{$editMateri['user_id']}}'readonly>

                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="judul">Judul</label>
                                                </div>
                                                <div class="col-75">
                                                    
                                                    <input type="text" id="judul" name="judul" placeholder="Masukan Judul (BAB)" value='{{$editMateri['nama_materi']}}'>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-25">
                                                    <label for="deskripsi">Deskripsi Materi</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="text" id="deskripsi" name="deskripsi" placeholder="Masukan Deskripsi Materi" value='{{$editMateri['deskripsi_materi']}}'>
                                                </div>
                    
                                                <div class="form-group">
                                                    <select class="form-select mb-2 rounded-full" name="kelas" aria-label="Default select example">
                                                        <option selected value='{{$editMateri['kelas']}}'>Preferensi Kelas</option>
                                                        <option value="All">Semua Kelas</option>                                    <option value="XI-IPS">XI-IPS</option>
                                                        <option value="XI-IPA">XI-IPA</option>
                                                        <option value="XI-Agama">XI-Agama</option>
                                                    </select>
                                                    </div>
                                            </div>

                                            <!-- <div class="row">
                                                <div class="col-25">
                                                    <label for="tanggal">Upload</label>
                                                </div>
                                                <div class="col-75">
                                                    <input type="file" id="myfile" name="myfile" multiple>
                                                </div>
                                            </div> -->
                                            <br>
                                            <div class="row">

                                                <button type="submit" name="submit" class="button button1">{{$kode}}</button>


                                    
                                            </div>
                                        </form>

                                        @endif



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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bersiap untuk Pergi?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">Apakah kamu Yakin?</div>
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