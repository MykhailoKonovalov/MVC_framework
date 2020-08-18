<?php

namespace Core;

class View
{
    public function renderContent($content)
    {
        include("views/Template.php");
    }
}
