require('./bootstrap');

// loading page
$(window).load(function() {
    $(".loader").fadeOut(1200);
});

// accordion 
var accordion = document.getElementsByClassName("__accordion");
var panel = document.getElementsByClassName("__panel");
var i;

for (i = 0; i < accordion.length; i++) {
    accordion[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            panel.classList.toggle("activePanel");
        } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            panel.classList.toggle("activePanel");
        }

    });

}

// short-schedule
function test() {
    $.ajax({
        url: "public/fun_schedule.php",
        success: function(result) {
            $("div").text(result);
        }
    })
}

// function test() {
//     $.ajax({
//         url: "funcion.php",
//         success: function(result) {
//             $("div").text(result);
//         }
//     })
// }