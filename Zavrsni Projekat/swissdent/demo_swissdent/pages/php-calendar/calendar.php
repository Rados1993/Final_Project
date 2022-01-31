<?php
function build_calendar($month,$year) {
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date)=?");
    $stmt->bind_param('ss', $month, $year);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['date'];
            }
            $stmt->close();
        }
    }
    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);
    $numberDays = date('t',$firstDayOfMonth);
    $dateComponents = getdate($firstDayOfMonth);
    $monthName = $dateComponents['month'];
    $dayOfWeek = $dateComponents['wday'];
    $dateToday = date('Y-m-d');
    $calendar = "<table class='table table-bordered'>";
    $calendar.="<center><h2>$monthName $year</h2>";
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month-1,1,$year))."&year=".date('Y',mktime(0,0,0,$month-1,1,$year))."'>Predhodni mesec</a>";
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Trenutni mesec</a>";
    $calendar.="<a class='btn btn-xs btn-primary' href='?month=".date('m',mktime(0,0,0,$month+1,1,$year))."&year=".date('Y',mktime(0,0,0,$month+1,1,$year))."'>Sledeci mesec</a></center><br>";

    $calendar.="<tr>";

    foreach($daysOfWeek as $day){
        $calendar.="<th class='header'>$day</th>";
    }
    $calendar.="</tr><tr>";
    if($dayOfWeek > 0) {
        for($k=0;$k<$dayOfWeek;$k++){
            $calendar.="<td></td>";
        }
    }
    $currentDay = 1;
    $month = str_pad($month,2,"0", STR_PAD_LEFT);
    while($currentDay<=$numberDays){
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }
        $currentDayRel = str_pad($currentDay,2,"0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";
        $dayname = strtolower(date('|',strtotime($date)));
        $eventNum=0;
        $today=$date==date('Y-m-d')?"today":"";
        if($date<date('Y-m-d')){
            $calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }elseif(in_array($date, $bookings)){
            $calendar.="<td class='$today'><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";

        } else {
            $calendar.="<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."'class=' btn btn-success btn-xs'>Book</a>";
        }
        
        $calendar.="</td>";
        $currentDay++;
        $dayOfWeek++;
    }
    if($daysOfWeek !=7) {
        $remainingDays = 7-$dayOfWeek;
        for($i=0;$i<$remainingDays;$i++){
            $calendar.="<td></td>";
            
        }
    }
            $calendar.="</tr>";
            $calendar.="</table>";
            echo $calendar;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    <style>
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 2px solid whitesmoke;
        }
        table{
            table-layout: fixed;
            
        }
        td {
            width: 33%;
            
        }
        .today {
            background: yellow;
        }
        
        body {
            background-color: lightblue;
        }
        a {
           color: rgba(218,165,32, 1);
           text-decoration: none;
        }
        
    </style>
</head>
<body>
<div>
<nav id="navigation">
        <ul>
        
            <li class=><a href="../../index.php" >Vrati se na pocetnu</a></li>
        </ul>
    </nav>
</div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12"> 
                <?php
                $dateComponents = getdate();
               if(isset($_GET['month']) && isset($_GET['year'])){
                   $month = $_GET['month'];
                   $year = $_GET['year'];
               } else {
                   $month = $dateComponents['mon'];
                   $year = $dateComponents['year'];
               }
                echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>