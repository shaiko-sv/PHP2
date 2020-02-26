<?php

class View {

    public function render($template, $content)
    {
        try {

            // указываем где хранятся шаблоны
            $loader = new \Twig\Loader\FilesystemLoader(TEMPLATES_PATH);

            // инициализируем Twig
            $twig = new \Twig\Environment($loader);

            echo $twig->render($template, $content);
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }
}
