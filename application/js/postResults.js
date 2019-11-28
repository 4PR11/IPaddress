var data = new Array(); // массив с данными
var now_num_task = 1; // текущее задание 

function NextTask(){
	getData();
	var task_request = new XMLHttpRequest(); // делаем аякс запрос
	task_request.open('POST', './logics/task sender.php', true);
	task_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	task_request.addEventListener("readystatechange", () => {
    if (task_request.readyState === 4 && task_request.status === 200) {
    	updateTask(task_request.response); 
	}
	});
	task_request.send("now_num_task="+now_num_task);
	now_num_task++;
	if (now_num_task>TASKS_NUM) {
		pushResult();
	}
}

function updateTask(new_trask){
	var task = document.getElementById('task');
	task.innerHTML = new_trask;
	var ip_inputs =  document.getElementsByClassName('ip');
	for (var index = 0; index < ip_inputs.length; ++index) {
   		ip_inputs[index].value = "";
	}
}

function getData(){
	var answers = {
		'netAddress': document.getElementsByName('netAddress')[0].value,
		'addressFirstHost': document.getElementsByName('addressFirstHost')[0].value,
		'addressLastHost': document.getElementsByName('addressLastHost')[0].value,
		'broadcastAddress': document.getElementsByName('broadcastAddress')[0].value
	};
	if (now_num_task > data.length){
		data.push(answers);
	} else {
		data[now_num_task] = answers;
	}
}


function pushResult(){
	var xhr = new XMLHttpRequest();
	var js ="dat="+JSON.stringify(data);
	xhr.responseType =	"json";
	xhr.open('POST', './logics/task inspector.php', true);
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.addEventListener("readystatechange", () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
   	document.write(xhr.response);
	//console.log(ansvers.task1.netAdress);   
	}
	});
	xhr.send(js);
}

