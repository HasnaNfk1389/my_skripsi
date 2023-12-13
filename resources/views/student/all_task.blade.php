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
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/welcome">
                <div class="sidebar-brand-text mx-3">Task Collection </div>
            </a>
            <hr class="sidebar-divider my-0">
            <div class="sidebar-heading">
            </div>

            <li class="nav-item">
                <a class="nav-link" href="/download">
                    <i class="fas fa-download fa-sm fa-2x text-gray-300"></i>
                    <span>Download</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="/materi">
                    <i class="fas fa-book fa-2x text-gray-300"></i>
                    <span>Materi</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="/tasks">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    <span>Tasks</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>

                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>

                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">17 November 2022</div>
                                        <div class="small text-gray-500">08:30 WIB</div>
                                        <span class="font-weight-bold">Ada tugas yang harus dikumpulkan!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">17 November 2022</div>
                                        <div class="small text-gray-500">08:30 WIB</div>
                                        <span class="font-weight-bold">Ada tugas yang harus dikumpulkan!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">17 November 2022</div>
                                        <div class="small text-gray-500">08:30 WIB</div>
                                        <span class="font-weight-bold">Ada tugas yang harus dikumpulkan!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session('loggedUserName') }}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/login" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
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
                                    <h6 class="m-0 font-weight-bold text-primary">Semua Tugas - {{ session('loggedUserClass') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th name="user_id">No</th>
                                                    <th name="kelas">Kelas</th>
                                                    <th name="namatugas">Nama Tugas</th>
                                                    <th name="desk_tugas">Deskripsi Tugas</th>
                                                    <th name="desk_tugas">File Tugas</th>
                                                    <th name="tanggalmasuk">Tenggat Waktu</th>
                                                    <th name="tanggalmasuk">Task ID</th>
                                                    @if(session('loggedUserRole')==='teacher')
                                                    <th name="opsi" colspan='2' >Opsi</th>
                                                    @endif

                                                    @if(session('loggedUserRole')==='user')
                                                    <th name="status">Status Tugas</th>
                                                    @endif
                                                </tr>
                                            </thead>
                                            <tbody>


                                                
                                                {{-- @foreach($taskData as $task)
                                                {{$taskData[0]}}
                                                @endforeach --}}

                                                @foreach($taskData as $taskJson)
                                                @php
                                                    $task = json_decode($taskJson, true);
                                                @endphp
                                            
                                                @if(isset($task['task']))
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $task['task']['kelas'] ?? 'N/A' }}</td>
                                                        <td>{{ $task['task']['namatugas'] ?? 'N/A' }}</td>
                                                        <td>{{ $task['task']['desk_tugas'] ?? 'N/A' }}</td>
                                                        <td><a href="{{$task['task']['bucket_url']}}">FILE</a></td>
                                                        <td>{{ $task['task']['tgl_kumpul'] ?? 'N/A' }}</td>
                                                        <td>{{ $task['task']['id'] ?? 'N/A' }}</td>


                                                        @if(session('loggedUserRole')==='teacher')
                                                        <td><a class="button button1" href="/newTask?task_id={{$task['task']['id']}}&judul={{$task['task']['namatugas']}}&deskripsi={{$task['task']['desk_tugas']}}&tenggat={{$task['task']['tgl_kumpul']}}">Kelola Tugas</a></td>
                                                        <td><a class="button button1" href="/deleteTask?task_id={{$task['task']['id']}}">Hapus Tugas</a></td>
                                                        @endif


                                                        @if(session('loggedUserRole') === 'user')

                                                        <td><a class="button button1" href="/submit_tasks/{{$task['task']['id']}}">Kelola Tugas</a></td>
                                                        
                                                        @endif
                                                        @endif

                                                    </tr>
                                                
                                            @endforeach
                                                                


                                              
                                            
                                                
                                            </tbody>
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="/all_tasks">Tasks</a>
                                            </div>
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




@if(session('loggedUserRole')==='user')


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
                    <h6 class="m-0 font-weight-bold text-primary">Tugas Dikumpulkan - {{ session('loggedUserClass') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th name="user_id">No</th>
                                    <th name="kelas">Kelas</th>
                                    <th name="namatugas">Kode Tugas</th>
                                    <th name="desk_tugas">Waktu Mengumpulkan</th>
                                    <th name="desk_tugas">File Dikumpulkan</th>
                                    <th name="opsi" colspan=2>Opsi</th>
                                    <th name="opsi">Nilai</th>

                                </tr>
                            </thead>
                            <tbody>


                                
                                {{-- @foreach($taskData as $task)
                                {{$taskData[0]}}
                                @endforeach --}}

                                @foreach($taskData as $taskJson)
                                @php
                                    $task = json_decode($taskJson, true);
                                @endphp
                            
                            @if(isset($task['student']))
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task['student']['kelas'] ?? 'N/A' }}</td>
                                <td>{{ $task['student']['task_id'] ?? 'N/A' }}</td>
                                <td>{{ $task['student']['tanggalmasuk'] ?? 'N/A' }}</td>
                                <td><a href="{{$task['student']['bucket_url']}}">FILE</a></td>
                                @if(session('loggedUserRole') === 'user')

                                <td><a class="button button1" href="/submit_tasks/{{$task['student']['task_id']}}">Kelola Tugas</a></td>
                                <td><a class="button button1" href="hapusTugas?task_id={{$task['student']['task_id']}}">Hapus Tugas</a></td>
                                @endif
                                <td>{{ $task['student']['score'] ?? 'N/A' }}</td>

                                @endif

                                    </tr>
                                
                            @endforeach
                                                


                              
                            
                                
                            </tbody>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="/all_tasks">Tasks</a>
                            </div>
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



@endif











@if(session('loggedUserRole')==='teacher')


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
                    <h6 class="m-0 font-weight-bold text-primary">Tugas Dikumpulkan - {{ session('loggedUserClass') }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th name="user_id">No</th>
                                    <th name="kelas">Nama Siswa</th>
                                    <th name="namatugas">Kode Tugas</th>
                                    <th name="desk_tugas">Waktu Mengumpulkan</th>
                                    <th name="desk_tugas">File Dikumpulkan</th>
                                    <th name="desk_tugas">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>


                                
                                {{-- @foreach($taskData as $task)
                                {{$taskData[0]}}
                                @endforeach --}}

                                @foreach($submittedTask[0]['payload'] as $task)

                            
                            @if(isset($task))
                            <tr>
                                <td>{{$task['id']}}</td>
                                <td>{{$task['nama_siswa']}}</td>
                                <td>{{$task['task_id']}}</td>
                                <td>{{$task['tanggalmasuk']}}</td>
                                <td><a href="{{$task['bucket_url']}}">File</a></td>
                                <form action="/addScore" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    
                                <td><input class="form-control" max=100 type=text id=score name=score value='{{$task['score']}}'>
                                    <input type=hidden id=user_id name=user_id value='{{$task['user_id']}}'>
                                    <input type=hidden id=task_id name=task_id value='{{$task['task_id']}}'>
                                </td>
                                <button class="button button1" type="submit"></button>
                                
                            </form>




                                @endif

                                    </tr>
                                
                            @endforeach
                                                


                              
                            
                                
                            </tbody>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1"><a href="/all_tasks">Tasks</a>
                            </div>
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



@endif














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