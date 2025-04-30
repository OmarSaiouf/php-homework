<?php

/** 
 * Tools in mysql 
 */
class Mysql_api_code
{
    private $db;

    protected function __construct($db)
    {
        $this->db = $db;
    }
    /** 
     * Write in col in mysql 
     * @param string $dir name the folder 
     * @param string $file name the file 
     * @param string $values value 
     * @return mysql_result|bool  
     * @see https://t.me/api_tele 
     */
    protected function sql_write($dir, $values)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            // تأكد أن $values مصفوفة
            if (!is_array($values)) {
                $values = [$values];
            }
            $columns = implode(", ", array_keys($values));
            $escaped_values = array_map(function ($value) {
                if ($value === null || $value === '') {
                    return "NULL";
                }
                return "'" . mysqli_real_escape_string($this->db, $value) . "'";
            }, array_values($values));
            $values_string = implode(", ", $escaped_values);

            $query = "INSERT INTO $dir ($columns) VALUES ($values_string)";
            return mysqli_query($this->db, $query);
        } else {
            return false;
        }
    }
   
    
    /** 
     * Read from the col in mysql 
     * @param string $dir name the folder 
     * @param string $file name the file 
     * @return array|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_read($dir, $file)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            $re = mysqli_query($this->db, "SELECT * FROM $dir");
            $a = array();
            if (true) {
                while ($read = mysqli_fetch_assoc($re)) {
                    $a[] = $read[$file];
                }
            }
            return $a;
        } else {
            return false;
        }
    }


    /** 
     * where fun in mysql 
     * @param string $dir name the folder 
     * @return array|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_where($dir, $file, $value)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            $re = mysqli_query($this->db, "SELECT * FROM $dir WHERE $file='$value'");
            $arr = mysqli_fetch_all($re, MYSQLI_ASSOC);
            return !empty($arr) ? $arr : false;
        } else {
            return false;
        }
    }
   

    protected function sql_readarray($dir)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            $re = mysqli_query($this->db, "SELECT * FROM $dir");
            $arr = mysqli_fetch_all($re, MYSQLI_ASSOC);
            return $arr;
        } else {
            return false;
        }
    }
    /** 
     * Edit value from col in mysql 
     * @param string $dir name the folder 
     * @param string $file name the file 
     * @return array|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_edit($dir, $file, $old_value, $new_value)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            return mysqli_query($this->db, "UPDATE $dir SET $file='$new_value' WHERE id='$old_value' ");
        } else {
            return false;
        }
    }
    /** 
     * Delete value from col in mysql 
     * @param string $dir name the folder 
     * @param string $file name the file 
     * @param string $value the value  
     * @return  mysqli_result|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_del($dir, $file, $value)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            return mysqli_query($this->db, "DELETE FROM $dir WHERE $file = '$value' ");
        } else {
            return false;
        }
    }
    /** 
     * Create table in mysql 
     * @param string $name name the table 
     * @param array|null $names_col name col in table 
     * @return array|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_create_table($name, $names_col = [])
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            $ct = "CREATE TABLE $name (";
            $ct .= implode(",", $names_col);
            $ct .= ");";
            return mysqli_query($this->db, $ct);
        } else {
            return false;
        }
    }
    /**
     * check if table exists in mysql
     * @param string $name name the table
     */
    protected function sql_check_table($name)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            $result = mysqli_query($this->db, "SHOW TABLES LIKE '$name'");
            return mysqli_num_rows($result) > 0;
        } else {
            return false;
        }
    }
    /** 
     * Add col in table 
     * @param string $name_T name the table 
     * @param string $name_col name the col in table 
     * @return array|false  
     * @see https://t.me/api_tele 
     */
    protected function sql_add_col($name_T, $name_col)
    {
        mysqli_query($this->db, "SET NAMES utf8");
        mysqli_query($this->db, "SET CHARACTER SET utf8");
        if ($this->db) {
            return mysqli_query($this->db, "ALTER TABLE $name_T ADD $name_col;");
        } else {
            return false;
        }
    }
}
