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
                        <a class="nav-link text-white" href="./table.php">Назначенные КР</a>
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
                <label for="subject-select">Выбирите предмет</label>
                <select id="subject-select" class="custom-select">
                    <option selected="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <label for="modul-select">Выбирите модуль</label>
                <select id="modul-select" class="custom-select">
                    <p class="font-weight-light">Light text.</p>
                    <option selected="">Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>

                <label for="theme-name">Выбирите тема</label>
                <input id="theme-name" type="text" class="custom-text form-control mt-2">


                <label for="work-date">Дата проведения</label>
                <input id="work-date" type="date" class="form-control mt-2">

                <input type="checkbox" id="big-check" class="mt-2">
                <label for="big-check" class="no-date-lable">Без даты</label>
            </div>

            <div class="col right-block">
                <p id="memberships">Участники</p>
                <div class="form-control mt-2 ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="memberships1">
                        <label class="form-check-label" for="memberships1">
                            Пример чекбоса
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="memberships2">
                        <label class="form-check-label" for="memberships2">
                            Пример чекбоса
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="memberships3">
                        <label class="form-check-label" for="memberships3">
                            Пример чекбоса
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary add-btn" value="Добавить">
            </div>
            
        </div>
        </div>



    </div>

    
</body>
</html>