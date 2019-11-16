var input = document.getElementById('code-field');
var form = document.getElementById('form');
var mesElement = document.getElementById('notify');
var w = 0;
var phpDoc = 'Login.php';


function logFrm(param){
    $("div.btn-cover").css('display', 'none');
    switch (param){
        case 0:
            $("#admin-login").css('display', 'block');
            $("#form-controllers").css('display', 'block');
            phpDoc = 'LoginW.php';
        break;
        case 1:
            $("#neadmin-login").css('display', 'block');
            phpDoc = 'Login.php';
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


$("#formLogin").submit(
    function(event){
    event.preventDefault();
    var $form = $(this);
    var $inputs = $form.find("input, select, button, textarea");
    var serializedData = $form.serialize();
    var request = $.ajax({
        url: phpDoc,
        type: "post",
        data: serializedData,
        success:
        function(msg){
        if (msg == "") {
            mesElement.textContent   = 'Пользователь не найден';
            mesElement.className    = 'alert alert-danger';
            input.className    = 'invalid animated shake';
        }else{
           $(location).attr('href',"Quest.php");
        }
      }
    });
}); 




