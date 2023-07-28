<?php

class M_Catalog
{
    public function getAll(): array
    {
        $sql = "SELECT id_good, title, description, price, name FROM goods, categories WHERE goods.id_category=categories.id_category";
        return DB::Select($sql);
    }

    public function getCategories(): array
    {
        $sql = "SELECT * FROM categories";
        return DB::Select($sql);
    }

    public function getCategoryGood($tag): array
    {
        $sql = "SELECT id_good, title, description, price, name, tag FROM goods, categories WHERE goods.id_category=categories.id_category AND tag=?";
        return DB::Select($sql, [$tag]);
    }

    public function getSingleGood($id): array
    {
        $sql = "SELECT id_good, title, description, price, c.id_category, name AS category_name FROM goods g JOIN categories c ON g.id_category=c.id_category WHERE id_good=?";
        return DB::Select($sql, [$id]);
    }
}

