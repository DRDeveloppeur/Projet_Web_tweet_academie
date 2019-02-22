function drop() {
    "use strict";
    document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function (event) {
    "use strict";
    if (!event.target.matches(".dropbtn")) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        var openDropdown = dropdowns[i];
        for (i = 0; i < dropdowns.length; i += 1) {
            if (openDropdown.classList.contains("show")) {
                openDropdown.classList.remove("show");
            }
        }
    }
};
