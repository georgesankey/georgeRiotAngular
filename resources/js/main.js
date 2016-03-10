
// This section is for the dashboard interaction
$(document).ready(function() {
   
   $("#menu-btn").on("click", function() {
       toggleMenu();
   });
   
});

var toggleMenu = function() {
    if($("#sidebar").hasClass("hide")) {
        $("#sidebar").removeClass("hide");
        $("#page-wrapper").css("margin-left", "");
    } else {
        $("#sidebar").addClass("hide");
        $("#page-wrapper").css("margin-left", "0px");
    }
};

// Alerts at top
var alertLog = function(text, type, duration) {

    // Set duration
    if(duration) {
        duration = duration*1000;
    } else {
        duration = 3000;
    }

    // Set text
    $("#alert-banner-text").text(text);

    // Set type
    if(type) {
        if(type=="success") {
            $("#alert-banner-text").attr("class", "alert alert-success");
        } else if(type=="info") {
            $("#alert-banner-text").attr("class", "alert alert-info");
        } else if(type=="warning") {
            $("#alert-banner-text").attr("class", "alert alert-warning");
        } else if(type=="danger") {
            $("#alert-banner-text").attr("class", "alert alert-danger");
        }
    } else {
        $("#alert-banner-text").attr("class", "alert alert-info");
    }

    $(".alert-banner").slideDown();
    window.setTimeout(function() {$(".alert-banner").slideUp();}, duration);
};