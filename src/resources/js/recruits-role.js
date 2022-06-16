// let select = document.querySelector('[name="recruits_role"]');

// select.onchange = event => {
//   console.log(select.selectedIndex);
// }

window.addEventListener("DOMContentLoaded", function () {
    var selects = document.querySelector("select[name=recruits_role]");
    selects.addEventListener("change", function () {
        var options = document.querySelectorAll(
            "select[name=recruits_role] option"
        );
        for (var option of options) {
            if (option.selected) {
                console.log(option.value);
            }
        }
    });
});
