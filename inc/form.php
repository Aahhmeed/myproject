<?php
$firstName = $firstName ?? '';
$lastName = $lastName ?? '';
$email = $email ?? '';

$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'EmailError' => '',
];

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']); 
    $lastName  = mysqli_real_escape_string($conn, $_POST['lastName']); 
    $email     = mysqli_real_escape_string($conn, $_POST['email']); 
    $sql = "INSERT INTO users (fistName, lastName, email) VALUES ('$firstName', '$lastName', '$email')";


    if (empty($firstName)) {
        $errors['firstNameError'] = 'يرجى ادخال الاسم الاول';
    }

    if (empty($lastName)) {
        $errors['lastNameError'] = 'يرجى ادخال الاسم الاخير';
    }

    if (empty($email)) {
        $errors['EmailError'] = 'يرجى ادخال الايميل';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['EmailError'] = 'يرجى ادخال ايميل صحيح';
    }

    
    if (empty($errors['firstNameError']) && empty($errors['lastNameError']) && empty($errors['EmailError'])) {
    
        if (mysqli_query($conn, $sql)) {
            header('location: ' . $_SERVER['PHP_SELF']);
            exit; 
        } else {
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
/*
      $firstName = $firstName ?? '';
       $lastName = $lastName ?? '';
       $email = $email ?? '';



$errors = [
    'firstNameError' => '',
    'lastNameError' => '',
    'EmailError' => '',
    ];


     if(isset($_POST['submit'])) {

          $firstName = mysqli_real_escape_string($conn, $_POST['firstName']); 
          $lastName  = mysqli_real_escape_string($conn, $_POST['lastName']); 
          $email     = mysqli_real_escape_string($conn, $_POST['email']); 

//echo $firstName . ' ' . $lastName . ' ' . $email;

$sql = "INSERT INTO users (fistName,lastName,email)
        VALUES ('$firstName','$lastName','$email')";


if(empty($firstName)){
    $errors ['firstNameError'] = 'يرجى ادخال الاسم الاول';
}


      if(empty($lastName)){
          $errors ['lastNameError'] = 'يرجى ادخال الاسم الاخير';
       }


          if(empty($email)){
               $errors ['EmailError'] = 'يرجى ادخال الايميل';
            }

                    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                         $errors ['EmailError'] = 'يرجى ادخال ايميل صحيح';
                           }



                                    else{
                                           if(mysqli_query($conn, $sql))
                                               {
                                                 header('location:' . $_SERVER['PHP_SELF']);
                                                   }
                                                      else{
                                                                 echo 'Error :' . mysqli_error($conn);
    
                                                             }
    
                                          }




}
                                          */
      

/*
$firstName  = mysqli_real_escape_string ($conn, $_POST['firstName']);
$lastName   = mysqli_real_escape_string($conn,$_POST['lastName'] );
$email      = mysqli_real_escape_string($conn,$_POST['email' ]); 
 $sql="INSERT INTO users(fistName, lastName, email)
       VALUES('$firstName', '$lastName', '$email')";

 */        
        