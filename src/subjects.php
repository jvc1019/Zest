<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->

<?php
    include("header.php");
    // include("user_details.php");
    
    // Hi, this is a query to get subjects
    $query = "SELECT * FROM `subject` ORDER BY `subject_ID` ASC";
    $result = mysqli_query($conn, $query);

    if ($result){
        //if there are results,
        if (mysqli_num_rows($result)>0){
           
            //store to array named subjects         
            while ($subjects = mysqli_fetch_assoc($result)){
            //just to check what we are dealing with
            //     print_r($subjects);
            //}


        }
    }

?>

<body>

</body>
