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
                <a class="nav-item nav-link active" id="nav-curWorks-tab" data-toggle="tab" href="#nav-curWorks" role="tab" aria-selected="true">Текущие работы</a>
                <a class="nav-item nav-link" id="nav-notes-tab" data-toggle="tab" href="#nav-notes" role="tab"  aria-selected="false" >Успеваемость</a>
             </div>
        </nav>
        <div class="separator"></div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-curWorks" role="tabpanel" aria-labelledby="nav-curWorks-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-2"></div>
                            <div class="col-8">
                                <form id="ChoiseWork">
                                    <!--<label for="subject-select">Выберите предмет</label>
                                    <select id="subject-select" name="subject-select" class="custom-select">
                                        <option value="-2" disabled selected="">Выберите предмет</option>
                                        <?php
                                    //      include_once("./templates/load_Subjects.php");     
                                        ?>
                                    </select>-->

                                    <label for="work-id">Выберете работу</label>
                                    <select id="work-select" name="work-select" class="custom-select">
                                        <script type="text/javascript">loadWorks();</script>
                                    </select>

                                    <!--<label for="mode-id">Выберете режим</label>
                                    <select class="custom-select" name="" id="mode-id">
                                    </select>-->

                                    <input class="btn btn-primary add-btn" type="submit" value="Начать">
                                </form>    
                            </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-notes" role="tabpanel" aria-labelledby="nav-notes-tab">
                <div class="container">
                    <div class="row">
                        <div class="col-2"></div>
                            <div class="col-8">
                                <?php Include("./templates/NotesTable.php"); ?>          
                            </div>
                        <div class="col-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>    
</body>
</html>