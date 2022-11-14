<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Add Boarding Owner</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="form">
        <a href="manageboardingOwner">Back To Home</a>
    </div>
    <div class="">
        <h1>Add Boarding Owner</h1></br></br>
        <form action="<?php echo BASEURL ?>/register/boardingownerSignup" method="POST">

            <div class="inpt">

                <div class="form-group">
                    <label>UserName</label>
                    <input type="text" id="username" class="lbl" name="username" required />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" class="lbl" placeholder="Enter password" name="password" required>
                </div>
        
                <div class="form-group">
                    <input type="submit" value="Submit" name="submit">
                </div>
            </div>
        </form>
    </div>
</body>

</html>