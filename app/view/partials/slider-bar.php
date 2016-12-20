<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= BASE_DIR ?>img/img.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p style="margin-top:10px;">NGUYỄN MINH ĐỨC</p>
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
                        'url' => 'controlleradmin/index',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'QUẢN LÝ ẢNH SLIDE',
                        'url' => 'controllerslider/index',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'GIỚI THIỆU',
                        'url' => 'controllergioithieu/gioithieu',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'KHU NGHỈ DƯỠNG',
                        'url' => 'controllernghiduong/nghiduong',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'BOOK',
                        'url' => 'controllerbook/index',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'MAIL BOX',
                        'url' => 'controlleradmin/index',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'QUẢN LÝ VIDEO',
                        'url' => 'controllervideo/video',
                        'icon' => 'glyphicon-home',
                    ],
                    [
                        'title' => 'QUẢN TÀI KHOẢN',
                        'url' => 'controllertaikhoan/taikhoan',
                        'icon' => 'glyphicon-home',
                    ]
                ],
                'class' => 'sidebar-menu',
            ], get_class($this) . "/" . $this->current_action);

            echo $menu->render();
        ?>

    </section>-->
    <!-- /.sidebar -->
</aside>