<?php

namespace App;

class kernel
{

        public function __construct(){
            $logManager = new LogManager();
            $logManager->info("Arrancando la aplicación");
            $viewManager = new ViewManager;
            $viewManager->renderTemplate("index.view.html");
    }
}