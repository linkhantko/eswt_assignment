<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="frontend_login/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="frontend_login/css/style.css">
</head>
<body>

    <div class="main">
        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form" action="add_student.php" enctype="multipart/form-data">
                <h2>Student Register form</h2>
                <div class="form-group-1">
                    <!-- <input type="text" name="title" id="title" placeholder="Title" required /> -->
                    <input type="text" name="name" id="name" placeholder="Your Name" required />
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <input type="text" name="password" id="password" placeholder="password" required />
                    <input type="number" name="phone" id="phone_number" placeholder="Phone number" required />
                    <input type="text" name="address" id="name" placeholder="Address" required />
                    <input type="date" name="dob" id="date" placeholder="Date of Birth" required />
                    <div class="select-list">
                        <select name="gender" required>
                            <option value="Male" checked>Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <input type="file" name="photo" id="photo" placeholder="Photo"  accept="image/x-png,image/gif,image/jpeg" required />
                </div>
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Register" />
                    <a href="index" class="nav-link text-left">Back</a>
                </div>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="frontend_login/vendor/jquery/jquery.min.js"></script>
    <script src="frontend_login/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
