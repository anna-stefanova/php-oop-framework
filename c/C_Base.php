<?php

use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class C_Base extends C_Controller
{
    const PATH_BIG = "./images/big/";
    const PATH_SMALL = "./images/small/";
    protected string $title;
    protected array $content;
    protected array $menu;
    protected string $keyWords;
    protected string $view;
    protected string $part;

    protected function before()
    {
        $this->title = 'Название сайта';
        $this->content = [];
        $this->menu = [
            'Главная' => 'index.php',
            'Каталог' => 'index.php?c=good&act=catalog'
        ];
        $this->keyWords = '';
        $this->view = '';
        $this->part = '';
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    protected function render()
    {
        $vars = [
            'title' => $this->title,
            'content' => $this->content,
            'menu' => $this->menu,
            'kw' => $this->keyWords,
        ];
        $this->view .= '.twig';
        $loader = new \Twig\Loader\FilesystemLoader('templates');
        $twig = new \Twig\Environment($loader, [
            'debug' => true,
        ]);
        if (!isset($_POST['isAjax'])) {
            $page = $twig->render($this->view, $vars);
            echo $page;
        } else {
            echo json_encode($vars['content']);
        }

    }

}