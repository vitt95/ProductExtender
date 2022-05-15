<?php

  $datatype = trim($_GET['dt']);
  $dataid = trim($_GET['did']);
  $html = '';
  switch($datatype){
    case 'INTEGER':
      $html = "<label class='form-control-label'>Length</label><input data-id=".$dataid." type='number' class='form-control'/>";
    break;
  }

header('Content-Type: text/html; charset=UTF-8');
echo json_encode($html);
