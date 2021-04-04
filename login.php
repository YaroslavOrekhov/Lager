<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type='text/javascript' src='js/jquery-3.6.0.min.js'></script>
    <title>Document</title>
</head>
<body>
    <p>логин</p>
    <input id="login" type="text" placeholder='Логин' name='login'>
    <input type='password' placeholder='Пароль' name='password'> 
    <div style='background-color:blue; width: 10vw; margin-top: 10px;' onclick='auth()'>отправить</div>
</body>

<script>
    function auth(){
        var login = document.getElementsByName('login')[0];
        var password = document.getElementsByName('password')[0];

        login = login.value;
        password = password.value;

        // console.log('login: '+login);
        // console.log('password: '+password);
        var vdata ;
        $.ajax({
            type:"POST",
            url: 'api/auth.php',
            data:{
                slogin: login,
                spassword: password,
            },
            success: function(result){
                console.log('ok');
                console.log(result);
            },
            error: function(result){
                console.log('error');
                console.log(result);
            }
        });
    }
</script>
</html>