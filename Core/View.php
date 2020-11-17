<?php

namespace Core;

use Interfaces\IRenderable;

/**
 * Class View
 * @package Core
 */
class View implements IRenderable
{
    /**
     * Renders a view.
     * @param null  $renderable
     * @param array $variables Optional extra variables.
     */
    public static function render($renderable = null, $variables = []): void
    {
        extract($variables);
        include_once Router::$base . DS . 'layouts' . DS . 'template.php';
    }
}
