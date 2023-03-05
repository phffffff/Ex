<?php
  if(session_id() === '') session_start();
  // session_destroy();
  echo print_r($_SESSION['users']);
?>