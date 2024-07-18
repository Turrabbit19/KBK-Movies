<?php
namespace App\Admin\controllers;

use eftec\bladeone\BladeOne;

class BaseController
{
    public function render($viewFile, $data = [])
    {
        $viewDir = "./app/admin/views";
        $storageDir = "./storage";
        $blade = new BladeOne($viewDir, $storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}
