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



function newexportaction(e, dt, button, config) {
  var self = this;
  var oldStart = dt.settings()[0]._iDisplayStart;
  dt.one('preXhr', function (e, s, data) {
      // Just this once, load all data from the server...
      data.start = 0;
      data.length = 2147483647;
      dt.one('preDraw', function (e, settings) {
          // Call the original action function
          if (button[0].className.indexOf('buttons-copy') >= 0) {
              $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-excel') >= 0) {
              $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                  $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                  $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-csv') >= 0) {
              $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                  $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                  $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
              $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                  $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                  $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-print') >= 0) {
              $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
          }
          dt.one('preXhr', function (e, s, data) {
              // DataTables thinks the first item displayed is index 0, but we're not drawing that.
              // Set the property to what it was before exporting.
              settings._iDisplayStart = oldStart;
              data.start = oldStart;
          });
          // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
          setTimeout(dt.ajax.reload, 0);
          // Prevent rendering of the full data to the DOM
          return false;
      });
  });
  // Requery the server with the new one-time export settings
  dt.ajax.reload();
};
