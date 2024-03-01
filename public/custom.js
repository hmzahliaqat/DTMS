// Include jQuery by dynamically creating a script element
var script = document.createElement("script");
script.src = "https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"; // Update the path to your local jQuery file
script.type = "text/javascript";
script.onload = function () {

    // Nav item show/hide toggle
    $("#addStudentBtn").click(function () {
        $("#p").toggle();
    });










};
document.head.appendChild(script);
