<?php
namespace App\Controller;

class TestsController extends AppController
{
    /**
     *
     */
    public function foo()
    {
        return $this->render('foo');
    }
    /**
     * @param $bar
     *
     * @return
     */
    public function bar($bar)
    {
        return $this->render('bar', compact('bar'));
    }
    /**
     * @param $bar
     * @throws \Exception
     */
    public function redirection($bar)
    {
        $this->redirect("testsBar", ["param" => $bar]);
    }

}