
function setStyle(name) {
    var styl;
    for (var i = 0; (styl = document.getElementsByTagName("link")[i]); i++) { // 
        if (styl.getAttribute("title")) { 
            styl.disabled = true; // Wylaczenie stylu
            if (styl.getAttribute("title") == name) styl.disabled = false; 
        }
    }
}


function getStyle() {
    var styl;
    for (var i = 0; (styl = document.getElementsByTagName("link")[i]); i++) { // 
        if (styl.getAttribute("title") && !styl.disabled) return styl.getAttribute("title"); 
    }
    return null;
}


function createCookie(name, styl, days) {
    if (days) { //
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000)); 
        var expires = "; expires=" + date.toGMTString(); 
    }
    else expires = "";
    document.cookie = name + "=" + styl + expires + "; path=/"; 
}


function readCookie(name) {
    var name = name + "="; 
    var cookieArray = document.cookie.split(';'); 
    for(var i = 0; i < cookieArray.length; i++) { 
        var c = cookieArray[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length); 
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length); 
    }
    return null;
}


window.onload = function(e) {
    var styleCookie = readCookie("style"); 
    var styleTitle = styleCookie ? styleCookie : getStyle(); 
    setStyle(styleTitle); 
}


window.onunload = function(e) {
    var styleTitle = getStyle(); 
    createCookie("style", styleTitle, 15); 
}


var styleCookie = readCookie("style");
var styleTitle = styleCookie ? styleCookie : getStyle();
setStyle(styleTitle);
