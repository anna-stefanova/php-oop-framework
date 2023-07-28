<?php
require_once 'autoload.php';
class M_UserTest extends BaseTest
{
    private M_User $user;

    protected function setUp() : void
    {
        $this->user = new M_User();
    }

    /**
     * @dataProvider providerAuth
     */
    public function testAuth($login, $pass) {
        $this->assertNotNull($this->user->auth($login, $pass));
        $this->assertIsBool($this->user->auth($login, $pass));
    }
    public function providerAuth (): array
    {
        return [
            ['test@mail.ru', 'dkjfho545sjdioj'],
            ['test3@gmail.com', '5skjgor[']
        ];
    }

    /**
     * @dataProvider providerReg
     */
    public function testReg($name, $surname, $login, $pass) {
        $this->assertNotNull($this->user->reg($name, $surname, $login, $pass));
        $this->assertIsBool($this->user->reg($name, $surname, $login, $pass));
    }
    public function providerReg (): array
    {
        return [
            ['Peter', 'Petrov', 'test@mail.ru', 'dkjfho545sjdioj'],
            ['Andrej', 'Sokolov', 'test6@rambler.ru', 'Gjduhn&Gjfue67'],
            ['Алексей', 'Воробьев', 'jhierj67@inbox.ru', 'Gjshkru75@'],
        ];
    }

    /**
     * @dataProvider providerCheckLogin
     */
    public function testCheckExistLogin($login) {
        $this->assertNotNull($this->user->checkExistLogin($login));
        $this->assertIsBool($this->user->checkExistLogin($login));
    }
    public function providerCheckLogin (): array
    {
        return [
            ['test@mail.ru'],
            ['test6@rambler.ru'],
            ['jhierj67@inbox.ru'],
        ];
    }
}