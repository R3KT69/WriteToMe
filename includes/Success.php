<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $message = htmlspecialchars($_POST["response"]);

    if (empty($message)) {
        header("Location: ../index.php");
        exit();
    }

    if (strlen($message) > 1000) {
        echo"Message Must be below 1000 Characters! ";
        exit();
    }

    $currentDateTime = date("m/d/Y");
    $directory = "../includes/Comments/";
    $filename = $directory . "Comment_dump";
    $file = fopen($filename, 'a');
    fwrite($file, ">>⠀" . $message . "<br>" . "Date: " . $currentDateTime . "<br>");
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>< Success ></title>
    <style>
        @font-face {
            font-family: font1;
            src: url(Linebeam.ttf);
        }

        @font-face {
            font-family: font2;
            src: url(alagard.ttf);
        }

        ::-webkit-scrollbar {
            width: 10px; 
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: rgba(128, 0, 107, 0.75); 
            border-radius: 10px; 
        }

        

        body {
            background-color: black;
            font-family: font1;
            text-align: center;
            height: 98vh;
            display: flex;
            justify-content: center;
            flex-direction: column;
            margin: auto;
            color: rgb(128, 0, 107);
        }

        .comments {
            font-family: font1;
            font-size: 20px;
            padding: 10px;
            background-color: black;
            border: 2px solid rgb(73, 0, 61);
            border-radius: 10px;
            color: rgb(128, 0, 107);
            text-align: left;
            height: 600px;
            width: 500px;
            resize: none;
            position: fixed;
            left: 0;
            right: 0;
            margin: auto;
            outline: none;
            overflow-y: auto; 
            display: flex; 
            flex-direction: column-reverse;
            transform: translateY(50px);
            animation: fadeIn 2s forwards;
            opacity: 0;
            word-wrap: break-word;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        p {
            font-size: 50px;
            font-family: font1;
            text-align: center;
            color: rgb(128, 0, 107);
            position: fixed;
            top: 0;
            width: 100%;
            transform: translateY(150px);
            animation: fadeIn2 2s 2s forwards, transf 2s 1s forwards;
            opacity: 0;
        }

        @keyframes fadeIn2 {
            0% {
                transform: translateY(150px);
            }

            100% {
                transform: translateY(50px);
            }
        }

        @keyframes transf {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @media (max-width: 600px) {
            .comments {
                width: 300px;
            }
        }

        @media (max-height: 750px) {
            .comments {
                height: 400px;
            }
        }


    </style>
</head>
<body>
    <p>Comments</p>
    <div class="comments">
        <?php 
            $read = file_get_contents("../includes/Comments/Comment_dump");
            echo $read;
            
        ?>
    </div>
    
</body>
</html>