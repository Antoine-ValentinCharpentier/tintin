var content = document.querySelector('#menu'); 
var sidebarBody = document.querySelector('#sidebarbody'); 
var button = document.querySelector('#sidebarbutton'); 
var overlay = document.querySelector('#overlay'); 
var activatedClass = 'sidebar-activated'; 

sidebarBody.innerHTML = content.innerHTML;			

button.addEventListener('click', function(e) { 
	e.preventDefault(); 

	this.parentNode.classList.add(activatedClass); 
});

/* quitter le menu déroulant a partir de la touche échape*/
/*button.addEventListener('keydown', function(e) {
	if (this.parentNode.classList.contains(activatedClass)) //vérifier si ses parents ont la classe activé du click pour limiter tout problème dans le futur
	{
		if (e.repeat === false && e.which === 27) //on regarde la touche sélectioner
			this.parentNode.classList.remove(activatedClass); //on lui retire la sidebar+overlay
	}
});*/


overlay.addEventListener('click', function(e) {
	e.preventDefault(); 

	this.parentNode.classList.remove(activatedClass); 
});


$( ".indextitlename5" ).css("visibility", "hidden");


$( ".image-section2" ).css("visibility", "hidden");


$(window).on("scroll", function() {
    if($(window).scrollTop()) {
        $('header').addClass('scroll');
        
        if ($(this).scrollTop()+1000 > $('.citation').offset().top) $( ".citation").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indextitlename1').offset().top) $( ".indextitlename1").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indexpresentation1').offset().top) $( ".indexpresentation1").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indextitlename2').offset().top) $( ".indextitlename2").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indexpresentation2').offset().top ) $( ".indexpresentation2").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indexiframe').offset().top ) $( ".indexiframe").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indextitlename3').offset().top ) $( ".indextitlename3").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indexpresentation3').offset().top ) $( ".indexpresentation3").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.image-section3').offset().top ) $( ".image-section3").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indextitlename4').offset().top ) $( ".indextitlename4").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.image-section').offset().top ) $( ".image-section").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.indextitlename5').offset().top ) $( ".indextitlename5").css("visibility", "visible").animate({opacity: 1.0}, 2000)
        if ($(this).scrollTop()+1000 > $('.image-section2').offset().top ) $( ".image-section2").css("visibility", "visible").animate({opacity: 1.0}, 2000)
    }
	else {
        console.log('foo');
        $('header').removeClass('scroll');
    }
})