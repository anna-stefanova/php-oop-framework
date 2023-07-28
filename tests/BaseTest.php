<?php
declare(strict_types=1);
require_once "./autoload.php";
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{

    protected function setUp(): void
    {
        App::Init();
    }
}