<?php

namespace App;

class kernel
{

        public function __construct(){
            $viewManager = new ViewManager;
            $viewManager->renderTemplate("index.view.html");
    }
}