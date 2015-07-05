<!DOCTYPE html>
		
<html>
<title>Student Center Log In</title>
<?php
	
	include ("include.php");

    
	
	if(!isset($_SESSION["student_id"])){
		echo "Welcome to the Student Center, please log in. <br>\n";
	}
	
	else{
		$p_id = htmlspecialchars($_SESSION["student_id"]);
		echo "Welcome, $first_name $last_name. You are currently logged in.<br />";
        echo "Your grades are displayed below:<br />";
        
        $sql = "select g.grade, c.name, c.subject, s.term, s.year from grade g left join class c on g.class_id = c.id left join semester s on g.semester_id = s.id where g.student_id = $p_id";
        //$sql = "select g.grade, s.term, s.year, c.name, c.subject from grade g left join class s on g.class_id = c.id"; //=where student_id = $p_id";
        //$sql2 = "select c.name, s.term from semester s left join class c on s.class_id = c.id"
        $result = mysqli_query($mysqli,$sql)or die(mysqli_error());
        
        echo "<table>";
        echo "<tr><th>Subject</th><th>name</th><th>Term</th><th>Year</th><th>Grade</th></tr>";
        
        while($row = mysqli_fetch_array($result)) {
            $subject = $row['subject'];
            $name = $row['name'];
            $term = $row['term'];
            $year = $row['year'];
            $grade = $row['grade'];
            echo "<tr><td style='width: 200px;'>".$subject."</td><td style='width: 200px;'>".$name."</td><td style='width: 200px;'>".$term."</td><td   style='width: 200px;'>".$year."</td><td style='width: 200px;'>".$grade."</td></tr>";
        }
        
        echo "</table>";
	}
?>
</html>