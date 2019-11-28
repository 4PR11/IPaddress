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
                    <li class="nav-item"><a id='kartochka' class='nav-link text-white' href='/'>На главную</a></li>
                    </ul>
                    <span class="name-of"><?php render_name(); ?></span>
                    <?php log_out_btn(); ?>
                </div>
            </div>
        </nav> 
    </div>
    <div class="container">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-worksAdd-tab" data-toggle="tab" href="#nav-worksAdd" role="tab" aria-selected="true">Создание работ</a>
                <a class="nav-item nav-link" id="nav-SubAdd-tab" data-toggle="tab" href="#nav-SubAdd" role="tab"  aria-selected="false" >Добавление предметов</a>
                <a class="nav-item nav-link" id="nav-StuAdd-tab" data-toggle="tab" href="#nav-StuAdd" role="tab"  aria-selected="false">Добавление студентов</a>
                <a class="nav-item nav-link" id="nav-GrAdd-tab" data-toggle="tab" href="#nav-GrAdd" role="tab"  aria-selected="false">Создание группы</a>
                <a class="nav-item nav-link" id="nav-CurWorks-tab" data-toggle="tab" href="#nav-CurWorks" role="tab"  aria-selected="false">Назначенные КР</a>

             </div>
        </nav>
        <div class="separator"></div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-worksAdd" role="tabpanel" aria-labelledby="nav-worksAdd-tab">
                <form class="row row-margin-0" id="formWorkAddition">
                    <div class="col">
                        <label for="subject-select">Выберите предмет</label>
                        <select id="subject-select" name="subject-select" class="custom-select">
                            <option value="-2" disabled selected="">Выберите предмет</option>
                            <?php
                                include_once("./templates/load_Subjects.php");     
                            ?>
                        </select>

                        <label for="modul-select">Выбирите модуль</label>
                        <select id="modul-select" name="modul-selects" class="custom-select">
                            <p class="font-weight-light">Light text.</p>
                            <option value="-2" disabled selected="">Выберите модуль</option>
                            <?php
                                include_once("./templates/load_Moduls.php");     
                            ?>
                        </select>

                        <label for="theme-name">Тема работы</label>
                        <input id="theme-name" name="theme-name" type="text" class="custom-text form-control mt-2">


                        <label for="work-date">Дата проведения</label>
                        <input id="work-date" name="work-date" type="date" value="" class="form-control mt-2">

                        <input type="checkbox" id="big-check" class="mt-2">
                        <label for="big-check" class="no-date-lable">Без даты</label>
                    </div>

                    <div class="col right-block"> 
                        <p id="memberships">Участники</p>
                        <div class="form-control mt-2 scroll">
                            <div class="form-check">
                                <?php
                                    include_once("./templates/load_Students.php");     
                                ?>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary add-btn" value="Добавить">
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="nav-SubAdd" role="tabpanel" aria-labelledby="nav-SubAdd-tab">
                <div class="container">
                    <form id="SubjectAddition">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <label for="subject-select">Наименование предмета</label>
                                <input id="subject-name" name="subject-name" type="text" class="custom-text form-control mt-2">

                                <input type="submit" class="btn btn-primary add-btn" value="Добавить">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-GrAdd" role="tabpanel" aria-labelledby="nav-GrAdd-tab">
                <div class="container">
                    <form id="GroupAddition">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <label for="subject-select">Наименование группы</label>
                                <input id="group-name" name="group-name" type="text" class="custom-text form-control mt-2">

                                <input type="submit" class="btn btn-primary add-btn" value="Добавить">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-StuAdd" role="tabpanel" aria-labelledby="nav-StuAdd-tab">
                <div class="container">
                    <form id="StudentAddition">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-8">
                                <label for="subject-select">ФИО студента</label>
                                <input id="student-name" name="student-name" type="text" class="custom-text form-control mt-2">
                                <label for="subject-select">Группа студента</label>
                                <select name="group" id="group" class="form-control mt-2">
                                    <option value="-2" selected>Выберите группу...</option>
                                        <?php
                                            include_once("./templates/load_grups.php");     
                                        ?>
                                </select>
                                <label for="subject-select">Номер студенческого билета</label>
                                <input id="code-name" name="code" type="text" class="custom-text form-control mt-2">

                                <input type="submit" class="btn btn-primary add-btn" value="Добавить">
                            </div>
                            <div class="col-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-CurWorks" role="tabpanel" >
                <!--текущие работы-->
                <?php Include("./templates/CurWorksTable.php"); ?>
                <!--<script type="text/javascript">setPagination("#curWorksTable");</script>-->
            </div>
        </div>
        </div>
    </div>
    <?php
        teacher_render_footer();
    ?>
    <script src="js/script.js"></script>    
</body>
</html>