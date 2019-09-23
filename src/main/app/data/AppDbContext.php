<?php


namespace Dragonfly\App\Data;

require_once(APP_PATH . CONFIG_PATH . "global.php");
require_once(APP_PATH . CONFIG_PATH . "database.php");
require_once(APP_PATH . DATA_PATH . "Connection.php");

use Exception;
use PDO;

/**
 * Class AppDbContext
 * @package Dragonfly\App\Data
 */
class AppDbContext
{
    private $messages;
    private $dbc;
    private $mapping = array();
    private $entity;
    private $table;
    private $fetchStyle;

    public function __construct($entity = null, $table = null, $fetchStyle = null)
    {
        $this->dbc = Connection::create()->getConnection();
        $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->fetchStyle = $fetchStyle;

        if ($entity != null && $table != null)
        {
            $this->mapping = [$entity => $table];
            $this->entity = $entity;
            $this->table = $table;
        }
    }

    /**
     * @return array|null
     */
    public function getAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->executeQuery($sql);
    }

    /**
     * @param $id
     * @return array|null
     */
    public function getById($id)
    {
        $sql   = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $queryParams = [":id"=> $id];
        return $this->executeQuery($sql, $queryParams);
    }

    /**
     * @param $params
     * @return array|null
     */
    public function getByParams($params)
    {
        $sql = "SELECT * FROM {$this->table} ";

        $whereClause = $this->getQueryFilters($params);
        if (!empty(trim($whereClause))) {
            $sql .= " WHERE $whereClause";
        }

        $queryParams = $this->getQueryParams($params);
        return $this->executeQuery($sql, $queryParams);
    }


    /**
     * @param $entityMap
     * @return int|string
     */
    public function insert($entityMap)
    {

        $fields = $this->getInsertFields($entityMap);
        $values = $this->getInsertValues($entityMap);

        $sql = "INSERT INTO {$this->table} ($fields)
                VALUES ($values)";

        $queryParams = $this->getQueryParams($entityMap);
        return $this->executeCommand($sql, $queryParams);

    }


    /**
     * @param $sql
     * @param array $queryParameters
     * @return array|null
     */
    private function executeQuery($sql, $queryParameters = array())
    {
        $results = null;
        try
        {
            $query = $this->prepareStatement($sql, $queryParameters);
            $query->execute();

            if ($this->fetchStyle == "class")
            {
                $classPath = APP_PATH . MODELS_PATH . "{$this->entity}.php";
                if (is_file($classPath)) {
                    require_once ($classPath);
                }
                $results = $query->fetchAll(\PDO::FETCH_CLASS,
                               "\\Dragonfly\App\Models\\". $this->entity);
            }
            else{
                $results = $query->fetchAll(PDO::FETCH_ASSOC);
            }
/*
            $recordCount = count($results);

            if ($recordCount <= 1)
            {
                $results = ($recordCount == 1) ? $results[0] : null;
            }
*/
        }
        catch (Exception $exception)
        {
            $this->messages[] = $exception->getMessage();
        }
        return $results;
    }


    /**
     * @param $sql
     * @param array $commandParameters
     * @return int|string
     */
    private function executeCommand($sql, $commandParameters = array())
    {
        $results = 0;
        try
        {
            $query = $this->prepareStatement($sql, $commandParameters);
            $query->execute();

            $results = $this->dbc->lastInsertId();
        }
        catch (Exception $exception)
        {
            $this->messages[] = $exception->getMessage();
        }
        return $results;
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    private function prepareStatement ($sql, $params = array())
    {
        $statement = $this->dbc->prepare($sql);
        //bindParam method signature requires that
        //$value variable must be passed by reference.
        foreach ($params as $param => &$value)
        {
            $statement->bindParam($param, $value);
        }
        return $statement;
    }


    /**
     * @param null $params
     * @return string
     */
    private function getQueryFilters ($params = null)
    {
        $filters = array();

        foreach ($params as $param => $value)
        {
            $filters[] = "$param = :$param";
        }
        return implode("AND", $filters);
    }

    /**
     * @param null $params
     * @return array
     */
    private function getQueryParams ($params = null)
    {
        $filters = array();

        foreach ($params as $param => $value)
        {
            $filters[":$param"] = "$value";
        }
        return $filters;
    }

    /**
     * @param $entityMap
     * @return string
     */
    private function getInsertFields ($entityMap)
    {
        $fields = array();
        foreach ($entityMap as $key => $value)
        {
            $fields[] = $key;
        }
        return implode(",", $fields);
    }

    /**
     * @param $entityMap
     * @return string
     */
    private function getInsertValues ($entityMap)
    {
        $fields = array();
        foreach ($entityMap as $key => $value)
        {
            $fields[] = ":$key";
        }
        return implode(",", $fields);
    }
}