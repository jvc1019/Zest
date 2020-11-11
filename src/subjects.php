<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->

<body>
    <div class="container">
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
                    // print_r($subjects);
    ?>
                    <!--Cards Section-->
                    <div class="col-sm-4 col-md-3">
                        <div class="card" style="width: 16rem;">
                            <img class="card-img-top" src="img/something.jpg" alt="Image here/Maybe emoji">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $subjects['subject_Name']?></h4>
                                <h5 class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor']?></h5>
                                <p class="card-text"><?php echo $subjects['subject_Desc']?></p>

                            </div>
                        
                        
                        </div>
                    
                    </div>

    <?php
                //end of while
                }

            //end of if (mysqli_num_rows($result)>0){
            }

        //end of if ($result){
        }

    ?>

</body>
