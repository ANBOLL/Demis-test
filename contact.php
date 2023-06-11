
<?php 
    include('php/db.php');
        if (!empty($_POST["send"])) 
        {
                $name = $_POST["name"];
                $adress = $_POST["adress"];
                $phone = $_POST["phone"];
                $email = $_POST["email"];
                $toMail = "myglavniyacount@gmail.com";
                $header = "From: " . $name . "<" . $email . ">\r\n";
            if (mail($toMail, $adress, $phone, $header)) 
                {
                    $sql = $conn->query("INSERT INTO contacts_list(name, adress, phone, email,  sent_date) VALUES ('{$name}', '{$adress}', '{$phone}' , '{$email}',  now())");
                    if (!$sql) 
                        {
                            die("MySQL query failed.");
                        } 
                    else
                     
                   
                        {
                            $response = array(
                                "message" => "Мы получили ваше письмо: <br>
                                ФИО: {$name}', <br>
                                Адрес: '{$adress}', <br>
                                Ваш номер телефона: '{$phone}', <br>
                                Ваша почта: '{$email}', <br>
                                Мы свяжемся с Вами в ближайшее время!                
                                "
                            );
                        } 
                } 
                else 
                    {
                        $response = array(                    
                            "message" => "Message coudn't be sent, try again"
                        );
                    }
        }
        include("feedback.php");
        ?>
    </div>
      