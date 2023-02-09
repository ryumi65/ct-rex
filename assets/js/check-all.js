function cbCheckAll(obj, elementName, tableName, value) {
    let instate = (obj.checked);
    let cbs = document.getElementsByName(elementName);
    let table = document.getElementById(tableName);
    let radios = table.querySelectorAll('input[type="radio"]');

    for (let i = 0; i < cbs.length; i++) {
        cbs[i].checked = false;
    }

    for (let i = 0; i < radios.length; i++) {
        if (radios[i].value == value) radios[i].checked = true;
    }

    if (instate) obj.checked = true;
}