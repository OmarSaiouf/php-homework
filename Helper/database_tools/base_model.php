<?php
include_once 'database.php';

class Base_model extends Mysql_api_code
{
    static private $conn;

    protected $table_name;

    protected $columns;

    public function __construct()
    {
        if ($this->table_name == null) {
            throw new Exception("Table name is not set.");
        }
        if ($this->columns == null) {
            throw new Exception("Columns are not set.");
        }

        if (self::$conn == null) {
            $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            self::$conn = $conn;
        }
        parent::__construct(self::$conn);
        if (!$this->sql_check_table($this->table_name)) {
            $this->sql_create_table($this->table_name, $this->columns);
        }
    }

    static public function get_instance()
    {

        return new static();
    }


    static public function get_all_data()
    {
        $instance = self::get_instance();
        return $instance->sql_readarray($instance->table_name);
    }

    static public function where($column, $value)
    {
        $instance = self::get_instance();
        return $instance->sql_where($instance->table_name, $column, $value);
    }

    static public function get_data_by_id($id)
    {
        $instance = self::get_instance();
        return $instance->sql_where($instance->table_name, "id", $id);
    }

    static public function update_data($id, $data)
    {
        $instance = self::get_instance();
        return $instance->sql_edit($instance->table_name, "id", $id, $data);
    }

    static public function delete_data($id)
    {
        $instance = self::get_instance();
        return $instance->sql_del($instance->table_name, "id", $id);
    }

    static public function insert_data($data)
    {
        $instance = self::get_instance();
        return $instance->sql_write($instance->table_name, $data);
    }
}
