$(document).ready(function(){
    $('.skillbar').each(function(){
        $(this).find('.skillbar-bar').animate({
            width:$(this).attr('data-percent')
        },1800);
    });
});;/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
function openNav() {
    $("#navbar").css("width", "150px");
    $(".main").css("marginLeft", "150px");
    $(".fa-bars").fadeOut("slow");
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0, and the background color of body to white */
function closeNav() {
    $("#navbar").css("width", "0");
    $(".main").css("marginLeft", "0");
    $(".fa-bars").fadeIn("slow");
}
;// http://codepen.io/chriscoyier/pen/dpBMVP/
$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 800);
            return false;
        }
    }
});
;setTimeout(function() {
    $('.flash-success').fadeOut('fast');
}, 3000);
