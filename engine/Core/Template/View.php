<?php


namespace Engine\Core\Template;


class View
{
    public function __construct()
    {

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