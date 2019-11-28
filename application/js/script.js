var input = document.getElementById('code-field');
var form = document.getElementById('form');
var mesElement = document.getElementById('notify');
var w = 0;
var phpDoc = './logics/StudentLogin.php';


function logFrm(param){
    $("div.btn-cover").css('display', 'none');
    switch (param){
        case 0:
            $("#admin-login").css('display', 'block');
            $("#form-controllers").css('display', 'block');
            phpDoc = '/WorkerSignIn';
        break;
        case 1:
            $("#neadmin-login").css('display', 'block');
            phpDoc = '/StudentSignIn';
            $("#form-controllers").css('display', 'block');
        break;
        case 2:
            $("div.btn-cover").css('display', 'block');
            $("#admin-login").css('display', 'none');
            $("#neadmin-login").css('display', 'none');
            $("#form-controllers").css('display', 'none');
            mesElement.style.display = 'none';
            $("input.txt-field").val('');
        break;
    }
}

function GetStuList(wr_id){
    $.ajax({
        url: '/GetStudentList',
        type: "post",
        data: { id: wr_id },
        success:function(msg){
            if (msg == ""){
                alert("Ни одного участника работы");
            } else {
                alert(msg);
            }
      }
    });
}

function DeleteWork(wr_id){
    $.ajax({
        url: '/DeleteWork',
        type: "post",
        data: { id: wr_id },
        success:function(msg){
            if (msg == "success"){
                alert("работа удалена успешно");
                window.location.reload();
            } else {
                alert("проблемы с удалением");
            }     
      }
    }); 
}

function logOut(){
     $.ajax({
        url: '/LogOut',
        type: "post",
        data: "",
        success:function(msg){
            if (msg == "succes_status") {
                window.location.replace("/login");  
            }
        }
    });
}

function loadWorks(){
    $.ajax({
        url: '/LoadWorks',
        type: "post",
        data: "",
        success:function(msg){
        $('#work-select').html(msg);
      }
    });
}

function GetTheme(){
    $.ajax({
        url: '/LoadTheme',
        type: "post",
        data: "",
        success:function(msg){
        $('#theme').html(msg);
      }
    });
}

var request;
$("#formLogin").submit(function(event){
    event.preventDefault();
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: phpDoc,
        type: "post",
        data: serializedData,
        success:function(msg){
        if (msg == "error") {
            mesElement.textContent   = 'Пользователь не найден';
            mesElement.className     = 'alert alert-danger mt-3';
        } else{
            window.location.replace("/");
        }
      }
    });
});

function CheckWork(){
    if (document.getElementById('subject-select').value == "-2"){
        alert("Предмет не выбран!");
        return false;
    }
    if (document.getElementById('modul-select').value == "-2"){
        alert("модуль не выбран!");
        return false;
    }
    if (document.getElementById('theme-name').value == ""){
        alert("тема не выбрана!");
        return false;
    }
    if ((document.getElementById('work-date').value == "") && ($("#big-check").prop('checked') == false)){
        alert("дата не выбрана!");
        return false;
    }
    return true;
}  

$("#formWorkAddition").submit(function(event){
    event.preventDefault();
    if (CheckWork() == false) return;
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, label, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: "/InsertWork",
        type: "post",
        data: serializedData,
        success:function(msg){
        if (msg == "success_status") {
            alert("данные в базу загружены успешно");
            window.location.reload();
        }else{
            alert(msg);
            alert("небольшие проблемочки...");
        }
      }
    });
});

function CheckSubject(){
    if (document.getElementById('subject-name').value == ""){
        alert("Не указано название предмета!");
        return false;
    }
    return true;
}

$("#SubjectAddition").submit(function(event){
    event.preventDefault();
    if (CheckSubject() == false) return;
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: "./logics/InsertSubject.php",
        type: "post",
        data: serializedData,
        success:function(msg){
        if (msg == "error_is_alredy") {
            alert("Такой предмет уже существует");
        }

        if (msg == "success_status") {
            alert("Данные в базу добавлены успешно");
            window.location.reload();
        }

        if (msg == "") {
            alert("Проблемы с добавлением в информации в базу");
        }
      }
    });
});

function CheckGroup(){
    if (document.getElementById('group-name').value == ""){
        alert("Не указано название группы!");
        return false;
    }
    return true;
}

$("#GroupAddition").submit(function(event){
    event.preventDefault();
    if (CheckGroup() == false) return;
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: "./logics/InsertGroup.php",
        type: "post",
        data: serializedData,
        success:function(msg){
        if (msg == "error_is_alredy") {
            alert("Такая группа уже существует");
        }

        if (msg == "success_status") {
            alert("Данные в базу добавлены успешно");
            window.location.reload();
        }

        if (msg == "") {
            alert("Проблемы с добавлением в информации в базу");
        }
      }
    });
});

function CheckStudent(){
    if (document.getElementById('student-name').value == ""){
        alert("Не указано ФИО студента!");
        return false;
    }
    if (document.getElementById('group').value == "-2"){
        alert("группа не выбрана!");
        return false;
    }
    if (document.getElementById('code-name').value == ""){
        alert("Не указан номер студенческого билета!");
        return false;
    }
    return true;
}

$("#StudentAddition").submit(function(event){
    event.preventDefault();
    if (CheckStudent() == false) return;
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: "./logics/InsertStudent.php",
        type: "post",
        data: serializedData,
        success:function(msg){
        if (msg == "error_is_alredy") {
            alert("Указан уже существующий номер студенческого билета!");
        }

        if (msg == "success_status") {
            alert("Данные в базу добавлены успешно");
            window.location.reload();
        }

        if (msg == "") {
            alert("Проблемы с добавлением в информации в базу");
        }
      }
    });
});

function CheckChoisedWork(){
    if (document.getElementById('work-select').value == "-2"){
        alert("работа не выбрана!");
        return false;
    }
    return true;
}

$("#ChoiseWork").submit(function(event){
    event.preventDefault();
    if (CheckChoisedWork() == false) return;
    if (request) request.abort();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    request = $.ajax({
        url: "/SetWork",
        type: "post",
        data: serializedData,
        success:function(msg){
            window.location.replace("/task");
        }
    });
});