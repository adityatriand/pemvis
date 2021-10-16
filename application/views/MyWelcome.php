<html>
<head>
    <title>Pemrograman Visual 2021</title>
    <style rel="stylesheet" type="text/css">
        *
        {
            margin: 0;
            padding: 0;
        }
        .container
        {
            margin: 30px;
            padding: 30px;
        }
        .label_input
        {
            
        }
        .masukan
        {
            background:#FDF5CA;
            padding:5px 5px;
        }
        .box
        {
            background:#F3F1F5;
            width:350px;
            height:250px;
            margin:20px auto;
            text-align:center;
            border-radius:20px;
        }
        .btn_login
        {
            margin-top:30px;
            padding: 5px 5px;
        }
        .range
        {
            margin-top:30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="box" id="form_login" name="form_login" action="Welcome/login" method="POST">
            <h1 align="center" style="padding-top:20px;">Login</h1>
            <div class="range">
                <label for="username">Username : </label>
                <input class="masukan" type="text" id="username" name="username" placeholder="masukan username anda...">
            </div>
            <div class="range">
                <label for="password">Password : </label>
                <input class="masukan" type="password" id="password" name="password" placeholder="masukan password anda...">
            </div>
            <input type="submit" class= "btn_login" name="bt_login" id="id_login" value="Login">
        </form>
    </div>
</body>
</html>