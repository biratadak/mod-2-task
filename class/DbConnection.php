<?php

// Loaded all required libraries.
require("../vendor/autoload.php");

// Loading .env credentials for authentication with database.
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

/**
 * Connects with database using mysqli.
 * 
 * @method addTodos
 *  Add given todo to database.
 * 
 * @method deleteTodos
 *  Delete given todo from database.
 * 
 * @method updateTodos
 *  Update given todo in database.
 * 
 * @method doneTodos
 *  Set status 1(done) of given todo in database.
 * 
 * @method getAllTodos
 *  Fetch all todos form database.
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
   * Delete Todo . 
   * @param $id
   *  Stores the id of todo.
   * @return void
   */
  public function deleteTodo($id):void
  {
  $this->conn->query('DELETE FROM todo_items WHERE id='.$id);
  }

  /**
   * Update Todo . 
   * @param $id
   *  Stores the id of todo.
   * @return void
   */
  public function updateTodo($id,$data=""):void
  {
  $this->conn->query('UPDATE todo_items 
  set todo_content="'.$data.'"
  WHERE id='.$id);
  }

  /**
   * Set done Todo item. 
   * @param $id
   *  Stores the id of todo.
   * @return void
   */
  public function doneTodo($id):void
  {
  $this->conn->query('UPDATE todo_items 
  set status=1
  WHERE id='.$id);
  }

  /**
   * Get all Todos . 
   * 
   * @return mysqli_result
   *  Returns list of Todos.
   */
  public function getAllTodos()
  {
    $todos= $this->conn->query('select * from todo_items');
    return $todos;
  }
}
  ?>