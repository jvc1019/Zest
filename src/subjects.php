<!--php file responsible for adding, editing, maintaining and deleting subjects-->
<!--To be worked on by Mico and Jett-->

<body>
    <div class="container">
        <br>
    <?php
        include("header.php");
        // include("user_details.php");
        
        // Hi, this is a query to get subjects, change the user_ID to that of the logged in person
        $query = "SELECT * FROM `subject` WHERE `user_ID`=003 ORDER BY `subject_ID` ASC";
        $result = mysqli_query($conn, $query);

        if ($result){
            //if there are results,
            if (mysqli_num_rows($result)>0){
            
                //store to array named subjects
                $inc=4;
                while ($subjects = mysqli_fetch_assoc($result)){
                    //just to check what we are dealing with
                    // print_r($subjects);

                    //this portion of the code was taken from a previous activity last semester
                    $inc = ($inc == 4) ? 1 : $inc+1;
                    if($inc == 1) echo "<div class='row'>";
    ?>
                    <!--Cards Section-->
                    <div class="col-md-3">
                        <div class="card" style="width: 16rem;">
                            <img class="card-img-top" src="img/something.jpg" alt="Image here/Maybe emoji">
                            
                            <!--an overly long description can go past this height, so find a way to prevent that-->
                            <div class="card-body" style="height: 20rem;">
                                <h4 class="card-title"><?php echo $subjects['subject_Name']?></h4>
                                <h5 class="card-subtitle mb-2 text-muted"><?php echo $subjects['subject_Instructor']?></h5>
                                <p class="card-text"><?php echo $subjects['subject_Desc']?></p>

                            </div>
                        
                        
                        </div>
                    
                    </div>
                    
    <?php
                if($inc == 4) echo "</div>";
                //end of while
                }

                //aligns the cards together by creating empty divs that take up space
                if($inc == 1) echo "<div class='col-md-3'></div><div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
                if($inc == 2) echo "<div class='col-md-3'></div><div class='col-md-3'></div></div>"; 
                if($inc == 3) echo "<div class='col-md-3'></div></div>"; 

            //end of if (mysqli_num_rows($result)>0){
            }

            else{
                //format this in a pleasing way, for now its is like this for functionality
                echo"no subjects to diplsay";
            }

        //end of if ($result){
        }

    ?>

</body>
