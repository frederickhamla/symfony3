/* Set the width of the side navigation to 250px and the left margin of the page content to 250px and add a black background color to body */
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
