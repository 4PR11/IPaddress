<!DOCTYPE html>
<html>
<head>
    <?php
		include("./templates/teacher.php");
		teacher_render_head();
	?>
    <title>Назначить работу</title>
</head>
<body>
    <div class="top-row">
        <nav class="navbar navbar-expand-lg navbar-light theme-coulor">
            <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Задания<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Назначенные КР</a>
                    </li>
                    </ul>

                    <a class="btn btn-primary" href="./login.php">
                        Войти
                    </a>
                </div>
            </div>
        </nav> 
    </div>
    <div class="container">
        <div class="separator"></div>
        <div class="row">
            <div class="col">
                <table class="table">
                <thead>
                    <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>