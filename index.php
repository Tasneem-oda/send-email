<?php
       $statusMessage = '';
    if(isset($_POST['submit'])){
        $sender = $_POST['sender'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $reciver = 'tasneemahmed2112005@gmail.com';
        if(filter_var($sender ,FILTER_VALIDATE_EMAIL)){
            if(mail($reciver, $subject ,$message , $sender)){
                $statusMessage = 'Your message has been sent!';
            }else{
                $statusMessage = 'Something went wrong, please try again!';
                if ($error = error_get_last()) {
                    $statusMessage .= ' Error: ' . $error['message'];
                }
            }
        }else{
            $statusMessage = 'Please enter a valid email';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>send messages</title>
</head>
<body>
    <form action="index.php" method="post">
        <header>Send Message</header>
        <p>send message to any one from localhost</p>
        <input type="email" name="sender" placeholder="sender email">
        <input type="text" name = "subject" placeholder="subject">
        <textarea name="message" name="message" placeholder="write your message" ></textarea>
        <button type="submit" name="submit">send</button>
        <div class="status">
            <?php
          echo $statusMessage;
        ?>
        </div>
    </form>
</body>
</html>