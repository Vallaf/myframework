<?php
namespace App\Controller;
use Core\Controller;
class TestsController extends AppController
{
    public function foo()
    {
        echo 'Hello world !';
    }
    public function bar($bar)
    {
        echo $bar;
    }
    // A vous d'implémeter la fonction !
    public function redirection($args){
    $this->redirect("testsBar",['param'=>$args]);
    }
}