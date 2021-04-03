        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        
                        <li class="nav-devider"></li>
                        <li class="nav-label">Main</li>

                        <li> <a class="<?php if($class_menu == 'Dashboard'){ echo 'active'; } ?>" href="<?php echo base_url('dashboard'); ?>" ><i class="fa fa-tachometer"></i>Dashboard </a>

                        <li> <a class="<?php if($class_menu == 'Masuk Kendaraan'){ echo 'active'; } ?>" href="<?php echo base_url('Masuk_kendaraan'); ?>" ><i class="fa fa-car"></i>Masuk Kendaraan </a>

                        <li class="nav-label">Transaksi & Laporan</li>
                        <li> <a class="<?php if($class_menu == 'Transaksi & Laporan'){ echo 'active'; } ?>" href="<?php echo base_url('Transaksi'); ?>" ><i class="fa fa-wpforms"></i>Transaksi</a>
                        <li> <a class="<?php if($class_menu == 'Gaji Petugas'){ echo 'active'; } ?>" href="<?php echo base_url('Transaksi/gaji'); ?>" ><i class="fa fa-bitcoin"></i>Gaji Petugas</a>

                        <li class="nav-label">Master Data</li>
                        <li> <a class="<?php if($class_menu == 'Jenis Kendaran'){ echo 'active'; } ?>" href="<?php echo base_url('Master_jenis_kendaraan/get_jenis_kendaraan'); ?>" ><i class="fa fa-table"></i>Jenis Kendaran </a>

                         <li> <a class="<?php if($class_menu == 'Master Kendaraan'){ echo 'active'; } ?>" href="<?php echo base_url('Master_kendaraan/get_kendaraan'); ?>" ><i class="fa fa-table"></i>Master Kendaraan </a>

                        <li> <a class="<?php if($class_menu == 'Manajemen User'){ echo 'active'; } ?>" href="<?php echo base_url('Master_user/get_user'); ?>" ><i class="fa fa-table"></i>Manajemen User </a>

                        <li> <a class="<?php if($class_menu == 'Master Pencuci'){ echo 'active'; } ?>" href="<?php echo base_url('Master_pencuci/get_pencuci'); ?>" ><i class="fa fa-table"></i>Master Pencuci </a>
                        
                        <li class="nav-label">Pengaturan</li>
                        <li> <a class="<?php if($class_menu == 'Aplikasi'){ echo 'active'; } ?>" href="<?php echo base_url('Setting'); ?>" ><i class="fa fa-cogs"></i>Aplikasi</a>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>