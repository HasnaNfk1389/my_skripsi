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
                    
<!-- Nav Item - Alerts -->
 <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
       @if(isset($allTask[0]['payload']))
        <span class="badge badge-danger badge-counter">
            @foreach($allTask[0]['payload'] as $task)

            @if($loop->last)
            @php 
            $countTask = $loop->iteration;
            
            @endphp
            {{$countTask}}
            @endif
            
            @endforeach

        </span>
        @endif
    </a>
   
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notification
        </h6>
        
            @foreach($allTask[0]['payload'] as $task)
            @if(isset($task))

            <a class="dropdown-item d-flex align-items-center" href="/submit_tasks/{{$task['id']}}">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
            <div>
                <div class="small text-gray-500">{{$task['tgl_kumpul']}}</div>
                <div class="small text-gray-500">{{$task['id']}}</div>
                <span class="font-weight-bold">{{$task['namatugas']}}</span>
            </div>
            @endif
            @endforeach
            
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="/tasks">Show All Alerts</a>
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