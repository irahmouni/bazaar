<?php
  /**
   * DBFactory.php : fabrique pour la connexion PDO vers la base SQL 
   *
   * @author Karim RAHMOUNI
   */

namespace conf;
use PDO;

/**
 *  La classe DBFactory : fabrique des connexions PDO
 * 
 *  Elle implante un singleton sur la connexion.
 */

class ConnectionFactory {

    private static $config = null;
    private static $db = null;

    /**
     * setConfig() : définition de la configuration de connexion à la base
     *
     * reçoit un fichier  contenant la configuration de la connexion à la BD :
     * array ( 'db_driver'  =>  'mysql',
     *         'db_user'    =>  'user',
     *         'db_password'=>  'password',
     *         'host'       =>  'localhost',
     *         'dbname'     =>  'db',
     *         'dbport'     =>  3306 )
     *
     * @access public
     * @static
     * @params  $configfile le fichier de  configuration d'accès à la base
     */

    public static function setConfig($configfile) {
        self::$config = parse_ini_file($configfile);
        if (is_null(self::$config))
	    throw new DBException("config file could not be parsed\n");
    }


    /**
     *   makeConnection() : fabrique une instance PDO
     *
     *   Charge le fichier de configuration
     *   @access public
     *   @static
     *   @return PDO un nouvel objet PDO ou False en cas d'erreur
     *   @throws DBException si l'établissement de la connexion échoue
    **/
  public static  function makeConnection() {
      if (is_null(self::$db)) {
          $dbtype = self::$config['db_driver'];
          $host = self::$config['host'];
          $dbname = self::$config['dbname'];
          $user = self::$config['db_user'];
          $pass = self::$config['db_password'];
          $port = ((isset(self::$config['dbport'])) ? self::$config['dbport'] : null);

          $dsn = "$dbtype:host=$host;";

          if (!empty($port))
	      $dsn .= "port=$port;";

          $dsn .= "dbname=$dbname";

          try {
              self::$db = new PDO($dsn, $user, $pass, array( PDO::ATTR_PERSISTENT => true ,
                                                             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
                                                             PDO::ATTR_EMULATE_PREPARES => false ,
                                                             PDO::ATTR_STRINGIFY_FETCHES => false));

              self::$db->prepare('SET NAMES \'UTF8\'')->execute();

          } catch (\PDOException $e) {
              throw new DBException("connection: $dsn  " . $e->getMessage() . '<br/>');
          }
      }
      return self::$db;
  }
}

?>

	


  
