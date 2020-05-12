<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href={{ route('beranda') }} class="brand-link">
        <img src="AdminLTE3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Amil Zakat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">                

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-header">TAMBAH DATA</li>                        
                <li class="nav-item">
                    <a href={{route('muzakki.index')}} class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        {{-- <i class="fas fa-folder-plus"></i> --}}
                        <p>Tambah Muzakki<br>(Pemberi Zakat)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route('mustahik.index')}} class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        <p>Tambah Mustahik<br>(Penerima Zakat)</p>
                    </a>
                </li>
                <li class="nav-header">PENGHITUNGAN</li>                        
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Pembagian Zakat
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{route('penghitungan.index')}} class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penghitungan Zakat</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Penghitungan</p>
                            </a>
                        </li>                        
                    </ul>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>