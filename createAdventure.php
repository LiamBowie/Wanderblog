<?php

        include'connect.php';
        session_start();

//AUTO GENERATION OF NEW ID
        $found = false;                                                             //have not found id
        $query = 'SELECT * FROM Adventure;';                                          //get all comments
        $results = mysqli_query($conn, $query);                                     //execute query
        $last = "";                                                                 //last ID
        while (($row = mysqli_fetch_array($results)) && ($found == false)) {    //loop results
            $last = $row['advID'];                                          //get last ID used
        }                                                                       //end while

        $lastArray = str_split($last);                                              //split into array
        $lastNum = (int)$lastArray[7];                                              //last number = last entry in array
        $newNum = $lastNum + 1;                                                     //add 1 to last number

        if($newNum>9){ $length = 7; }
        else if($newNum>99){ $length = 6;}
        else{$length=8;}

        $newID = "";                                                                //create blank newID
        for ($i = 0; $i < $length; $i++) {                                                //loop to 8
            $newID = $newID . $lastArray[$i];                                       //add elements from last array to new ID
        }                                                                           //end loop
        $newID = $newID . $newNum;                                                  //newID = newID plus new Number
//END AUTOGEN

//JO CREATE ADV
        //GET VALUES FOR INPUT
        $photo = $_POST['photo'];
        $title = $_POST['title'];
        $location = 'LO00000';
        $content = $_POST['content'];
        $advID = $newID;

        //GET AUTHOR ID FROM CURRENT USER
        $authQuery = 'SELECT authID FROM Author WHERE userID = ' . $_SESSION['username'] . ';';
        $authResults = mysqli_query($conn, $authQuery);
        $authRow = mysqli_fetch_array($results);
        $authID = $row['authorID'];

        //$sql = "INSERT INTO Adventure VALUES('" . $newID . "', '" . $title . "', '" . $authID . "', '" . $location . "', '" . $content . "', '" . $photo . "')";
        //$sql = "INSERT INTO Adventure VALUES('" . $newID . "', '" . $title . "', '" . $authID . "', '" . $location . "', '" . $content . "', '" . $photo . ", 0');";
        //advID, title, author, location, content, photo
        $insertQuery = "INSERT INTO Adventure VALUES (" . $advID . ", " . $title . ", " . $authID . ", " . $location . ", " . $content . ", " . $photo . ", 0);";
        $results = mysqli_query($conn, $insertQuery);
        echo $insertQuery;
        mysqli_close($conn);

//need to add a query to get authorid instead of authorname, select * from author where authid = session authorname id


