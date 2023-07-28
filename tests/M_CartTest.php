<?php
require_once 'autoload.php';
class M_CartTest extends BaseTest
{
    private M_Cart $cart;

    protected function setUp() : void
    {
        $this->cart = new M_Cart();
    }

    /**
     * @dataProvider providerGetIdUser
     */
    public function testGetAllGoods($id_user) {
        $this->assertNotNull($this->cart->getAllGoods($id_user));
        $this->assertIsArray($this->cart->getAllGoods($id_user));
    }
    public function providerGetIdUser(): array
    {
        return [
            ['1'],
            ['2'],
            ['3'],
            ['100']
        ];
    }

    /**
     * @dataProvider providerAddProduct
     */
    public function testAddProduct($id_user, $id_good) {
        $this->assertNotNull($this->cart->addProduct($id_user, $id_good));
        $this->assertIsBool($this->cart->addProduct($id_user, $id_good));
    }
    /**
     * @dataProvider providerAddProduct
     */
    public function testPlusCount($id_user, $id_good) {
        $this->assertNotNull($this->cart->plusCount($id_user, $id_good));
    }
    /**
     * @dataProvider providerAddProduct
     */
    public function testDeleteGood($id_user, $id_good) {
        $this->assertNotNull($this->cart->deleteGood($id_user, $id_good));
    }
    public function providerAddProduct(): array
    {
        return [
            ['1', '3'],
            ['2', '100'],
            ['3', '18'],
            ['100', '23']
        ];
    }

    /**
     * @dataProvider providerSearchGood
     */
    public function testSearchGood($id_good) {
        $this->assertNotNull($this->cart->searchGood($id_good));
        $this->assertIsBool($this->cart->searchGood($id_good));
    }
    public function providerSearchGood(): array
    {
        return [
            ['1'],
            ['245'],
            ['100']
        ];
    }

    /**
     * @dataProvider providerGetIdUser
     */
    public function testAddToOrder($id_user) {
        $this->assertNotNull($this->cart->searchGood($id_user));
        $this->assertIsBool($this->cart->searchGood($id_user));
    }

    /**
     * @dataProvider providerGetIdUser
     */
    public function testCleanCart($id_user) {
        $this->assertNotNull($this->cart->cleanCart($id_user));
    }

    public function testAddToOrdersDetails() {
        $this->assertNotNull($this->cart->addToOrdersDetails());
        $this->assertIsBool($this->cart->addToOrdersDetails());
    }
}