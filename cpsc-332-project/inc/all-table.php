<?php include '../config/database.php';
    include '../inc/header.php';

    // Go back button
    echo '<a style="position:absolute;" href="../index.php">
        <button class="btn btn-secondary">BACK</button></a>';

    // Show table professor
    $professor = 'SELECT * FROM professor';
    $result = mysqli_query($conn, $professor);

    echo '<h2 style="text-align: center;">Professor Table</h2>';
    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>SSN</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Street</th>
        <th>City</th>
        <th>State</th>
        <th>Zipcode</th>
        <th>Telephone Number</th>
        <th>Title</th>
        <th>Degree</th>
        <th>Salary</th>';
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['SSN'] . "</td>";
            echo "<td>" . $row['PName'] . "</td>";
            echo "<td>" . $row['Sex'] . "</td>";
            echo "<td>" . $row['Street'] . "</td>";
            echo "<td>" . $row['City'] . "</td>";
            echo "<td>" . $row['State'] . "</td>";
            echo "<td>" . $row['Zipcode'] . "</td>";
            echo "<td>" . $row['PTelephoneNumber'] . "</td>";
            echo "<td>" . $row['PTitle'] . "</td>";
            echo "<td>" . $row['Degree'] . "</td>";
            echo "<td>" . $row['Salary'] . "</td>";
            echo "</tr>";
        }
    }
    else
        echo "There is no Data!";
   
    // Show table Department
    $department = 'SELECT * FROM department';
    $result = mysqli_query($conn, $department);


    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>Department Number</th>
        <th>Name</th>
        <th>Telephone Number</th>
        <th>Location</th>
        <th>Chairperson</th>';
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['DNumber'] . "</td>";
            echo "<td>" . $row['DName'] . "</td>";
            echo "<td>" . $row['DTelephoneNumber'] . "</td>";
            echo "<td>" . $row['DLocation'] . "</td>";
            echo "<td>" . $row['Chairperson'] . "</td>";
            echo "</tr>";
        }
        echo '<br>';
        echo '<h2 style="text-align: center;">Department Table</h2>';
    }
    else
        echo "There is no Data!";

    // Show table Course
    $course = "SELECT *, DName FROM course c, department d WHERE c.DeptNumber = d.DNumber";
    $result = mysqli_query($conn, $course);

    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>Course Number</th>
        <th>Title</th>
        <th>Textbook</th>
        <th>Units</th>
        <th>Prerequisite</th>
        <th>Department</th>';
        while($row = mysqli_fetch_array($result))
        {

            echo "<tr>";
            echo "<td>" . $row['CNumber'] . "</td>";
            echo "<td>" . $row['CTitle'] . "</td>";
            echo "<td>" . $row['Textbook'] . "</td>";
            echo "<td>" . $row['Units'] . "</td>";
            echo "<td>" . $row['Prerequisite'] . "</td>";
            echo "<td>" . $row['DName'] . "</td>";
            echo "</tr>";
        }
        echo '<br>';
        echo '<h2 style="text-align: center;">Course Table</h2>';
    }
    else
        echo "There is no Data!";

        // Show table Section
    $section = "SELECT s.*, p.PName FROM section s, professor p WHERE p.SSN = s.PSSN";
    $result = mysqli_query($conn, $section);

    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>Section Code</th>
        <th>Title</th>
        <th>Location</th>
        <th>Meet Days</th>
        <th>Time Start</th>
        <th>Time End</th>
        <th>Professor</th>
        <th>Course Number</th>';
        while($row = mysqli_fetch_array($result))
        {

            echo "<tr>";
            echo "<td>" . $row['SNumber'] . "</td>";
            echo "<td>" . $row['SName'] . "</td>";
            echo "<td>" . $row['RoomNumber'] . "</td>";
            echo "<td>" . $row['SeatNumber'] . "</td>";
            echo "<td>" . $row['Meetdays'] . "</td>";
            echo "<td>" . $row['TimeStart'] . "</td>";
            echo "<td>" . $row['TimeEnd'] . "</td>";
            echo "<td>" . $row['PName'] . "</td>";
            echo "<td>" . $row['CourseNumber'] . "</td>";
            echo "</tr>";
        }
        echo '<br>';
        echo '<h2 style="text-align: center;">Section Table</h2>';
    }
    else
        echo "There is no Data!";

        // Show table Student
    $student = "SELECT * FROM student";
    $result = mysqli_query($conn, $student);

    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>CWID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Telephone Number</th>
        <th>Major</th>
        <th>Minor</th>';
        while($row = mysqli_fetch_array($result))
        {

            echo "<tr>";
            echo "<td>" . $row['CWID'] . "</td>";
            echo "<td>" . $row['FName'] . "</td>";
            echo "<td>" . $row['LName'] . "</td>";
            echo "<td>" . $row['Address'] . "</td>";
            echo "<td>" . $row['STelephoneNumber'] . "</td>";
            echo "<td>" . $row['Major'] . "</td>";
            echo "<td>" . $row['Minor'] . "</td>";
            echo "</tr>";
        }
        echo '<br>';
        echo '<h2 style="text-align: center;">Section Table</h2>';
    }
    else
        echo "There is no Data!";

            // Show table Enrollment
    $enrollment = "SELECT enrollment.*, student.CWID, section.SNumber 
                FROM enrollment, student, section 
                WHERE enrollment.StudentID = student.CWID 
                AND enrollment.CourseSection = section.SNumber";
    $result = mysqli_query($conn, $enrollment);

    if($result->num_rows > 0)
    {
        echo '<table class="table table-striped">
        <tr>
        <th>Student ID</th>
        <th>Course Section</th>
        <th>Grade</th>';
        while($row = mysqli_fetch_array($result))
        {
            echo "<tr>";
            echo "<td>" . $row['CWID'] . "</td>";
            echo "<td>" . $row['SNumber'] . "</td>";
            echo "<td>" . $row['Grade'] . "</td>";
            echo "</tr>";
        }
        echo '<br>';
        echo '<h2 style="text-align: center;">Enrollment Table</h2>';
    }
    else
        echo "There is no Data!";
?>
