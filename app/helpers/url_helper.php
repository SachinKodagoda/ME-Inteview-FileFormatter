<?php
  // This is use to redirect page
  function redirect($page){
    header('location: ' . URLROOT . '/' . $page);
  }