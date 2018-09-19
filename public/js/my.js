$(".menu1").next('ul').toggle();

$(".menu1").click(function(event) {
	$(this).next("ul").toggle(500);
});


// Go to top
window.onscroll = function() {scrollFunction()};
	function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("gototop").style.display = "block";
    } else {
        document.getElementById("gototop").style.display = "none";
    }
}

$("#gototop").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
});
//  -/- Go to top