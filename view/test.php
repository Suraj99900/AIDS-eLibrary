<?php
// the message
$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
$result = mail("someone@example.com","My subject",$msg);

if ($result) {
    echo $result;
} else {
    echo $result;    
}
