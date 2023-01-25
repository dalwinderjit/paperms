<?php
function getDate_($date_string){
	$date_ = DateTime::createFromFormat('d/m/yy',$date_string);
	if($date_){
		return $date_->format('Y-m-d');
	}else{
		$date_ = DateTime::createFromFormat('yy-m-d',$date_string);
		if($date_){
			return $date_->format('Y-m-d');
		}else{
			
		}
		return '0000-00-00';
	}
}
function insert_course($conn, $course_id, $training_institute_id, $employee_id, $course_start_date, $course_end_date,$order_no,$order_date, $created){
	$enabled = 'YES';
	$deleted = 'NO';
	//var_dump($conn);
	$stmt = $conn->prepare("INSERT INTO employee_courses (`course_id`, `training_institute_id`, `employee_id`, `course_start_date`, `course_end_date`, `order_no`, `order_date`, `created`, `enabled`, `deleted`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	//var_dump($stmt);
	$stmt->bind_param('dddsssssss', $course_id, $training_institute_id, $employee_id, $course_start_date, $course_end_date, $order_no, $order_date, $created, $enabled, $deleted);
	$stmt->execute();
}
$servername = "localhost";
$username = "root";
$password = "";
$database = 'paprms_pap';

// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected Successfully<br>\n";
//get the courses
$courses = [];
$query = "Select * from courses";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	if(strtoupper(trim($row['slug']))=='WEAPON & TACTICS COURSE'){
		$courses['SPECIAL WEAPON & TACTICS COURSE'] = $row['id'];
	}
	$courses[strtoupper(trim($row['slug']))] = $row['id'];
}
$courses['OTHER'] = 0;

$institutes = [];
$query = "Select * from training_institutes";
$result = $conn->query($query);
while($row = $result->fetch_assoc()){
	$institutes[strtoupper(trim($row['slug']))] = $row['id'];
}
$institutes['OTHER'] = 0;
$query = "Select * from newosi where TrainingInstitutessti!=''";
$result = $conn->query($query);
$i=1;
$count = 1;
$order_no = '';
$order_date = '0000-00-00';
$created = (new DateTime())->format('Y-m-d');
//echo $created;
while($row = $result->fetch_assoc()){
	$institutes_ = explode('@',$row['TrainingInstitutessti']);
	$courses_ = explode('@',$row['NamesofsCourses']);
	$duration_start_dates_ = explode('@',$row['DurationsofsCourses']);
	$duration_end_dates_ = explode('@',$row['DurationsofsCoursest']);
	$employee_id = $row['man_id'];
	foreach($institutes_ as $k=>$val){
		
		$course_id = 0;
		$training_institute_id = 0;
		$course_start_date = '';
		$course_end_date = '';
		echo $count.' , ';
		echo $employee_id.' , ';
		if(null!=$duration_start_dates_[$k]){
			$course_start_date = getDate_($duration_start_dates_[$k]);
			//echo $duration_start_dates_[$k].' - ';
			$course_start_date.=' 00:00:00';
		}else{
			//echo ' NOT FOUND - ';
			$course_start_date= '0000-00-00 00:00:00';
		}
		echo '<B>'.$course_start_date,'</b> ,';
		if(null!=$duration_end_dates_[$k]){
			$course_end_date = getDate_($duration_end_dates_[$k]);
			//echo $duration_end_dates_[$k].'  ';
			//echo '<B>'.$course_end_date,'</b>';
			if($course_end_date=='0000-00-00'){
				$course_end_date.=' 00:00:00';
			}else{
				$course_end_date.=' 23:59:59';
			}
		}else{
			//echo ' NOT FOUND ';
			$course_end_date = '0000-00-00 00:00:00';
		}	
		echo '<B>'.$course_end_date,'</b> , ';
		
		//echo $institutes_[$k].' - ';
		
		if(null!=$courses_[$k] && trim($courses_[$k])!=''){
			echo $courses_[$k].' - ';
			if(isset($courses[trim(strtoupper($courses_[$k]))])){
				//echo 'SET';
				$course_id =$courses[trim(strtoupper($courses_[$k]))];
			}else{
				
			}
		}else{
			echo ' NOT FOUND - ';
			$course_id=-1;
		}
		echo $course_id.' , ';
		if(null!=$institutes_[$k]){
			echo $institutes_[$k].' - ';
			if(isset($institutes[trim(strtoupper($institutes_[$k]))])){
				//echo 'SET';
				$training_institute_id =$institutes[trim(strtoupper($institutes_[$k]))];
			}
			//$training_institute_id =$institutes[trim(strtoupper($institutes_[$k]))];
		}else{
			echo ' NOT FOUND - ';
			$training_institute_id=-1;
		}
		echo $training_institute_id.' ,';
		if($training_institute_id==-1 || $course_id==-1){
			
		}else{
			insert_course($conn, $course_id, $training_institute_id, $employee_id, $course_start_date, $course_end_date,$order_no,$order_date, $created);
		}
		$count++;
		echo "\n";
	}
	$i++;
	//echo '<hr>';
}

$conn->close();
?>