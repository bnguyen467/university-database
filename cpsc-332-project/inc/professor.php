<?php include '../config/database.php';
    include '../inc/header.html';

    // Go back button
    echo '<a style="position:absolute;" href="../index.html">
        <button class="btn btn-secondary">BACK</button></a>

        <div class="professor-search-box">
            <form class="professor-search-form" action="" method="get">
                <input type="text" placeholder="Search by SSN" name="SSN">
                <input type="submit" value="Search">
            </form>

            <form class="professor-search-form" action="" method="get">
                    <input class="course-input" type="text" placeholder="Course Number" name="courseNum">
                    <input class="course-input" type="text" placeholder="Section Number" name="sectionNum">
                    <input type="submit" value="Search">
            </form>
        </div>';

    if(!empty($_GET["SSN"]))
    {
    $inputSSN = $_GET["SSN"];
    $professor = "SELECT CTitle, RoomNumber, Meetdays, TimeStart, TimeEnd
                FROM professor p, course c, section s
                WHERE p.SSN = '$inputSSN' AND p.SSN = s.PSSN AND s.CourseNumber = c.CNumber;";
    $inputResult = mysqli_query($conn, $professor);
    if($inputResult->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>Course Title</th>
        <th>Classrooms</th>
        <th>Meeting Days</th>
        <th>Time Start</th>
        <th>Time End</th>';
        while($row = mysqli_fetch_array($inputResult))
        {
            echo "<tr>";
            echo "<td>" . $row['CTitle'] . "</td>";
            echo "<td>" . $row['RoomNumber'] . "</td>";
            echo "<td>" . $row['Meetdays'] . "</td>";
            echo "<td>" . $row['TimeStart'] . "</td>";
            echo "<td>" . $row['TimeEnd'] . "</td>";
            echo "</tr>";
        }
    }
    else
        echo '<br><h4 style="text-align:center;">There is no Data!<h4>';
    }

    // Given a course number and a section number, count how many students get each distinct grade 
    if (!empty($_GET["courseNum"]) && !empty($_GET["sectionNum"]))
    {
        echo '<br><h4 style="text-align:center;">Number of Students Each Distinct Grade:</h4>';
        $inputCourse = $_GET["courseNum"];
        $inputSection = $_GET["sectionNum"];

        echo '<table class="table table-striped">
        <tr>
        <th>Course Title</th>
        <th>Section Number</th>
        <th>A+ </th>
        <th> A </th>
        <th> A- </th>
        <th> B+ </th>
        <th> B </th>
        <th> B- </th>
        <th> C+ </th>
        <th> C </th>
        <th> C- </th>';
        
        echo "<tr>";
        echo "<td>" . $inputCourse . "</td>";
        echo "<td>" . $inputSection . "</td>";

        // Count A+ grade
        $mysql_gradeAp = "SELECT COUNT(e.grade) as gradeAp
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'A+' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";

        $gradeAp = mysqli_query($conn, $mysql_gradeAp);
        $row = mysqli_fetch_array($gradeAp);
        echo "<td>" . $row['gradeAp'] . "</td>";

        // Count A grade
        $mysql_gradeA = "SELECT COUNT(e.grade) as gradeA
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'A' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeA = mysqli_query($conn, $mysql_gradeA);
        $row = mysqli_fetch_array($gradeA);
        echo "<td>" . $row['gradeA'] . "</td>";

        // Count A- grade
        $mysql_gradeAm = "SELECT COUNT(e.grade) as gradeAm
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'A-' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeAm = mysqli_query($conn, $mysql_gradeAm);
        $row = mysqli_fetch_array($gradeAm);
        echo "<td>" . $row['gradeAm'] . "</td>";
        
        // Count B+ grade
        $mysql_gradeBp = "SELECT COUNT(e.grade) as gradeBp
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'B+' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeBp = mysqli_query($conn, $mysql_gradeBp);
        $row = mysqli_fetch_array($gradeBp);
        echo "<td>" . $row['gradeBp'] . "</td>";
        
        // Count B grade
        $mysql_gradeB = "SELECT COUNT(e.grade) as gradeB
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'B' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeB = mysqli_query($conn, $mysql_gradeB);
        $row = mysqli_fetch_array($gradeB);
        echo "<td>" . $row['gradeB'] . "</td>";
        
        // Count B- grade
        $mysql_gradeBm = "SELECT COUNT(e.grade) as gradeBm
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'B-' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeBm = mysqli_query($conn, $mysql_gradeBm);
        $row = mysqli_fetch_array($gradeBm);
        echo "<td>" . $row['gradeBm'] . "</td>";

        // Count C+ grade
        $mysql_gradeCp = "SELECT COUNT(e.grade) as gradeCp
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'C+' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeCp = mysqli_query($conn, $mysql_gradeCp);
        $row = mysqli_fetch_array($gradeCp);
        echo "<td>" . $row['gradeCp'] . "</td>";
        
        // Count C grade
        $mysql_gradeC = "SELECT COUNT(e.grade) as gradeC
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'C' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeC = mysqli_query($conn, $mysql_gradeC);
        $row = mysqli_fetch_array($gradeC);
        echo "<td>" . $row['gradeC'] . "</td>";
        
        // Count C+ grade
        $mysql_gradeCm = "SELECT COUNT(e.grade) as gradeCm
                        FROM course c, section s, enrollment e
                        WHERE e.Grade = 'C-' AND s.SNumber = '$inputSection'
                        AND e.CourseSection = s.SNumber
                        AND c.CNumber = '$inputCourse' AND c.CNumber = s.CourseNumber";
        $gradeCm = mysqli_query($conn, $mysql_gradeCm);
        $row = mysqli_fetch_array($gradeCm);
        echo "<td>" . $row['gradeCm'] . "</td>";

        echo "</tr>";
    }
?>



