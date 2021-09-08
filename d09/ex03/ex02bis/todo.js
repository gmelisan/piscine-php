$(document).ready(function() {
	if (document.cookie) {
		cookie = JSON.parse(document.cookie);
		for (let i = 0; i < cookie.length; i++) {
			addItem(cookie[i]);
		}
	}
	$("#new").click(newItem);
});

function addItem(str) {
	var item = $('<div class="item">' + str + '</div>');
	item.click(deleteItem);
	$("#ft_list").prepend(item);
	updateCookie();
}

function newItem() {
	str = prompt("New todo:");
	if (!str.trim())
		return false;	
	addItem(str); 
}

function deleteItem() {
	if (!confirm("Delete?"))
		return false;
	$(this).remove();
	updateCookie();
	return true;
}

function updateCookie() {
	var arr = [];
	console.log($("#ft_list").children());
	$("#ft_list").children().each(function(i) {
		arr.unshift($(this).text());
	});
	document.cookie = JSON.stringify(arr);	
}