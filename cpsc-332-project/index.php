<?php include 'config/database.php';
    include 'inc/header.php';

    echo '<div style="text-align: center;">
        <h3>Welcome to University Database</h3>
        </div>
        <div style="text-align: center; margin: 2rem;">
            <h4>What would you like to do?</h4>
            <a style="margin: 0.5rem;" href="inc/all-table.php">
                <button class="btn btn-secondary">Show All Tables</button></a>
            <a style="margin: 0.5rem;" href="inc/all-table.php">
                <button class="btn btn-secondary">Add a Professor</button></a>
            <a style="margin: 0.5rem;" href="inc/all-table.php">
                <button class="btn btn-secondary">Add a Student</button></a>
        </div>

        <h4 style="text-align: center;">Are you a:</h3>

        <div style="text-align: center;">
            <a style="margin: 0.5rem;" href="./inc/professor.php">
                <button class="btn btn-secondary">Professor</button></a>
            <a style="margin: 0.5rem;" href="./inc/student.php">
                <button class="btn btn-secondary">Student</button></a>
    </div>';
?>