 <?php
        if(isset($_POST['submit1']) || isset($_POST['submit2'])) {

           $config = parse_ini_file('../../stradtest_config.ini.php');
           $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);

           if (mysqli_connect_errno()) {
                die("Connection failed: " . $connection->connect_error);
           } 
       
           /* echo "Connected successfully"; */

           /* mysqli_set_charset($connection,"utf8"); */
           /* mysqli_query($connection, "SET SQL_MODE=''"); */

           $age = $_POST['age'];
           
           $instrumentTraining = $_POST['instrumentTraining'];

           $instrumentsPlayed = $_POST['instrumentsPlayed'];
           $instrumentsPlayed = mysqli_real_escape_string($connection, $instrumentsPlayed);

           $yearsOfTraining = $_POST['yearsOfTraining'];
           $weeklyHoursOfTraining = $_POST['weeklyHoursOfTraining'];

           $professionalMusician = $_POST['professionalMusician'];
           $musicologistTheorist = $_POST['musicologistTheorist'];
           $musicTeacher = $_POST['musicTeacher'];
           $instrumentTeacher = $_POST['instrumentTeacher'];
           $producer = $_POST['producer'];
           $none = $_POST['none'];

           $comments = $_POST['comments'];
           $comments = mysqli_real_escape_string($connection, $comments);

           $results1 = $_POST['results1'];
           $results1 = mysqli_real_escape_string($connection, $results1);

           $secondsTaken = $_POST['secondsTaken'];

	   $freeComments = $_POST['freeComments'];
           $freeComments = mysqli_real_escape_string($freeComments);

           if(!mysqli_query($connection, "insert into answers_stradtest(
                                                     answer_age,
                                                     answer_instrumentTraining, 
                                                     answer_instrumentsPlayed,
                                                     answer_yearsOfTraining, 
                                                     answer_weeklyHoursOfTraining,
                                                     answer_professionalMusician,
                                                     answer_musicologistTheorist,
                                                     answer_musicTeacher,
                                                     answer_instrumentTeacher,
                                                     answer_producer,
                                                     answer_none,
                                                     answer_comments,
                                                     answer_results1,
                                                     answer_secondsTaken ) 
                                                     values ( '$age',
                                                              '$instrumentTraining', 
                                                              '$instrumentsPlayed',
                                                              '$yearsOfTraining',
                                                              '$weeklyHoursOfTraining',
                                                              '$professionalMusician',
                                                              '$musicologistTheorist',
                                                              '$musicTeacher',
                                                              '$instrumentTeacher',
                                                              '$producer',
                                                              '$none',
                                                              '$comments',
                                                              '$results1',
                                                              '$secondsTaken')"))

        {
            echo 'Error in insert: ', mysqli_error($connection);
        }


        if(!mysqli_query($connection, "insert into survey_answers_stradtest(
	                                             answer_freeComments ) 
                                                     values ('$freeComments' )"))
        {
            echo 'Error in insert: ', mysqli_error($connection);
        }


        mysqli_close($connection); // Closing Connection with Server

        header('Location: thankyou.html');
        
        exit();
        }
     ?>