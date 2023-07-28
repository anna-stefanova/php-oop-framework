<?php
require_once 'autoload.php';
class M_CatalogTest extends BaseTest
{
    private M_Catalog $catalog;

    protected function setUp(): void
    {
        $this->catalog = new M_Catalog();
    }

    public function testGetAll() {
        $this->assertIsArray($this->catalog->getAll());
    }
    public function testGetCategories() {
        $this->assertIsArray($this->catalog->getCategories());
    }

    /**
     * @dataProvider providerGetCategoryGood
     */
    public function testGetCategoryGood($tag) {
        $this->assertIsArray($this->catalog->getCategoryGood($tag));
    }
    public function providerGetCategoryGood(): array
    {
        return [
            ['category_one'],
            ['category_two'],
            ['category_three']
        ];
    }

    /**
     * @dataProvider providerGetSingleGood
     */
    public function testGetSingleGood($id) {
        $result = $this->catalog->getSingleGood($id);

        $this->assertIsArray($result);
        $this->assertArrayHasKey('price', $result[0], "Array doesn't contains 'price' as key");
        $this->assertArrayHasKey('title', $result[0], "Array doesn't contains 'title' as key");
    }
    public function providerGetSingleGood(): array
    {
        return [
            ['1'],
            ['23'],
            ['99']
        ];
    }

}