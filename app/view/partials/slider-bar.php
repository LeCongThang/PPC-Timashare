<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= BASE_DIR ?>img/1.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <h4 style="margin-top:10px; font-weight: bold;"><?=$_SESSION['tendangnhap']?></h4>
                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
        </div>
        <!-- search form -->
        <!--  <form action="#" method="get" class="sidebar-form">
           <div class="input-group">
             <input type="text" name="q" class="form-control" placeholder="Search...">
                 <span class="input-group-btn">
                   <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                   </button>
                 </span>
           </div>
         </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
            $menu = new menuhelper([
                'items' => [
                    [
                        'title' => 'CHỨC NĂNG CHÍNH',
                    ],
                    [
                        'title' => 'HOME',
                        'url' => $_SESSION['lang'].'/controlleradmin/loadingadmin',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'QUẢN LÝ ẢNH SLIDE',
                        'url' =>  $_SESSION['lang'].'/controllerslider/index',
                        'icon' => 'glyphicon glyphicon-th-large',
                    ],
                    [
                        'title' => 'GIỚI THIỆU',
                        'url' =>  $_SESSION['lang'].'/controllergioithieu/index',
                        'icon' => 'glyphicon glyphicon-pencil',
                    ],
                    [
                        'title' => 'KHU NGHỈ DƯỠNG',
                        'url' =>  $_SESSION['lang'].'/controllernghiduong/nghiduong',
                        'icon' => 'glyphicon glyphicon-tree-deciduous',
                    ],
                    [
                        'title' => 'BOOK',
                        'url' =>  $_SESSION['lang'].'/controllerbook/index',
                        'icon' => 'glyphicon glyphicon-globe',
                    ],
                    [
                        'title' => 'MAIL BOX',
                        'url' =>  $_SESSION['lang'].'/controllermail/index',
                        'icon' => 'glyphicon glyphicon-envelope',
                    ],
                    [
                        'title' => 'QUẢN LÝ VIDEO',
                        'url' =>  $_SESSION['lang'].'/controllervideo/index',
                        'icon' => 'glyphicon glyphicon-facetime-video',
                    ],
                    [
                        'title' => 'QUẢN TÀI KHOẢN',
                        'url' =>  $_SESSION['lang'].'/controllertaikhoan/index',
                        'icon' => 'glyphicon glyphicon-user',
                    ],
                    [
                        'title' => 'TRẠNG THÁI BOOK',
                        'url' =>  $_SESSION['lang'].'/controllertrangthai/trangthai',
                        'icon' => 'glyphicon glyphicon-ok',
                    ],
                    [
                        'title' => 'LOG OUT',
                        'url' =>  $_SESSION['lang'].'/controlleradmin/index',
                        'icon' => 'glyphicon glyphicon-log-out',
                    ]
                ],
                'class' => 'sidebar-menu',
            ], get_class($this) . "/" . $this->current_action);

            echo $menu->render();
        ?>

    </section>-->
    <!-- /.sidebar -->
</aside>