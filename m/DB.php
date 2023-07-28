<?php

class DB
{
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_NAME = 'framework';
    const DB_USER = 'geek';
    const DB_PASS = '123';

    protected static $instance = null;

    /*
     * Запрещаем копировать объект
     */
    private function __construct() {}
    private function __clone() {}

    private static function instance()
    {

        if (self::$instance == null) {

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
                PDO::ATTR_EMULATE_PREPARES => TRUE,
            ];
            $connectString = self::DB_DRIVER . ':host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=UTF8;';
            try {
                self::$instance = new PDO($connectString, self::DB_USER, self::DB_PASS, $options);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
        return self::$instance;
    }

    /**
     * @param $sql
     * @param array $args
     * @return PDOStatement
     */
    private static function sql($sql, array $args = []): PDOStatement
    {
        $stmt = self::instance()->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }

    /**
     * @param string $sql
     * @param array $args
     * @return array
     *
     */
    public static function Select(string $sql, array $args = []): array
    {
        return self::sql($sql, $args)->fetchAll();
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return bool ID
     */
    public static function Insert(string $sql, array $args = []): bool
    {
        self::sql($sql, $args);
        return true;
    }

    /**
     *
     * @param string $sql
     * @param array $args
     * @return integer affected rows
     */
    public static function Update(string $sql, array $args = []): int
    {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }


    /**
     * @param $sql
     * @param array $args
     * @return integer affected rows
    */
    public static function Delete($sql, array $args = []): int
    {
        $stmt = self::sql($sql, $args);
        return $stmt->rowCount();
    }
}

/*
DB::Select('SELECT * FROM goods WHERE category_id = :category AND good_id=:good AND good_is_active=:status',
          ['status' => Status::Active, 'category' => $categoryId, 'good'=>$goodId]);
*/