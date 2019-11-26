<!DOCTYPE html>
<html>
<head>
    <?php
		include("./templates/teacher.php");
        include("./templates/CurUser.php");
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
                        <!--<a class="nav-link text-white" href="#">Задания<span class="sr-only">(current)</span></a>-->
                    </li>
                    </ul>
                    <span class="name-of"><?php render_name(); ?></span>
                    <a class="btn btn-primary" href="./login.php">Выйти</a>
                </div>
            </div>
        </nav> 
    </div>
    <div class="container">
        <div class="separator"></div>
        <div class="row">
            <div class="col">
                <form action="#">

                    <label for="subject-id">Выберете предмет</label>
                    <select class="custom-select" name="" id="subject-id">
                    </select>

                    <label for="work-id">Выберете работу</label>
                    <select class="custom-select" name="" id="work-id">
                    </select>

                    <label for="mode-id">Выберете режим</label>
                    <select class="custom-select" name="" id="mode-id">
                    </select>

                    <input class="btn btn-primary add-btn" type="submit" value="Начать">
                </form>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>    
</body>
</html>