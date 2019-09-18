<?php

require_once '../config/db.config.php';

class Login extends Database
{
   public static function loginUser( $email )
   {
      try
      {
         return self::sql(
            "SELECT user_id, fname, uid, email, pwd FROM users WHERE email = ?",
            [
               $email
            ]
         );
      }
      catch ( PDOException $e )
      {
         die("Connection error: ". $e->getMessage() );
         exit;
      }
   }
}
?>