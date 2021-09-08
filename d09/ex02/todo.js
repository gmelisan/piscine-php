window.onload = function() {
    if (document.cookie) {
        cookie = JSON.parse(document.cookie);
        //console.log(cookie);
        for (let i = 0; i < cookie.length; i++) {
            newItem(cookie[i]);
        }
    }
}

function newItem(str = false) {
    if (!str) {
        str = prompt("New todo:");
        if (!str.trim())
           return false;
    }
    var item = document.createElement("div");
    item.className = "item";
    item.innerText = str;
    item.onclick = deleteItem;
    ft_list = document.getElementById("ft_list");
    ft_list.insertBefore(item, ft_list.firstChild);
    updateCookie();
    return true;    
}

function deleteItem() {
    if (!confirm("Delete?"))
        return false;
    this.parentNode.removeChild(this);
    updateCookie();
    return true;
}

function updateCookie() {
    var items = document.getElementById("ft_list").children;
    var arr = [];
    for (let i = 0; i < items.length; i++) {
        arr.unshift(items[i].innerText);
    }
    document.cookie = JSON.stringify(arr);    
}