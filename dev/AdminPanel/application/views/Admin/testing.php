<?php
//if "email" variable is filled out, send email


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
extract($_POST);
//$image = $_FILES["ResImage"]["name"];
//move_uploaded_file($_FILES["ResImage"]["tmp_name"], "/home/teknovisual/Client_File/" . $image);
$today =date("Y-m-d");
mkdir('/home/teknovisual/Client_File/'.$today, 0777, true);
mkdir('/home/teknovisual/Client_File/'.$today.'/'.$CompanyName, 0777, true);

foreach($_FILES as $file) {

    $n = $file['name'];
    $s = $file['size'];

//    if (is_array($n)) {
        $c = count($n);
        for ($i = 0; $i < $c; $i++) {
            move_uploaded_file($_FILES["ResImage"]["tmp_name"][$i], "/home/teknovisual/Client_File/" . $today . '/' . $CompanyName . '/' . $n[$i]);

            // echo "<br>uploaded: " . $n[$i] . " (" . $s[$i] . " bytes)";
        }
//    }
//else {
//        echo "<br>uploaded: $n ($s bytes)";
//    }
}

////Email information
//$admin_email = "md.sakibrahman@gmail.com";
////$email = $_REQUEST['email'];
//$email = "test@email.com";
//
//
////$subject = $_REQUEST['subject'];
//$subject = "Job Request";
//
////$comment = $_REQUEST['message'];
//
//
////echo $email;
////echo $comment;
//$message = "Company Name: $CompanyName \r\n\n";
//$message .= "Attach High Res Image: $ResImage \r\n\n";
//$message .= "Comments: $Comments \r\n\n";
//
//
////send email
//mail($admin_email, $subject, $message , $email);
//echo "<script>
//		alert('Your Email Has Been Sent');
//		window.location.href= 'http://teknovisual.com/';
//	</script>";
//Email response
//echo "Thank you for contacting us!";


//if "email" variable is not filled out, display the form


?>