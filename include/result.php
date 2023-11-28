<?php
    $servername = "192.168.1.4";
    $username = "amrit";
    $pass = "1234";
    $dbname = "codebyamrit";

    $conn = new mysqli($servername, $username, $pass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    $id = strval($_SESSION['id']);
    $sql1 = "select * from student_marks";

    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
    else{
        $row = ["error"];
    }
    

    $conn->close();
?>



<div class="welcome" style="height: 120px;">
    <!-- php for later -->
    <div class="text1">
        <p>
            Result 
        </p>
        <p>All the best </p>
    </div>

    <div class="table">
        <div style="display: flex;">
            <div class="row">Subject</div>
            <div class="row">Theory Marks</div>
            <div class="row">Practical Marks</div>
            <div class="row">Total</div>
        </div>
        <?php
            
            
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "DBMS" ."</div>";
                echo"<div class='rowMain'>". strval($row['st1']) ."</div>";
                echo"<div class='rowMain'>". strval($row['sp1']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st1']+$row['sp1']) ."</div>";
                echo"</div>";
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "Python" ."</div>";
                echo"<div class='rowMain'>". strval($row['st2']) ."</div>";
                echo"<div class='rowMain'>". strval($row['sp2']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st2']+$row['sp2']) ."</div>";
                echo"</div>";
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "DSA" ."</div>";
                echo"<div class='rowMain'>". strval($row['st3']) ."</div>";
                echo"<div class='rowMain'>". strval($row['sp3']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st3']+$row['sp3']) ."</div>";
                echo"</div>";
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "OOPS IN C++" ."</div>";
                echo"<div class='rowMain'>". strval($row['st4']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st4']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st4']+$row['sp4']) ."</div>";
                echo"</div>";
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "AI" ."</div>";
                echo"<div class='rowMain'>". strval($row['st5']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st5']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st5']+$row['sp5']) ."</div>";
                echo"</div>";
                echo"<div style='display: flex;'>";
                echo"<div class='rowMain'>". "MATHS" ."</div>";
                echo"<div class='rowMain'>". strval($row['st6']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st6']) ."</div>";
                echo"<div class='rowMain'>". strval($row['st6']+$row['sp6']) ."</div>";
                echo"</div>";
                
        ?>
        <!-- <div style="display: flex;">
            <div class="rowMain">name</div>
            <div class="rowMain">a</div>
            <div class="rowMain">Pract</div>
            <div class="rowMain">Total</div>
        </div>    -->
    </div>

</div>