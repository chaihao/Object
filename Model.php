<?php

require_once 'config.php';
/**
 *
 */
class Model
{
    private $conn;
    private $table = null;
    private $dbms = 'mysql';
    private $dbName = null;

    public function __construct($table = null, $servername = "127.0.0.1", $username = "root", $password = "yingtao", $dbName = 'basic')
    {
        $this->table = $table;
        $this->dbName = $basic;
        try {
            $this->conn = new PDO("mysql:host=" . $servername . ';dbname=' . $dbName . ';', $username, $password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * [query 执行Sql 返回影响条数]
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    public function exec($sql)
    {
        $count = $this->conn->exec($sql);

        return $count;
    }

    /**
     * [query 执行Sql 返回数据]
     * @param  [type] $sql [description]
     * @return [type]      [description]
     */
    public function query($sql)
    {
        $data = $this->conn->query($sql);
        return $data;
    }

    /**
     * [insert 添加数据]
     * @param  [type] $data [description]
     * @return [type]       [description]
     */
    public function insert($data)
    {
        // 数据处理
        foreach ($data as $k => $v) {
            $value = $this->_returnValue($v);
            if (is_scalar($value)) {
                $values[] = $value;
                $fields[] = $this->_returnField($k);
            }
        }
        //创建时间，假如表里有此字段并且添加的时候未定义
        if (!array_key_exists('created_at', $data) && $this->columnExist('created_at') == 0) {
            $fields[] = $this->_returnField('created_at');
            $values[] = $this->conn->quote(date('Y-m-d H:i:s', time()));
        }

        //更新时间，假如表里有此字段并且添加的时候未定义
        if (!array_key_exists('updated_at', $data) && $this->columnExist('updated_at') == 0) {
            $fields[] = $this->_returnField('updated_at');
            $values[] = $this->conn->quote(date('Y-m-d H:i:s', time()));
        }

        $sql = 'insert into ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $values) . ')';
        return $this->exec($sql);

    }

    public function getInsertId()
    {
        $id = $this->conn->lastInsertId();
        return $id;
    }

    /**
     * 解析字段名,防止字段名是关键字
     *
     * @param  unknown $value
     * @return string
     */
    private function _returnField($fieldName)
    {
        return '`' . $fieldName . '`';
    }

    /**
     * 根据值的类型返回SQL语句式的值
     *
     * @param  unknown $value
     * @return string
     */
    private function _returnValue($value)
    {
        if (is_int($value) || is_float($value)) {
            return $value;
        } else {
            return $this->_returnStr($value);
        }

    }

    /**
     * 格式化用于数据库的字符串
     *
     * @param  unknown $value
     * @return string
     */
    private function _returnStr($value)
    {
        $value = mysql_real_escape_string($value, $this->conn);
        return $this->conn->quote($value);
    }

    /**
     * [columnExist 确定数据表中指定字段是否存在]
     * @param  [type] $column [description]
     * @return [type]         [description]
     */
    public function columnExist($column)
    {
        $sql = "select count(*) from " . $this->dbName . ".columns where table_name = '" . $this->table . "' and column_name = '" . $column . "'";
        $data = $this->conn->query($sql);
        return $data;
    }

}
