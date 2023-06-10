<?php
function connect(){
    $connection = mysqli_connect('localhost','root','','web');
    if(!$connection){
        die('Failed to connect DB');
    }
    return $connection;
}

function show_menu(){
    $connection = connect();

    $menus = '';

    $menus .= generate_multilevel_menus($connection); 

    return $menus;
}

function generate_multilevel_menus( $connection, $parent_id=NULL){
    $menu = '';
    $sql = '';
    if(is_null($parent_id) ){
        $sql = "SELECT * FROM 'menus' WHEERE 'parent_id' IS NULL";
    }
    else{
        $sql = "SELECT * FROM 'menus' WHEERE 'parent_id'=$parent_id";
    }

    $result = mysqli_query($connection, $sql);
    
    while($row = mysqli_fetch_assoc($result)){
        $menu = ($row['page']) ? '<li><a href="'.$row['page'].'">'.$row['denumire'].'</a>' : '<li><a href="#">'.$row['denumire'].'</a>';

        $menu .='<ul class="dropdown">'.generate_multilevel_menus($connection, $row['id_selection']).'</ul>';

        $menu .='</li>';
    }
    return $menu;
}