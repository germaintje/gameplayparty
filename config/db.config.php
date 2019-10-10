<?php

class Database
{
   // Declare all connection strings
   private static $db_server = 'localhost:3306';
   private static $db_name = 'gameplayparty';
   private static $db_username = 'gameplay';
   private static $db_pwd = 'gameplay';

   public static function conn()
   {
      $dsn = 'mysql:host='. self::$db_server .';dbname='. self::$db_name .';charset=utf8mb4';
      try
      {
         // PDO instance for connection and setting up default pdo attributes
         $pdo = new PDO( $dsn, self::$db_username, self::$db_pwd );
         $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
         $pdo->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );
         $pdo->setAttribute( PDO::ATTR_EMULATE_PREPARES, false );
         return $pdo;
      }
      catch ( PDOException $e )
      {
         die ( "Connection Error: ". $e->getMessage() );
      }
   }
   // SQL query function
   public static function sql( $query, $params = [] )
   {
      try
      {
         if ( $stmt = self::conn()->prepare($query) )
         {
            $stmt->execute($params);
            return $stmt;
         }
      }
      catch (PDOException $e)
      {
         die( "Something went wrong. ". $e->getMessage() );
      }
   }
}