<?php
  include "../src/mighty-mouse.php";
  $m = new MightyMouse;
  if($_POST['doSave']):
    include "save.php";
  endif;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MightMouse Demo Backend</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="style/main.css" />
  <script src="scripts/main.js"></script>
</head>
<body>
<div class="container">
  <?php $fields = $m->getFields(); ?>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
    <input type="hidden" value="1" name="doSave" />
    <?php foreach($fields as $field => $data): ?>
      <h3><?php echo $field; ?></h3>
      <?php if(isset($data) && !empty($data)): ?>

        <?php if($data['type'] == 'section'): ?>
          <div id="<?php echo strtolower($field) . '-' . $data['type']; ?>" class="<?php echo $data['type']; ?>">
            <?php foreach($data['fields'] as $currentField): ?>
              <?php list($fieldName, $fieldType) = explode('-', $currentField); ?>
              <?php
                $path = "fields/" . $fieldType . ".php";
                if(file_exists($path)){
                  include "$path";
                } else {
                  echo 'File Type: "' . $fieldType . '" Does Not Exist -- please check files.';
                }
              ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if($data['type'] == 'repeater'): ?>
          <div id="<?php echo strtolower($field) . '-' . $data['type']; ?>" class="<?php echo $data['type']; ?>">
            <?php foreach($data['fields'] as $currentField): ?>
              <?php list($fieldName, $fieldType) = explode('-', $currentField); ?>
              <?php echo $fieldName . ' -- ' . $fieldType . '<br>'; ?>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

      <?php endif; ?>
    <?php endforeach; ?>
    <input type="submit" class="btn btn-primary" value="Save" />
  </form>
</div>
</body>
</html>