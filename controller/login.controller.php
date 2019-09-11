<?php

include '../model/Login.model.php';
// Set the input fields and error for every fields to empty value to avoid undefined notice.
$email = $pwd = '';
$general_err = '';

function validate($data)
{ // Input fields validator to avoid XSS and SQL Injection
   $data = stripslashes($data); // remove forward and back slashes
   $data = htmlspecialchars($data); // remove special characters
   $data = trim($data); // remove extra white space(s)
   return $data;
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' )
{
   $_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING ); // Validate $_POST variable

   $email = validate( $_POST['email'] );
   $pwd = validate( $_POST['pwd'] );

   if ( empty($email) && empty($pwd) )
   {
      $general_err = "<div class='alert alert-danger text-center'>Please fill up all fields.</div>";
   }
   elseif ( !filter_var( $email, FILTER_VALIDATE_EMAIL ) )
   {
      $general_err = "<div class='alert alert-danger text-center'>Invalid Email format! Please try again.</div>";
      $email = '';

   }
   {
      if ( empty($general_err) )
      {
         if ( !empty($email) && !empty($pwd) )
         {
            // If all fields are clear then execute login function
            $loginUser = Login::loginUser( $email );

            if ( $loginUser->rowCount() > 0 )
            {
               try
               {
                  $row = $loginUser->fetch();
                  // Pass the encrypted pwd from DB to a hashed_pwd var.
                  $hashed_pwd = $row->pwd;
                  // If hashed_pwd has been verified and matched to the pwd var, then login the user
                  if ( password_verify( $pwd, $hashed_pwd ) )
                  {
                     // Start the session of User information
                     session_start();
                     $_SESSION['user']['id'] = $row->user_id;
                     $_SESSION['user']['fname'] = $row->fname;
                     $_SESSION['user']['uid'] = $row->uid;
                     $_SESSION['user']['email'] = $row->email;
                     header( 'location: ../view/read.php' );
                     exit;

                  }
                  else
                  {
                     // If pwd does not verified and does not matched to what the user was typed,
                     // an error will show
                     $general_err = '<div class="alert alert-danger text-center">Incorrect Password</div>';
                     $pwd = '';
                  }

               } catch ( PDOException $e )
               {
                  die ( "Error processing request. ". $e->getMessage() );
               }

            }
            else
            {
               // If the user tries to login a non-existing email in DB,
               // an error will show
               $general_err = '<div class="alert alert-danger text-center">Incorrect E-mail Address</div>';
               $email = '';
               $pwd = '';
            }
         }
      }
   }
}
