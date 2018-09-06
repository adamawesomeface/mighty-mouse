<div class="field-group">
  <label for="<?php echo $fieldName; ?>-<?php echo $fieldType; ?>"><?php echo ucwords($fieldName); ?></label>
  <?php $url = $m->getFieldValue('data.' . strtolower($field) . '.' . $fieldName, ''); ?>
  <input class="form-control" name="<?php echo strtolower($field) . '--' . $fieldName . '-' .  $fieldType; ?>" type="text" name="<?php echo $fieldName; ?>-<?php echo $fieldType; ?>" value="<?php echo $url; ?>" />
</div>