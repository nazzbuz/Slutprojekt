// Open and close sidenav
// Open and close sidenav
function openNav() {
    $("#mySidenav").css("width", "100%");
  }
  
  function closeNav() {
    $("#mySidenav").css("width", "0");
  }
  
  // Handle modal dialog
  var modal = $("#modalDialog");
  var btn = $("#mbtn");
  var span = $(".close");
  
  $(document).ready(function() {
    btn.on("click", function() {
      modal.fadeIn();
    });
  
    span.on("click", function() {
      modal.fadeOut();
    });
  
    $("body").on("click", function(e) {
      if ($(e.target).hasClass("modal")) {
        modal.fadeOut();
      }
    });
  });
  
  $(document).ready(function() {
    $("#contactFrm").submit(function(e) {
      e.preventDefault();
      $(".modal-body").css("opacity", "0.5");
      $(".btn").prop("disabled", true);
      
    });
  });
  
  