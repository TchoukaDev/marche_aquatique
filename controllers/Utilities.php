<?php

class Utilities
{
    public static function renderPage($datasPage)
    {
        extract($datasPage);
        ob_start();
        require $view;
        $content = ob_get_clean();
        require $layout;
    }
}
