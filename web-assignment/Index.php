<?php require_once ('Header.php'); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <form method="post" action="DB_Ops.php" onsubmit="return validateForm()" enctype="multipart/form-data">
        <main>
            <section>
                <label for="fullName">Full Name: </label>
                <p class="errors" id="nameType">
                    <br>
                </p>
                <input type="text" id="name" name="fullName" onblur="checkName(this.value)">

                <label for="dob">Date of birth: </label>
                <br>
                <input type="date" name="dob" id="date">
            </section>
            <section>
                <label for="userName">User Name: </label>
                <p class="errors" id="nameFound">
                    <br>
                </p>

                <input type="text" name="userName" onblur="checkNameDatabase(this.value)">

                <label for="mobile">Phone number: </label>
                <br>
                <input type="number" name="phone">


            </section>

            <label for="adress">Adress: </label>
            <br>
            <input type="text" name="address" id="address">
        </main>

        <main>
            <section>
                <label for="pass">Password: </label>
                <p class="errors">
                    <span id="passSpecial" class="errors"><br></span> <br>
                    <span id="passNumeral" class="errors"></span>
                </p>
                <input type="password" id="pass" minlength="8" onblur="checkPassSpecial(this.value),checkPassNumeral(this.value),confirmPass()" name="pass">


                <label for="email">Email: </label>
                <br>
                <input type="email" name="email">
            </section>

            <section>
                <label for="conpass">Confirm Password: </label>
                <p id="confirmPass" class="errors"> <br><br></p>
                <input type="password" onblur="confirmPass()" id="conPass" minlength="8">

                <label for="image" class="image">Image: </label>
                <br>
                <input type="file" class="image" name="img">
            </section>
        </main>

        <br><br><br><br>
        <input type="submit" name="submit" id="submit">
    </form>

    <aside>
        <button onclick="actors()">Actors born on your birthday</button>
        <p id="actors"> &nbsp;</p>
    </aside>

    <script src="index.js"></script>

<?php 
require_once('Footer.php');
?>
</body>
</html>