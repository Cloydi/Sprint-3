<?php
    include('dbconnection.php');
    session_start();
    if(!isset($_SESSION['email']))
    {
        header("Location: out_contact.php");
    }
    $query = "SELECT * FROM users";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ratings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    * {
      box-sizing: border-box;
    }
    
    body { width: 1000px; margin: auto; }

    input[type=text], input[type=email], input[type=number], select, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=submit] {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=submit]:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {
      .col-25, .col-75, input[type=submit] {
        width: 100%;
        margin-top: 0;
      }
    }
    </style>
</head>
<body>
<?php
    $email = $name = $comment ="";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $email      =   test_input($_POST["email"]);
        $name       =   test_input($_POST["name"]);
        $comment    =   test_input($_POST["comment"]); 
        
            if($name=="" || $email=="" || $comment=="" )
            {
                echo "Please enter your information";
            }
            else
            {
                echo "Thank you for commenting!";
            }
        
        $qry = "INSERT INTO message(email, name, comment) VALUES('".$email."', '".$name."', '".$comment."')";
        $run_qry = mysqli_query($connection, $qry);
    }

    function test_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

mysqli_close($connection);
?>
