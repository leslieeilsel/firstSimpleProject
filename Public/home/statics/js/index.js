window.onload = function() {
    var NavLi = getClassName("NaVLi", "li"),
    Frontbox = getClassName("Front-box", "div");
    for (i = 0; i < NavLi.length; i++) {
        NavLi[i].onmouseover = function() {
            _show(this)
        };
        NavLi[i].onmouseout = function() {
            _hidden(this)
        }
    }
    function _show(obj) {
        for (i = 0; i < Frontbox.length; i++) {
            if (obj == NavLi[i]) {
                Frontbox[i].style.display = "block"
            }
        }
    }
    function _hidden(obj) {
        for (i = 0; i < Frontbox.length; i++) {
            if (obj == NavLi[i]) {
                Frontbox[i].onmouseover = function() {
                    this.style.display = "block"
                };
                Frontbox[i].onmouseout = function() {
                    this.style.display = "none"
                };
                Frontbox[i].style.display = "none"
            }
        }
    }
    function getClassName(classStr, tagName) {
        if (document.getElementsByClassName) {
            return document.getElementsByClassName(classStr)
        } else {
            var nodes = document.getElementsByTagName(tagName),
            ret = [];
            for (i = 0; i < nodes.length; i++) {
                if (hasClass(nodes[i], classStr)) {
                    ret.push(nodes[i])
                }
            }
            return ret
        }
    }
    function hasClass(tagStr, classStr) {
        var arr = tagStr.className.split(/\s+/);
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] == classStr) {
                return true
            }
        }
        return false
    }
};

function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone","iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
}