<?php

abstract class basemodel
{

  public function __construct($array = null)
  {
    if($array == null)
    {

    }else
    {
      foreach($array as $key => $value)
      {
        __set($key, $value);
      }
    }
  }

  public function __set($att, $value)
  {
    $this->data[$att] = $value;
  }

  public function __get($att)
  {
    return $this->data[$att];
  }

 public function save()
  {
    $connection = new dbconnection() ;

    if($this->id)
    {
      $sql = "update ".get_class($this)." set " ;

      $set = array() ;
      foreach($this->data as $att => $value)
        if($att != 'id' && $value)
          $set[] = "$att = '".$value."'" ;

      $sql .= implode(",",$set) ;
      $sql .= " where id=".$this->id ;
    }
    else
    {
      $sql = "insert into ".get_class($this)." " ;
      $sql .= "(".implode(",",array_keys($this->data)).") " ;
      $sql .= "values ('".implode("','",array_values($this->data))."')" ;
    }

    $connection->doExec($sql) ;
    $id = $connection->getLastInsertId("jabaianb.".get_class($this)) ;

    return $id == false ? NULL : $id ; 
  }

}
