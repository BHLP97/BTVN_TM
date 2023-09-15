<!DOCTYPE html>
   <html>
   <head>
       <title>PHP Exercise</title>
   </head>
   <body>
        <h1>Kiểm tra tính chẵn lẻ của 1 số</h1>
        <?php
            $number = rand(10,100);// Khởi tạo giá trị của 1 số
            // TODO Viết code để kiểm tra xem $number là số chẵn hay lẻ
            // Gán kết quả vào biến $result ("chẵn" hoặc "lẻ")
            $result = (($number % 2 == 0) ? "chẵn" : "lẻ") 
           
        ?>
        <p>Số: <?php echo $number; ?> là số <?php echo $result; ?>.</p>

        <h1>Tính điểm</h1>
        <?php
            $number = rand(10,100);// Khởi tạo giá trị của 1 số
            // TODO Viết code để kiểm tra xem $number là số chẵn hay lẻ
            // Gán kết quả vào biến $result ("chẵn" hoặc "lẻ")
            $result = (($number % 2 == 0) ? "chẵn" : "lẻ")

        ?>
        <p>Số: <?php echo $number; ?> là số <?php echo $result; ?>.</p>

        <h1>Tính điểm</h1>
        <?php
            $score = rand(0,100);
            // TODO: Tính điểm của học sinh dựa vào $score.
            // Scores>90 là A, 80-89: B, 70-79: C, 60-69: D, dưới 60: F.
            if($score > 90){
                $grade = 'A';
            } elseif($score >= 80) {
                $grade = 'B';
            } elseif($score >= 70) {
                $grade = 'C';
            } elseif($score >= 60) {
                $grade = 'D';
            } else {
                $grade = 'F';
            }

        ?>
        <p>Điểm của bạn là: <?php echo $score; ?> và đạt mức <?php echo $grade; ?></p>

        <h1>Login Form</h1>
        <?php
            // TODO: Tạo form đăng nhập với username và password .
            // Viết code PHP để kiểm tra xem họ đã đăng nhập đúng chưa với $usernam và $password giả định trước
            // Hiển thị thông báo lỗi khi đăng nhập
            $username = $password = "";
            $nameErr = $passErr = $loginErr = "";

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = test_input($_POST["username"]);
                $password = test_input($_POST["password"]);

                if (empty($_POST["username"])) {
                    $nameErr = "Username is required";
                } else {
                    $username = test_input($_POST["username"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$username)) {
                        $nameErr = "Only letters and white space allowed";
                    }
                }

                if (empty($_POST["password"])) {
                    $passErr = "Password is required";
                } else {
                    $password = test_input($_POST["password"]);
                    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $password)) {
                        $passErr = "Password must be at least 8 characters long, have at least 1 digit, 1 lowercase character, 1 uppercase character and 1 special character";
                    }
                    /* if(!preg_match('/^(.{8,})$/', $password)) {
                        $passErr = "Password must be at least 8 characters long";
                    } else if(!preg_match('/^(?=.*\d)$/', $password)) {
                        $passErr = "Password must contain at least one digit";
                    } else if(!preg_match('/^(?=.*[A-Z])$/', $password)) {
                        $passErr = "Password must contain at least one uppercase char";
                    } else if(!preg_match('/^(?=.*[a-z])$/', $password)) {
                        $passErr = "Password must contain at least one lowercase char";
                    } else if(!preg_match('/^[0-9A-Za-z@#\-_$%^&+=§!\?]$/', $password)) {
                        $passErr = "Password must contain at least one special char";
                    } */
                }

                // TODO: gọi API để xắc định nếu có tk nào trong db với thông tin user này
            }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <p><span class="error">* required field</span></p>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" >
            <span class="error">* <?php echo $nameErr;?></span>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" >
            <span class="error">* <?php echo $passErr;?></span>
            <br><br>
            <input type="submit" value="Login"> <?php echo $loginErr;?>
        </form>
        <br>

        <?php
        // TODO: Hiển thị lỗi khi đăng nhập ở đây.
        ?>

        <h1>Độ tuổi đăng ký</h1>

        <?php
            // TODO: Kiểm tra tuổi của người dùng và hiển thị thông báo phù hợp.
            // thông báo "Bạn đủ tuổi để đăng ký"  với trường hợp tuổi >=18
            // thông báo "Bạn chưa đủ tuổi để đăng ký" nêu tuổi < 18
            $age = rand(13,23);

            if($age < 18) {
                echo '<script>alert("Bạn chưa đủ tuổi để đăng ký")</script>';
            } else {
                echo '<script>alert("Bạn đủ tuổi để đăng ký")</script>';
            }
        ?>
        
        <p>Tuổi của bạn là: <?php echo $age; ?>
    </body>
</html>