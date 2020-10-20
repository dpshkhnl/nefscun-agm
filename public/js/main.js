$('[data-toggle="collapse"]').on('click', function() {
	$navMenuCont = $($(this).data('target'));
	$navMenuCont.animate({
		'width': 'toggle'
	}, 350);
	$(".menu-overlay").fadeIn(500);
});
$(".menu-overlay").click(function(event) {
  $(".navbar-toggler").trigger("click");
  $(".menu-overlay").fadeOut(500);
});

$(window).on('load',function(){
    $('#icanPopup').modal('show');
});


$(function() {
  // ------------------------------------------------------- //
  // Multi Level dropdowns
  // ------------------------------------------------------ //
  $("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
    event.preventDefault();
    event.stopPropagation();

    $(this).siblings().toggleClass("show");


    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
    }
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });

  });
});
