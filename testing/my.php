<?php
include 'core.php';
include 'library.php';
include 'models.php';

$f = new MenuFactory;
$f->setTopParent(1);
$f->setGroup(9);
$v = $f->loadMenus();
var_dump(getMenu($f->menus));
function getMenu($menus){
    $m = [];
    foreach($menus as $menu){
        $m[$menu->id]['menu'] = $menu->mname;
        if(!empty($menu->children)){
            $c = getMenu($menu->children);
            $m[$menu->id]['children'] = $c;
        }
    }
    return $m;
}
