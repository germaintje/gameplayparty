<?php

require_once '../model/register.model.php';
// Set the input fields and error for every fields to empty value to avoid undefined notice.
$lname = $fname = $uid = $email = $pwd = $cpwd = '';
$general_err = $lname_err = $fname_err = $uid_err = $email_err = $pwd_err = $cpwd_err = '';

function validate($data)
{ // Input fields validator to avoid XSS and SQL Injection
   $data = trim($data); // remove extra white space(s)
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   return $data;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
   $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING ); // Validate and autoset $_POST variable(s)

   $lname = validate( ucwords($_POST['lname']) ); // ucwords for pascal casing names
   $fname = validate( ucwords($_POST['fname']) );
   $uid = validate( $_POST['uid'] );
   $email = validate( $_POST['email'] );
   $pwd = validate( $_POST['pwd'] );
   $cpwd = validate( $_POST['cpwd'] );
   // If all fields are empty then return a general error
   if ( empty($lname) && empty($fname) && empty($uid) && empty($email) && empty($pwd) && empty($cpwd) )
   {
      $general_err = "<div class='alert alert-danger text-center'>All fields must be filled out</div>";
   }
   else
   {
      // Validate Last name field
      if ( empty($lname) )
      {
         $lname_err = "<span class='text-danger'>Last name is required";
      }
      elseif ( !preg_match("/^[a-zA-Z ]*$/", $lname) )
      {
         // preg_match(chars pattern, var)
         $lname_err = "<span class='text-danger'>Only letters and space are allowed</span>";
         $lname = '';
      }
      elseif ( strlen($lname) > 150 )
      {
         $lname_err = "<span class='text-danger'>Please input atleast 150 characters below</span>";
         $lname = '';
      }
      else
      {
         $lname_err = '';
      }
      // Validate First name field
      if ( empty($fname) )
      {
         $fname_err = "<span class='text-danger'>First name is required</span>";
      }
      elseif ( !preg_match("/^[a-zA-Z ]*$/", $fname ) )
      {   
         $fname_err = "<span class='text-danger'>Only letters and a white space are allowed</span>";
         $fname = '';
      }
      elseif ( strlen($fname) > 150 )
      {
         $fname_err = "<span class='text-danger'>Please input atleast 150 characters below</span>";
         $fname = '';
      }
      else
      {
         $fname_err = '';
      }
      // Validate Username field
      if ( empty($uid) )
      {
         $uid_err = "<span class='text-danger'>Username is required</span>";
      }
      elseif ( !preg_match( "/^[a-zA-Z0-9!@#$%^&*()-_=+,. ]*$/", $uid ) )
      {
         $uid_err = "<span class='text-danger'>Special characters are not allowed</span>";
         $uid = '';
      }
      elseif ( strlen($uid) > 100 )
      {
         $uid_err = "<span class='text-danger'>Please input atleast 100 characters below</span>";
         $uid = '';
      }
      else
      {
         $countUid = Register::countUid( $uid );
         if ( $countUid->rowCount() > 0 )
         {
            $uid_err = "<span class='text-danger'>Username is already taken</span>";
            $uid = '';
         }
         else
         {
            $uid_err = '';
         }
      }
      // Validate Email field
      if ( empty($email) )
      {
         $email_err = "<span class='text-danger'>Email is required</span>";
      }
      elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
      {
         $email_err = "Invalid Email format! Please try again";
         $email = '';
      }
      else
      {
         $countEmail = Register::countEmail( $email );
         if ( $countEmail->rowCount() > 0 )
         {
            $email_err = "<span class='text-danger'>Email is already taken</span>";
            $email = '';
         }
         else
         {
            $email_err = '';
         }
      }
      // Validate Password field
      if ( empty($pwd) )
      {
         $pwd_err = "<span class='text-danger'>Password is required</span>";
      }
      elseif ( !preg_match("/^[a-zA-Z0-9!@#$%^&*(),. ]*$/", $pwd ) )
      {
         $pwd_err = "<span class='text-danger'>Special characters are not allowed</span>";
         $pwd = '';
      }
      elseif ( strlen($pwd) < 8 )
      {
         $pwd_err = "<span class='text-danger'>You must input at least 8 characters above</span>";
         $pwd = '';
      }
      else
      {
         $pwd_err = '';
      }
      // Validate Confirm Password field
      if ( !empty($pwd) && empty($cpwd) )
      {
         $cpwd_err = "<span class='text-danger'>Please confirm your password</span>";
      }
      elseif ( $cpwd !== $pwd )
      {
         $cpwd_err = "<span class='text-danger'>Password did not matched! Please try again</span>";
         $cpwd = '';
      }
      else
      {
         $cpwd_err = '';
      }
   }
   // If all input and error fields are not empty then register user.
   if ( !empty($lname) && !empty($fname) && !empty($uid) && !empty($email) && !empty($pwd) && !empty($cpwd) )
   {
      if ( isset( $_POST['login'] ) )
      {
         echo "<script>alert('All input data has been deleted'); window.location.href('index.php'); </script>";
      }
      if ( empty($general_err) && empty($lname_err) && empty($fname_err) && empty($uid_err) && empty($email_err) && empty($pwd_err) && empty($cpwd_err) )
      {
         try
         {
            // Hash the password for security and loyalty purpose :)
            $hashed_pwd = password_hash( $pwd, PASSWORD_DEFAULT );
            $registered = Register::registerUser( $lname, $fname, $uid, $email, $hashed_pwd );
            header('location: ../view/login.php');
            unset($_POST);
            exit;
         }
         catch ( PDOException $e )
         {
            // if pwd verification failed, catch block will throw an error
            die( "Error logging in. ". $e->getMessage() );
         }
      }
   }
}