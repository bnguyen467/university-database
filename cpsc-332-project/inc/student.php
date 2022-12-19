<?php include '../config/database.php';
    include '../inc/header.html';
    
    // Go back button and search area
    echo '<a style="position:absolute;" href="../index.html">
        <button class="btn btn-secondary">BACK</button></a>

        <div class="student-search-box">
            <form class="student-search-form" action="" method="get">
                <input type="text" placeholder="Course Number" name="courseNum">
                <input type="submit" value="Search">
            </form>
            <form class="student-search-form" action="" method="get">
                <input type="text" placeholder="CWID" name="cwid">
                <input type="submit" value="Search">
            </form>
        </div>';

    if(!empty($_GET["courseNum"]))
    {
        // Getting sections, classrooms, meetdays, time based on course number input
        $courseNumber = $_GET["courseNum"];
        $courseSection = "SELECT s.SNumber, s.RoomNumber, s.Meetdays, s.TimeStart, s.TimeEnd
                    FROM section s, course c
                    WHERE c.CNumber = '$courseNumber' AND s.CourseNumber = c.CNumber;";
        $result = mysqli_query($conn, $courseSection);
        if($result->num_rows > 0)
        {
            // printing table
            echo '<table class="table table-striped">
            <tr>
            <th>Section Number</th>
            <th>Room Number</th>
            <th>Meeting Days</th>
            <th>Time Start</th>
            <th>Time End</th>
            <th>Number of Students Enrolled</th>';

            // printing data from database
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['SNumber'] . "</td>";
                echo "<td>" . $row['RoomNumber'] . "</td>";
                echo "<td>" . $row['Meetdays'] . "</td>";
                echo "<td>" . $row['TimeStart'] . "</td>";
                echo "<td>" . $row['TimeEnd'] . "</td>";
                //echo "</tr>";

                // counting number of student for each section
                $SectionNumber = $row['SNumber'];
                $studentNum = "SELECT COUNT(e.CourseSection) as numOfStudent
                        FROM section s, enrollment e
                        WHERE s.SNumber = '$SectionNumber' AND s.SNumber = e.CourseSection;";
                $mysql_studentNum = mysqli_query($conn, $studentNum);
                $studentNum_Result = mysqli_fetch_array($mysql_studentNum);
                
                echo "<td>" . $studentNum_Result['numOfStudent'] . "</td>";
                echo "</tr>";
            }
        }
        else
            echo '<br><h4 style="text-align:center;">There is no Data Based on Input!<h4>';
    }   

    // Getting Course Taken and Grade based on input CWID
    if(!empty($_GET["cwid"]))
    {
        $input_cwid = $_GET["cwid"];
        $cwid = "SELECT CourseSection, grade FROM Enrollment
                WHERE StudentID ='$input_cwid';";
        $mysql_cwid = mysqli_query($conn, $cwid);

        if($mysql_cwid->num_rows > 0)
        {
            echo '<table class="table table-striped">
            <tr>
            <th>Course Taken</th>
            <th>Grade</th>';

            while($row = mysqli_fetch_array($mysql_cwid))
            {
                echo "<tr>";
                echo "<td>" . $row['CourseSection'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";
                echo "</tr>";
            }
        }
        else
            echo '<br><h4 style="text-align:center;">There is no Data Based on Input!<h4>';
    }
?>


