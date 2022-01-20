<?php
$page = (isset($_GET['page']))? $_GET['page'] : '';
switch($page){
  
  // guest
  case 'home':
  include "views/guest/home.php";
  break; 
  
  case 'announ': 
  include "views/guest/announ.php";
  break;
  
  case 'list_member': 
  include "views/guest/list_member.php"; 
  break;
  
  case 'tournament':
  include "views/guest/tournament.php";
  break;
  
  case 'guide':
  include "views/guest/guide.php";
  break;
  
  case 'gallery':
  include "views/guest/gallery.php";
  break;

  case 'login':
  require 'app/action_login.php';
  include "views/guest/login.php";
  break;

  case 'regis':
  require 'app/action_regis.php';
  include "views/guest/regis.php";
  break;

  case 'unconfirm':
  include "views/guest/unconfirm.php";
  break;
  
  // admin
  case 'members':
  include "views/admin/members.php";
  break;

  case 'users':
  include "views/admin/users.php";
  break;
  
  // member
  case 'profile':
  include "views/member/profile.php";
  break;
  
  case 'gallery_member':
  include "views/member/gallery.php";
  break;

  case 'post':
  include "views/member/post.php";
  break;
  
  default: 
  include "views/guest/home.php";
}
?>