<?php
include 'core.php';
include 'library.php';
include 'models.php';

function createMenu($objmenus,$group,$parent=0,$level=0){
    $list = '';
    $bullet = '';
    for($i=0;$i<=$level+1;$i++){
        $bullet .= '-';
    }
    $objmenus->group = $group;
    $obj = $objmenus->getMenu($parent);
    if(empty($obj)) return '';    
    foreach($obj as $omenu){
       $list .= $bullet.$omenu->mname.PHP_EOL;
       foreach($omenu->children as $o){
           var_dump($o);
          $list .= createMenu($omenu->children,$group,$omenu->id,$level++);
       }
    }
    return $list;
}
$menu = new Menu;
$menu->group = 1;
$menu->getMenu(1);
var_dump($menu);
//logs(createMenu($menu,1));
