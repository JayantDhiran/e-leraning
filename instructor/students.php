<?php
require_once("../database/dbconn.php");
$page = "students";
$db = new Database();

if($db->select('company','Company_Name,Description,Company_Logo,Contact_Number,Email_address,Company_price')){
    $em = $db->getResult();
    $cnt = count($em) == 0 ? $er = "" : count($em);
}else{
    $err = "Error Fetching Data";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Record</title>
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="../css/instructorPanel.css">
</head>
<body>
    <?php include_once('../inc/instHeader.php') ?>

    <div class="inst_ss">  
        <?php include_once('sidebar.php') ?>

        <div class="dash">

        <div class="student_details">
            <div class="stu_d_h">Student Details</div>
            <table class="stu_d_tb" id="stu_d_tb">
                <tr class="stu_d_th">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Courses Enrolled</th>
                </tr>
                <?php $i=0;  while($i<$cnt){
                echo "<tr class='stu_d_td'>";
                    $uname = isset($em[$i]['Company_name']) ? $em[$i]['Company_name'] :  $err = "Error Fetching Data";
                    $desc = isset($em[$i]['Description']) ? $em[$i]['Description'] :  $err = "Error Fetching Data";
                    $logo = isset($em[$i]['Company_Logo']) ? $em[$i]['Company_Logo'] :  $err = "Error Fetching Data";
                    $num = isset($em[$i]['Contact_Number']) ? $em[$i]['Contact_number'] :  $err = "Error Fetching Data";
                    $email = isset($em[$i]['Email_address']) ? $em[$i]['email_address'] :  $err = "Error Fetching Data";
                    $price = isset($em[$i]['Company_price']) ? $em[$i]['Company_price'] :  $err = "Error Fetching Data";
                    echo"<td>$cnt</td>
                    <td>$uname</td>
                    <td>$desc</td>
                    <td>$logo</td>
                    <td>$num</td>
                    <td>$email</td>
                    <td>$price</td>
                    </tr>";
                    $i++;
                 } ?>
            </table>
        </div>


        </div>

    </div>

    <script src="../javascript/jquery.js"></script>
    <script src="../javascript/all.js"></script>
    <script src="../javascript/instructorPanel.js"></script>
</body>
</html>