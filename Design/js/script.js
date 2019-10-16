var el = document.getElementById('cover_main');
var bd = document.getElementById('cover_body');
var input = document.getElementById('code-field');
var form = document.getElementById('form');
// var mesElement = document.createElement('div');
var mesElement = document.getElementById('notify');
// var logo = document.getElementById('Logo_bar');
var w = 0;

// mesElement.id = 'notify';
// mesElement.style.display = 'none';
// form.appendChild(mesElement);

el.style.width = innerWidth + 'px';
el.style.height = innerHeight + 'px';
// logo.style.top = innerHeight/10 + 'px';
// w = innerWidth/2 - 242;
// logo.style.left = w + 'px';
var X_ = el.style.width/2;
var Y_ = el.style.width/2;

document.addEventListener("DOMContentLoaded", function(event)
{
    window.onresize = function() {
        resize_info();
    };
});

function resize_info()
{
  el.style.width = innerWidth + 'px';
	el.style.height = innerHeight + 'px';
	bd.style.width = innerWidth + 'px';
	bd.style.height = innerHeight + 'px';
	// logo.style.top = innerHeight/10 + 'px';
	// w = (innerWidth/2 - 242);
	// logo.style.left = w + 'px';
}

input.addEventListener('invalid', function(event){
	event.preventDefault();
    if ( !event.target.validity.valid ) {
        mesElement.textContent   = 'Код введен неверно!';
        mesElement.className     = 'error';
        mesElement.style.display = 'table-cell';
        input.className    = 'invalid animated shake';
    }
});







// (function(){
//   var body = document.body,
//       startX = -100,
//       startY = -100,
//       w = document.documentElement.offsetWidth,
//       h = document.documentElement.offsetHeight;

// 	body.addEventListener('mousemove', function(evt){
//     var posX = Math.round(evt.clientX / w * startX)
//     var posY = Math.round(evt.clientY / h * startY)
//     body.style.backgroundPosition = posX + 'px ' + posY + 'px'
//   })
// })()





