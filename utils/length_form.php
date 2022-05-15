<?php

  $datatype = trim($_GET['dt']);
  $dataid = trim($_GET['did']);
  $html = '';
  switch($datatype){
    case 'FLOAT':
      $html = "<div id='specific_".$dataid."'><label class='form-control-label'>Length (comma separated)</label><input data-id=".$dataid." type='text' class='form-control'/></div>";
    break;
    
    case 'VARCHAR':
      $html = "<div id='specific_".$dataid."'><label class='form-control-label'>Length</label><input data-id=".$dataid." type='number' class='form-control'/></div>";
    break;

    case 'ENUM':
      $html = "<div id='specific_".$dataid."'><label class='form-control-label'>Values (comma separated)</label><input data-id=".$dataid." type='text' class='form-control'/></div>";
    break;

    default :
      $html = '';

  }

header('Content-Type: text/html; charset=UTF-8');
echo json_encode($html);
