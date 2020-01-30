<?php


namespace Engine\Core\Template;

use Engine\Core\Template\Theme;

class View
{
    /**
     * @var \Engine\Core\Template\Theme
     */
    protected $theme;

    /**
     * View constructor.
     */
    public function __construct()
    {
        $this->theme = new Theme();
    }

    /**
     * @param $template
     * @param array $vars
     * @throws \Exception
     */
    public function render($template, $vars = [])
    {
        $templatePath = ROOT_DIR . '/content/themes/default/' . $template . '.php';

        if(!is_file($templatePath)) // если нет файла шаблона
        {
            throw new \InvalidArgumentException(
                sprintf('Шаблон "%s" не найден в "%s" ', $template, $templatePath)
            );
        }

        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0); // отключить неявную отчистку

        try {
            require $templatePath;
        } catch (\Exception $e){
            ob_end_clean();
            throw $e;
        }

        echo ob_get_clean(); // получаю и вывожу содержимое всего буфера и после этого очищаю его
    }
}