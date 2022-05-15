<?php
  header('Content-Type: text/html; charset=UTF-8');
  $counter = trim($_GET['c']);

  $datatypes = require_once '../config/datatypes.php';

  $removebtn = '';

  if((int) $counter > 1){
    $removebtn = "<button data-id=".$counter." type='button' class='btn btn-danger btn-sm del-btn'><i class='material-icons'>clear</i></button>";
  }
?>

<div id='data-row-<?=$counter?>' class="row justify-content-start row-field">
<div class="col-lg-1 position-relative">
  <?=$removebtn?>
</div>
<div class="col-lg-3 position-relative">
  <label class="form-control-label" for="input_<?=$counter?>">Field </label>
  <input type="text" class="form-control" id="input_<?=$counter?>" />
</div>
<div class="col-lg-3">
  <label class="form-control-label" for="type_field_<?=$counter?>">Type field</label>
  <select class="form-control select-field" id="type_field_<?=$counter?>" name="type_field_<?=$counter?>">
    <option>Select datatype</option>
    <?php
      foreach($datatypes as $family => $datatype):
    ?>
        <optgroup label=<?=$family?>>
    <?php
        foreach($datatype as $dt):
    ?>
        <option value=<?=$dt?>><?=$dt?></option>
    <?php
        endforeach;
    ?>
        </optgroup>
    <?php
      endforeach;
    ?>
  </select>
</div>
<div id="specific_field_<?=$counter?>" class="col-lg-3 specific_field">

</div>
</div>