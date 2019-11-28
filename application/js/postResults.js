var data = new Array(); // массив с данными
var now_num_task = 1; // текущее задание 

function NextTask(){
	getData();
	var task_request = new XMLHttpRequest(); // делаем аякс запрос
	task_request.open('POST', './task/'+(now_num_task+1), true);
	task_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	task_request.addEventListener("readystatechange", () => {
    if (task_request.readyState === 4 && task_request.status === 200) {
    	if (now_num_task>TASKS_NUM) {
			pushResult();
		} else {
			updateTask(task_request.response); 
		}
	}
	});
	task_request.send();
	now_num_task++;
	
}

function updateTask(new_trask){
	$('#task').html(new_trask);
	$('.ip').map((id, input) => input.value = null);
}

function getData(){
	var answers = {
		'netAddress': "",
		'addressFirstHost': "",
		'addressLastHost': "",
		'broadcastAddress': ""
	};
	Object.keys(answers).map(key => ($('input[name*='+key+']').map((id, item) => answers[key]+=item.value+(id<3 ? '.' : ''))));
	if (now_num_task > data.length){
		data.push(answers);
	} else {
		data[now_num_task] = answers;
	}
}


function pushResult(){
	var xhr = new XMLHttpRequest();
	var js ="answers="+JSON.stringify(data);
	xhr.responseType =	"json";
	xhr.open('POST', './inspector', true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.addEventListener("readystatechange", () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
   	 	window.location.replace("/");
	}
	});
	xhr.send(js);
}

