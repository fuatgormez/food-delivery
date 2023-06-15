<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Tinify Library
 * Tinify.com
 * lafcanbazi@gmail.com
 * limit 500
 */

Class Tinify
{
    private $key = '9T0qtd94fWrPBFzvYQMRcQvy936981rz';
    public function __construct()
    {
        \Tinify\setKey($this->key);
    }
    public function compress($file, $output)
    {
        try {
            $source = \Tinify\fromFile($file);
            $source->toFile($output);
        } catch (Exception $e) {
            echo 'Ein Fehler ist aufgetreten' . '<br>';
            echo $e->getMessage();
        }
    }
}
