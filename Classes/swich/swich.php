<?php
// base class
abstract class BaseToSwich
{
    protected $nameOptions;
    protected $nameOptionsInnerHTML;

//create a construction with two incoming arguments
public function __construct($nameOptions, $nameOptionsInnerHTML)
{
    $this->nameOptions = $nameOptions;
    $this->nameOptionsInnerHTML = $nameOptionsInnerHTML;
}

public function addSelect()
{
    $result=''; //create empty variable
    for($i=0;$i<count($this->nameOptions);$i++)
    // creates drop-down list items
        $result.= "<option id='{$this->nameOptions[$i]}'>{$this->nameOptionsInnerHTML[$i]}</option>";  
    return $result;
}

}
?>