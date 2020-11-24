
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item  "><a class="menu-item" href="{{ route('dashboard') }}"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>

            <?php

                $sideMenu = showMenu();
                $menuItem = '';


            foreach ($sideMenu as $key => $value) {
                if($value['flag'] == 'noChildMenu'){
                    $menuItem .= '<li class="nav-item">
                                        <a href="' . ($value['menu_url'] ? route($value['menu_url']) : 'javascript:void(0)') . '">
                                            <i class="' . $value['icon_class'] . '"></i> <span class="menu-title">' . $value['name'] . '</span>
                                        </a>';
                    continue;
                }
                $menuItem .= '<li class="nav-item">
                                        <a href="javascript:void(0)">
                                            <i class="' . $value['icon_class'] . '"></i> <span class="menu-title">' . $value['name'] . '</span>
                                        </a>';

                if ($value['sub_menu']) {
                    $menuItem .= '<ul class="menu-content">';

                    foreach ($value['sub_menu'] as $menu) {

                        if ($menu['menu_url'] != '' || $menu['sub_menu']) {

                            $menuItem .= '<li>
                            	<a href="' . ($menu['menu_url'] ? route($menu['menu_url']) : 'javascript:void(0)') . '" class="menu-item">
                                <span class="">' . $menu['name'] . '</span>'
                                . ($menu['sub_menu'] ? '' : '') .
                                '</a>';
                            if ($menu['sub_menu']) {
                                $menuItem .= '<ul class="menu-content">';
                                foreach ($menu['sub_menu'] as $subMenu) {
                                    $menuItem .= '<li>
                                        <a class="menu-item" href="' . ($subMenu['menu_url'] ? route($subMenu['menu_url']) : 'javascript:void(0)') . '"> <i class="fa fa-circle-o"></i> ' . $subMenu['name'] . '</a>
                                    </li>';
                                }
                                $menuItem .= '</ul>';
                            }
                            $menuItem .= '</li>';
                        }

                    }
                    $menuItem .= '</ul>';
                }

                $menuItem .= '</li>';
            }
            echo $menuItem;
            ?>


        </ul>
    </div>
</div>