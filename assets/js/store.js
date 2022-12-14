var addItemId = 0;
function addToCart(item) {
    addItemId += 1;
    var selectedItem = document.createElement('div');
    selectedItem.classList.add('cart');
    selectedItem.setAttribute('title', addItemId);
    var id = document.createElement('id');
    id.setAttribute('src', item.children[0].currentSrc);
    var cartItems = document.getElementById('title');
    selectedItem.append(id);
    cartItems.append(selectedItem);

}
var additemid = 0;
function addtoCart(item) {
    additemid += 1;
    var selecteditem = document.createElement('div');
    selecteditem.classList.add('cart');
    selecteditem.setAttribute('title', additemid);
    var id = document.createElement('id');
    id.setAttribute('src', item.children[0].currentSrc);
    var title = document.createElement('id');
    title.innerText = item.children[1].innerText;
    var label = document.createElement('id');
    label.innerText = item.children[2].children[0].innerText;
    var select = document.createElement('span');
    select.innerText = item.children[2].children[1].value;
    label.append(select);
    var delbtn = document.createElement('button');
    delbtn.innerText = 'Clear';
    delbtn.onclick = function () {
        selecteditem.remove();
    }
    var cartitems = document.getElementById('title');
    selecteditem.append(img);
    selecteditem.append(title);
    selecteditem.append(label);
    selecteditem.append(delbtn);
    cartitems.append(selecteditem);

}