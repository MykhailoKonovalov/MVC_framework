<?php

namespace Config;

class View
{
    public function renderContent($content)
    {
        include("views/Template.php");
    }
}
