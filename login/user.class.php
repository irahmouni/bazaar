<?php
require_once "connection.class.php";
define('USER_FILE', 'users.txt');

class User {

  private $name;
  private $surname;
  private $login;
  private $password;
  private $id;

  public function __construct(
    $name = null,
    $surname = null,
    $login = null,
    $password = null,
    $id = null
  ) {
    $this->setName($name);
    $this->setSurname($surname);
    $this->setLogin($login);
    $this->setPassword($password);
    $this->setId($id);
  }

  public function save() {
    
    $db = Connexion::get(); 
    if (!self::userExist($this->getLogin())){
      $db->query("INSERT INTO user (name, surname, login, password) VALUE('".$this->getName()."', '".$this->getSurname()."', '".$this->getLogin()."', '".$this->getPassword()."')");
      return true; 
    }
    return false;
    
    
    $users = self::getAll();

    $users[$this->getLogin()] = $this->toArray();
    file_put_contents(USER_FILE, json_encode($users));
  }

  public static function userExist($login) {
    
    $db = Connexion::get();
    $result = $db->query("SELECT * FROM user WHERE login='$login'");
    return $result->fetch();
  }
  
  public function update($name, $surname, $login, $password){
    
    $loginTmp = $this->getLogin();
    if ($login != $this->getLogin()){
      if (self::userExist($login)){
        return false;
      }
    }
    
    $this->setName($name);
    $this->setSurname($surname);
    $this->setLogin($login);
    $this->setPassword($password);
    
    $db = Connexion::get();
    $db->query("UPDATE user SET `name` = '$name', `surname` = '$surname', `login` = '$login', `password` = '$password' WHERE id = ".$this->getId());
    return true;
  }

  public function toArray() {
    return array(
      'login' => $this->getLogin(),
      'name' => $this->getName(),
      'surname' => $this->getSurname(),
      'password' => $this->getPassword(),
    );
  }

  public static function getAll() {
    $file_content = file_get_contents(USER_FILE);
    return json_decode($file_content, TRUE);
  }

  public static function load($login, $password) {
    
    $db = Connexion::get(); 
    $result = $db->query("SELECT * FROM user WHERE login='$login' AND password='$password'");
    if ($user = $result->fetch()){
      return new User($user['name'], $user['surname'], $user['login'], $user['password'], $user["id"]);
    }
    return FALSE;
  }

  /**
   * @return null
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param null $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @return null
   */
  public function getSurname() {
    return $this->surname;
  }

  /**
   * @param null $surname
   */
  public function setSurname($surname) {
    $this->surname = $surname;
  }

  /**
   * @return null
   */
  public function getLogin() {
    return $this->login;
  }

  /**
   * @param null $login
   */
  public function setLogin($login) {
    $this->login = $login;
  }

  /**
   * @return null
   */
  public function getPassword() {
    return $this->password;
  }

  /**
   * @param null $password
   */
  public function setPassword($password) {
    $this->password = $password;
  }
  
  public function getId(){
    return $this->id;
  }
  
  public function setId($id){
    $this->id = $id;
  }

}