<?php
  error_reporting(E_ALL);
ini_set('display_errors', 1);
  class MightyMouse {
    public $data   = array();
    public $fields = array();
    function __construct() {
      $this->data = self::getData();
    }
    public function getData(){
      $jsonData = stripslashes(file_get_contents(__DIR__ . '/data/data.json'));
      $jsonData = rtrim($jsonData, "\0");
      $aData = json_decode($jsonData, true);
      return $aData;
    }
    public function setData($newData){
      $fp = fopen(__DIR__ . '/data/data.json', 'w');
      fwrite($fp, json_encode($newData));
      fclose($fp);
      return self::getData();
    }
    public function getFields(){
      $fields = file_get_contents(__DIR__ . '/data/fields.json');
      $fields = json_decode($fields, true);
      return $fields;
    }
    public function setFields($newFields){
      $fp = fopen(__DIR__ . '/data/fields.json', 'w');
      fwrite($fp, json_encode($newFields));
      fclose($fp);
      return self::getFields();
    }

    // GETTING DATA OUT
    public function getFieldValue($path, $default){
      if(!empty($this->data)){
        return self::getArrayByPath($this->data, $path);
      } else {
        return $default;
      }
    }
    public function value($key, $default){   // Sugar
      return self::getFieldValue($key, $default);
    }

    // UTILITIES
    public function getArrayByPath(&$arr, $path, $separator='.') {
      $keys = explode($separator, $path);
      foreach ($keys as $key) {
        $arr = &$arr[$key];
      }
      return $arr;
    }
    public function setArrayByPath(&$arr, $path, $value, $separator='.') {
      $keys = explode($separator, $path);
      foreach ($keys as $key) {
        $arr = &$arr[$key];
      }
      $arr = $value;
    }
  }