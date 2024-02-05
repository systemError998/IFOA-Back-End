<?php 

    $obj = new stdClass();
    $obj->name= 'Mario';
    $obj->surname= 'Rossi';
    $obj->city= 'Roma';

    $arr = ['name='=> 'Mario', 'surname='=> 'Rossi', 'city='=> 'Roma'];

    function func($param){
        $param['name'] = 'Luigi';
        var_dump($param);
    }

    func($arr);
    var_dump($arr);

?>