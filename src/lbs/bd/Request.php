<?php
 namespace lbs\bd;
 use PDO;
 
class Request
{
   public static function list_items($db)
   {
      $st = $db->prepare("select * from item");
      $st->execute();
      return ($st->fetchAll(PDO::FETCH_ASSOC));
   }
   public static function get_items_with_id($db, $id){
      $st = $db->prepare("select * from item where id =?");
      $st->bindparam(1, $id, PDO::PARAM_INT);
      $st->execute();
      return ($st-> fetchAll(PDO::FETCH_ASSOC));
   }
   public static function add_list($db, $tab)
   {
      $st = $db->prepare("insert into liste (user_id, titre, experation, token) values (?, ?, ?, ?, ?)");
      $st->bindparam(1, $tab['user_id'], PDO::PARAM_INT);
      $st->bindparam(2, $tab['titre'], PDO::PARAM_STR);
      $st->bindparam(3, $tab['description'], PDO::PARAM_STR);
      $st->bindparam(4, $tab['expiration'], PDO::PARAM_INT);
      $st->bindparam(5, $tab['token'], PDO::PARAM_STR);
      $st->execute();
      return ($st->fetchAll(PDO::FETCH_ASSOC));
   }
   public static function del_list_from_id($db, $id)
   {
      $st = $db->prepare("delete from liste where no = ?");
      $st->bindparam(1, $id, PDO::PARAM_INT);
      $st->execute();
      return ($st->fetchAll(PDO::FETCH_ASSOC));
   }

   public static function list_items_with_id($db, $id)
   {
      $st = $db->prepare("select * from item where liste_id = ?");
      $st->bindparam(1, $id, PDO::PARAM_INT);
      $st->execute();
      return ($st->fetchAll(PDO::FETCH_ASSOC));
   }
    
}

?>
