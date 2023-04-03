<?php

// Loaded all required libraries.
require("../vendor/autoload.php");

// require("features.php");
//  Loading .env credentials.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

/**
 * Connects with database using mysqli.
 * 
 * @method getQueryController
 *  Get query response as an array.
 * 
 * @var string $conn
 *  Store the mysqli connection object.
 *
 * */
class DbConnection
{
  public $conn;
  function __construct($database = "todo")
  {
    $connect = new mysqli("localhost", $_ENV['sqlUser'], $_ENV['sqlPass'], $database);
    if ($connect->connect_error) {
      echo '<script>"Connection error:" . $connect->connect_error</script>';
    }
    $this->conn = $connect;
  }


  /**
   * Add Todo . 
   * @param $data
   *  Stores the todo text.
   * @return void
   */
  public function addTodos($data):void
  {
  $this->conn->query('INSERT INTO todo_items (todo_content,status) 
  VALUES ("'.$data.'",0)');
  }

  /**
   * delete Todo . 
   * @param $id
   *  Stores the id of todo.
   * @return void
   */
  public function deleteTodo($id):void
  {
  $this->conn->query('DELETE FROM todo_items WHERE id='.$id);
  }

  /**
   * Get all Todos . 
   * 
   * @return mysqli_result
   *  Returns list of Todos.
   */
  public function getAllTodos($limit = 50)
  {
    $todos= $this->conn->query('select * from todo_items
        LIMIT ' . $limit);
    return $todos;
  }


  
}

  ?>