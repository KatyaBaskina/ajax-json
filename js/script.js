var goodsContainer;
var get_page = 2;
var get_perpage = 4;
var htmlString = '';
document.addEventListener('DOMContentLoaded', function(){

	goodsContainer = document.getElementById('container');
	var params = getParams(get_page, get_perpage);
	ajaxGet(params);
});

document.getElementById('btn').onclick = function(){
	addElement(htmlString);
	htmlString = '';
	var params = getParams(get_page, get_perpage);
	ajaxGet(params);
}

var ajaxGet = function(params){
	var request = new XMLHttpRequest();

	request.onreadystatechange = function(){
		if(request.readyState == 4 && request.status == 200){
			var getData = JSON.parse(request.responseText);
			renderHTML(getData);
			get_page++;
			if(getData['entities'][0] == undefined){
				document.getElementById('btn').style.display = 'none';
			}
		}
	}

	request.open('GET', 'back_end/list.php'+'?'+params);
	request.send();
}

function renderHTML(data){

	for (i = 0; i < data['entities'].length; i++){
		var discountCost = (data['entities'][i].discountCost) ? data['entities'][i].discountCost : data['entities'][i].cost;
		discountCost = '$' + discountCost.toFixed(2);
		var sale = '';
		var new_ = '';
		var redCost = '';
		if(data['entities'][i].discountCost){
			redCost = '<span class="red_cost">'+ '$' + (data['entities'][i].cost).toFixed(2) + '</span>';
			sale = '<div class="sale"><span>Sale</span></div>'
		}
		if(data['entities'][i].new)
			new_= '<div class="new"><span>new</span></div>'
		htmlString += '<div class="item">' +
					  		'<div class="img">' +
		 			  			'<img src=	\'' + data['entities'][i].img + '\' ' + 'alt=\'' + data['entities'][i].title + '\'>' + 
		 			  		'</div>' +
		 			  		'<h1>' + data['entities'][i].title + '</h1>' +
		 			  		'<p>' + data['entities'][i].description + '</p>' +
		 			  		'<span class="cost">' + discountCost + '</span>' +
		 			  		redCost +
		 			  		sale + new_ +
		 			  		'<div class="btns">'+
		 			  			'<a href="#" class="btn add">' + '<span>add to cart</span>' + '</a>' +
		 			  			'<a href="#" class="btn view">' + '<span>view</span>' + '</a>' +
		 			  		'</div>' +
		 			  '</div>';
	}
}

function getParams(page, perPage){
	var params = 'page=' + get_page + '&' + 'per_page=' + get_perpage;
	return params;
}

addElement = function(htmlString){
	var newElement = document.createElement('div');
	newElement.classList.add('items');
	newElement.innerHTML= htmlString;
	newElement.style.opacity = 0;
	newElement.style.transition = 'opacity 2s';

	goodsContainer.appendChild(newElement);
	window.setTimeout(function(){
		newElement.style.opacity = 1;
	}, 100);

}
