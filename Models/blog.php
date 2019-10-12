<?php
namespace models;
class Blog
{
    /**
     * @param  mixed
     * @return array
     */
    public function index($params) : array
    {
      // var_dump($_GET['a']);
        return array('str'=>'Hellsso World!');
    }
}
