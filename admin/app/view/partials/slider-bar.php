<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel" style="color: white">
            <h4 style="margin-top:10px; font-weight: bold;">Xin chào, <?= $_SESSION['tentaikhoanadmin'] ?></h4>
        </div>
        <?php
        $menu = new menuhelper([
            'items' => [
                [
                    'title' => 'CHỨC NĂNG CHÍNH',
                ],
                [
                    'title' => 'HOME',
                    'url' => 'controlleradmin/loadingadmin',
                    'icon' => 'glyphicon-home',
                ],
                [
                    'title' => 'THÔNG TIN CÁ NHÂN',
                    'url' => 'controlleradmin/layThongTinAdmin',
                    'icon' => 'glyphicon-info-sign',
                ],
                [
                    'title' => 'QUẢN LÝ ẢNH SLIDE',
                    'url' => 'controllerslider/index',
                    'icon' => 'glyphicon glyphicon-th-large',
                ],
                [
                    'title' => 'GIỚI THIỆU',
                    'url' => 'controllergioithieu/index',
                    'icon' => 'glyphicon glyphicon-pencil',
                ],
                [
                    'title' => 'KHU NGHỈ DƯỠNG',
                    'url' => 'controllernghiduong/index',
                    'icon' => 'glyphicon glyphicon-tree-deciduous',
                ],
                [
                    'title' => 'VỀ TIMESHARE',
                    'url' => 'controllerthongtin/index',
                    'icon' => 'glyphicon glyphicon-pencil',
                ],
                [
                    'title' => 'LỢI ÍCH TIMESHARE',
                    'url' => 'controllerloiich/index',
                    'icon' => 'glyphicon glyphicon-pencil',
                ],
                [
                    'title' => 'THÔNG TIN TIMESHARE',
                    'url' => 'controllertimeshare/index',
                    'icon' => 'glyphicon glyphicon-pencil',
                ],
                [
                    'title' => 'BOOK',
                    'url' => 'controllerbook/index',
                    'icon' => 'glyphicon glyphicon-globe',
                ],
                [
                    'title' => 'QUẢN LÝ LIÊN HỆ',
                    'url' => 'controllermail/index',
                    'icon' => 'glyphicon glyphicon-envelope',
                ],
                [
                    'title' => 'QUẢN LÝ VIDEO',
                    'url' => 'controllervideo/index',
                    'icon' => 'glyphicon glyphicon-facetime-video',
                ],
                [
                    'title' => 'QUẢN LÝ TÀI KHOẢN',
                    'url' => 'controllertaikhoan/index',
                    'icon' => 'glyphicon glyphicon-user',
                ],
//                [
//                    'title' => 'QUẢN LÝ THAM GIA',
//                    'url' => 'controllerthamgia/index',
//                    'icon' => 'glyphicon glyphicon-log-in',
//                ],
                [
                    'title' => 'QUẢN LÝ CÂU HỎI',
                    'url' => 'controllercauhoi/index',
                    'icon' => 'glyphicon glyphicon-question-sign',
                ],
                [
                    'title' => 'QUẢN LÝ ƯU ĐÃI',
                    'url' => 'controlleruudai/index',
                    'icon' => 'glyphicon glyphicon-gift',
                ],
                [
                    'title' => 'QUẢN LÝ THÔNG BÁO',
                    'url' => 'controllerthongbao/index',
                    'icon' => 'glyphicon glyphicon-bell',
                ],
                [
                    'title' => 'QUẢN LÝ TUYỂN DỤNG',
                    'url' => 'controllertuyendung/index',
                    'icon' => 'glyphicon glyphicon-briefcase',
                ],
                [
                    'title' => 'QUẢN LÝ BANNER',
                    'url' => 'controllerbanner/index',
                    'icon' => 'glyphicon glyphicon-ok',
                ]
            ],
            'class' => 'sidebar-menu',
        ], get_class($this) . "/" . $this->current_action);

        echo $menu->render();
        ?>

    </section>
</aside>