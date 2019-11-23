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
            phpDoc = './logics/WorkerLogin.php';
        break;
        case 1:
            $("#neadmin-login").css('display', 'block');
            phpDoc = './logics/StudentLogin.php';
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
        if (msg == "") {
            mesElement.textContent   = 'Пользователь не найден';
            mesElement.className     = 'error';
            mesElement.style.display = 'table-cell';
            input.className    = 'invalid animated shake';
        }else{
            $(location).attr('href',"main.php");
        }
      }
    });
});  




