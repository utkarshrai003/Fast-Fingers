<?php

session_start();

include_once 'connection.php';

$menu = $_GET['menu'];


$db = new Database();
$db->connect();
$count = 1;

echo '<ul class="list-group" style="overflow-y:hidden ; height:420px ; width : 350px ; overflow-y:auto;">';
if($menu==1)
{
    $query = "select user_name , wpm , correct , incorrect , accuracy , keystrokes from ranking NATURAL JOIN users GROUP BY user_id ORDER BY wpm DESC";//(Select MAX(wpm) FROM ranking GROUP BY user_id) ORDER BY wpm DESC";
    $result = $db->run_query($query);

    while($row = mysqli_fetch_array($result))
    {
          echo '<li class="list-group-item" style="height:140px">
                <div><strong style="float:left"> '.ucfirst($row['user_name']).' </strong> <span style="float:right">WPM : '.$row['wpm'].' </span> </div><br><br>
                <div style="float:left ;"><table class="table" style="font-size:15px;"><tr><td>Correct : '.$row['correct'].'</td><td>Incorrect : '.$row['incorrect'].'</span><td></tr>
                <tr><td>Accuracy : '.$row['accuracy'].'%</td><td>Keystrokes : '.$row['keystrokes'].'</td></tr></table></div>
                <div style="float:right"><span style="font-size:20px"> '.$count++.' </span></div></li>';
    }
}

else if($menu==2)
{
    $query = "select * from ranking NATURAL JOIN users WHERE user_name='" . $_SESSION['user_name'] . "' ORDER BY id DESC";
    $result = $db->run_query($query);

    while($row = mysqli_fetch_array($result))
    {
          echo '<li class="list-group-item"><strong> '.ucfirst($row['user_name']).' </strong> <span style="float:right">WPM : '.$row['wpm'].' </span><br><br> Correct : '.$row['correct'].' <span style="float:right">Incorrect : '.$row['incorrect'].'</span> <br> Accuracy : '.$row['accuracy'].'% <span style="float:right">Keystrokes : '.$row['keystrokes'].' </span> </li>';
    }
}

else if($menu==3)
{
    $query = "select * from ranking NATURAL JOIN users ORDER BY id DESC";
    $result = $db->run_query($query);

    while($row = mysqli_fetch_array($result))
    {
          echo '<li class="list-group-item"><strong> '.ucfirst($row['user_name']).' </strong> <span style="float:right">WPM : '.$row['wpm'].' </span><br><br> Correct : '.$row['correct'].' <span style="float:right">Incorrect : '.$row['incorrect'].'</span> <br> Accuracy : '.$row['accuracy'].'% <span style="float:right">Keystrokes : '.$row['keystrokes'].' </span> </li>';
    }
}

echo '</ul>';

/*<ul class="list-group" style="overflow:hidden ; height:300px ; overflow-y:scroll;">
          <li class="list-group-item"><strong>AKSHIT DUA</strong><br><br> Correct : 30&nbsp&nbsp<span style="float:right ; font-size:20px">rank : 34 <br> wpm : 267</span> Incorrect : 3 <br> Accuracy : 98% <br> Keystrokes : 267</li>
       </ul>




                 echo '<li class="list-group-item" style="height:110px">
                <div><strong style="float:left"> '.ucfirst($row['user_name']).' </strong> <span style="float:right">WPM : '.$row['wpm'].' </span> </div><br><br>
                <div style="float:left"><span style="float:left">Correct : '.$row['correct'].'</span><span style="float:right">Incorrect : '.$row['incorrect'].'</span><br>
                <span style="float:left">Accuracy : '.$row['accuracy'].'%&nbsp&nbsp&nbsp </span><span style="float:right"> Keystrokes : '.$row['keystrokes'].'</span></div>
                <div style="float:right"><span style="font-size:20px"> rank : '.$count++.' </span></div></li>';*/

?>