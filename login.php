<!DOCTYPE html>
<html>
<head>

<title>Login Sistem PKH</title>

<style>

body{

    font-family: Arial;
    background: #f1f1f1;

}

.container{
    width: 350px;a
    background: white;
    padding: 30px;
    margin: 100px auto;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);

}

h2{

    text-align: center;

}

input{

    width: 100%;
    padding: 10px;
    margin-top: 10px;

}

button{

    width: 100%;
    padding: 10px;
    margin-top: 20px;
    background: royalblue;
    color: white;
    border: none;
    cursor: pointer;

}

button:hover{

    background: blue;

}

</style>

</head>

<body>

<div class="container">

<h2>LOGIN SISTEM PKH</h2>

<form action="proses_login.php" method="POST">

    Username
    <br>

    <input
    type="text"
    name="username"
    required>

    <br><br>

    Password
    <br>

    <input
    type="password"
    name="password"
    required>

    <br>

    <button type="submit">

        LOGIN

    </button>

</form>

</div>

</body>
</html>
