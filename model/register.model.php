<?php

require_once '../config/db.config.php';

class Register extends Database
{
   // Registration query for new user.
   public static function registerUser( $lname, $fname, $uid, $email, $hashed_pwd )
   {
      try
      {
         return self::sql(
            'INSERT INTO users( lname, fname, uid, email, pwd ) VALUES( ?, ?, ?, ?, ? )',
            [
               $lname, $fname, $uid, $email, $hashed_pwd
            ]
         );
      }
      catch ( PDOException $e )
      {
         die( "Something went wrong. STOP CYBER CRIME". $e->getMessage() );
         exit;
      }
   }
   // If user is trying to register existing username, it will be blocked then.
   public static function countUid( $uid )
   {
      try
      {
         return self::sql(
            'SELECT uid FROM users WHERE uid = ?',
            [
               $uid
            ]
         );
      }
      catch ( PDOException $e )
      {
         die( "Something went wrong. STOP CYBER CRIME". $e->getMessage() );
         exit;
      }
   }
   // If user is trying to register existing email, it will be blocked then.
   public static function countEmail( $email )
   {
      try
      {
         return self::sql(
            'SELECT email FROM users WHERE email = ?',
            [
               $email
            ]
         );
      }
      catch ( PDOException $e )
      {
         die( "Something went wrong. STOP CYBER CRIME". $e->getMessage() );
         exit;
      }
   }
}