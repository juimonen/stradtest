 <?php
        if(isset($_POST['submit1']) || isset($_POST['submit2'])) {

           $config = parse_ini_file('../../stradtest_config.ini');
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
	   
	   $professionalMusician = isset($_POST['professionalMusician']) ? $_POST['professionalMusician'] : 0;
	   
	   $musicologistTheorist = isset($_POST['musicologistTheorist']) ? 1 : 0;
           $musicTeacher = isset($_POST['musicTeacher']) ? 1 : 0;
	   $instrumentTeacher = isset($_POST['instrumentTeacher']) ? 1 : 0;
           $producer = isset($_POST['producer']) ? 1 : 0;
           $none = isset($_POST['none']) ? 1 : 0;

           $comments = $_POST['comments'];
           $comments = mysqli_real_escape_string($connection, $comments);

           $results1 = $_POST['results1'];
           $results1 = mysqli_real_escape_string($connection, $results1);

           $secondsTaken = $_POST['secondsTaken'];

	   $freeComments = $_POST['freeComments'];
           $freeComments = mysqli_real_escape_string($connection, $freeComments);

           $tf1text = $_POST['tf1textname'];
           $tf2text = $_POST['tf2textname'];
           $tf3text = $_POST['tf3textname'];
           $tf4text = $_POST['tf4textname'];
           $tf5text = $_POST['tf5textname'];
           $tf6text = $_POST['tf6textname'];
           $tf7text = $_POST['tf7textname'];
           $tf8text = $_POST['tf8textname'];
           $tf9text = $_POST['tf9textname'];
           $tf10text = $_POST['tf10textname'];
           $tf11text = $_POST['tf11textname'];
           $tf12text = $_POST['tf12textname'];
           $tf13text = $_POST['tf13textname'];
           $tf14text = $_POST['tf14textname'];

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
                                                     D00comments,
                                                     D01comments,
                                                     D02comments,
                                                     D03comments,
                                                     D04comments,
                                                     D05comments,
                                                     D06comments,
                                                     D07comments,
                                                     D08comments,
                                                     D09comments,
                                                     D10comments,
                                                     D11comments,
                                                     D12comments,
                                                     D13comments,
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
                                                              '$tf1text',
                                                              '$tf2text',
                                                              '$tf3text',
                                                              '$tf4text',
                                                              '$tf5text',
                                                              '$tf6text',
                                                              '$tf7text',
                                                              '$tf8text',
                                                              '$tf9text',
                                                              '$tf10text',
                                                              '$tf11text',
                                                              '$tf12text',
                                                              '$tf13text',
                                                              '$tf14text',
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

	$pieces = explode(",", $results1);

	readfile("thankyou_header.html");
	
	echo "Your violin evaluation results from worst to best:";
	echo "<br><br>";
        
	foreach($pieces as &$value) {
		switch ($value) {
    	       	       case "D00":
               	       	    echo "Stradivari 1679 Hellier";
			    echo "<br>";
        	    	    break;
		       case "D01":
               	       	    echo "Stradivari 1690 Auer";
			    echo "<br>";
        	    	    break;
    	       	       case "D02":
               	       	    echo "Stradivari 1692 Oliveira";
			    echo "<br>";
        	    	    break;
		       case "D03":
               	       	    echo "Stradivari 1701 Dushkin";
			    echo "<br>";
        	    	    break;
		       case "D04":
               	       	    echo "Stradivari 1707 La Cathedrale";
			    echo "<br>";
        	    	    break;
		       case "D05":
               	       	    echo "Stradivari 1708 Ruby";
			    echo "<br>";
        	    	    break;
		       case "D06":
               	       	    echo "Stradivari 1710 Vieuxtemps, Hauser";
			    echo "<br>";
        	    	    break;
		       case "D07":
               	       	    echo "Stradivari 1709 King Maximilian";
			    echo "<br>";
        	    	    break;
		       case "D08":
               	       	    echo "Stradivari 1715 Baron Knoop";
			    echo "<br>";
        	    	    break;
		       case "D09":
               	       	    echo "Stradivari 1722 Jupiter";
			    echo "<br>";
        	    	    break;
		       case "D10":
               	       	    echo "Stradivari 1723 Kiesewetter";
			    echo "<br>";
        	    	    break;
	               case "D11":
               	       	    echo "Stradivari 1727 Dupont";
			    echo "<br>";
        	    	    break;
		       case "D12":
               	       	    echo "Stradivari 1734 Willemotte";
			    echo "<br>";
        	    	    break;
		       case "D13":
               	       	    echo "Stradivari 1736 Muntz";
			    echo "<br>";
        	    	    break;
		}
	}

        echo "<br>";        

        readfile('thankyou_footer.html');
        
        }
     ?>