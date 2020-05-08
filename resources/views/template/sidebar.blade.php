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
                <li class="nav-header">MENU UTAMA</li>                        
                <li class="nav-item">
                    <a href={{route('muzakki.index')}} class="nav-link">
                        <i class="nav-icon far fa-plus-square"></i>
                        {{-- <i class="fas fa-folder-plus"></i> --}}
                        <p>Tambah Muzakki<br>(Pemberi Zakat)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href={{route('muzakki.index')}} class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tambah Mustahiq<br>(Penerima Zakat)</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../gallery.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Hitung Pembagian Zakat</p>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>