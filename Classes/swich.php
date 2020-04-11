<?php
abstract class BaseToSwich
{
    protected $nameOptions;
    protected $nameOptionsInnerHTML;

public function __construct($nameOptions, $nameOptionsInnerHTML)
{
    $this->nameOptions = $nameOptions;
    $this->nameOptionsInnerHTML = $nameOptionsInnerHTML;
}

public function addSelect()
{
    $result='';
    for($i=0;$i<count($this->nameOptions);$i++)
    $result.= "<option id='{$this->nameOptions[$i]}'>{$this->nameOptionsInnerHTML[$i]}</option>";  
    return $result;
}

}
?>