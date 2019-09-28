<?php


namespace App\Libraries;


interface IApi
{
    public function get($url);
    public function post();
    public function put();
    public function delete();
}
