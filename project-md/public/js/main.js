/**
 * Created by Andre on 17-Oct-17.
 */
$( document ).ready(function() {

    navChange();

});


function navChange() {
    //var heroHeight = document.getElementById('myHero').clientHeight;


    $(window).scroll(function() {

        if ($(document).scrollTop() > 250) {
            $(".bg-dark").css("background-color", "#000000");
         /*   $(".navbar-default .navbar-nav > .active").css("color","#081F2C");
            $(".navbar-default .navbar-nav > .active").css("background-color","#007FA3");

            $(".navbar-default .navbar-nav > .active > a").css("color", "#ffffff");
            $(".navbar-default .navbar-nav > .active > a").css("background-color", "#081F2C");*/




            /*              $(".navbar-default .navbar-nav > li > a:hover").css("color","#ffffff");
             $(".navbar-default .navbar-nav > li > a:hover").css("background-color","#081F2C");

             $(".navbar-default .navbar-nav > li > a:focus").css("color","#ffffff");
             $(".navbar-default .navbar-nav > li > a:focus").css("background-color","#081F2C");*/

        } else {
            $(".bg-dark").css("background-color", "transparent");
           /* $(".navbar-default .navbar-nav > .active").css("color","#007FA3");
            $(".navbar-default .navbar-nav > .active").css("background-color","transparent");

            $(".navbar-default .navbar-nav > .active > a").css("color","#007FA3");
            $(".navbar-default .navbar-nav > .active > a").css("background-color","transparent");*/

            /*            $(".navbar-default .navbar-nav > li > a:hover").css("color", "#007FA3");
             $(".navbar-default .navbar-nav > li > a:hover").css("background-color", "#transparent");

             $(".navbar-default .navbar-nav > li > a:focus").css("color", "#007FA3");
             $(".navbar-default .navbar-nav > li > a:focus").css("background-color", "#transparent");*/


        }
    });
};