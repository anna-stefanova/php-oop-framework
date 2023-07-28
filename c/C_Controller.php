<?php
/**
 * Базовый класс контроллера
*/

abstract class C_Controller
{
    // Функция отрабатывающая до основного метода
    protected abstract function before();

    protected abstract function render();

    public function Request($action): void
    {
        $this->before();// метод вызывается до формироания данных для шаблона
        $this->$action();   //$this->action_index
        $this->render();
    }


    // Запрос произведен методом GET?
    protected function IsGet(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }

    // Запрос произведен методом POST?
    protected function IsPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    // Если вызвали метод, которого нет - завершаем работу
    public function __call($name, $params){
        die('Не пишите фигню в url-адресе!!!');
    }


}