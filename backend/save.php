<?php
  if(isset($_POST['doSave'])){
    $data   = array();
    $fields = array();
    foreach($_POST as $key => $value){
      if(strpos($key, '--') !== false){
        list($currGroup, $fieldAndType) = explode('--', $key);
        if(isset($fieldAndType) && strpos($fieldAndType, '-') !== false){
          list($field, $type) = explode('-', $fieldAndType);
          if(isset($field) && isset($type)){
            $data[$currGroup][$field] = $value;
            $fields[$currGroup]['type'] = 'section';
            $fields[$currGroup]['fields'][] = $fieldAndType;
          }
        }
      }
    }
    $newData['data'] = $data;
    $m->setData($newData);
    $m->setFields($fields);
?>
  <div class="container">
    <div class="alert alert-info">Data Saved!</div>
  </div>
<?php
  }
?>
