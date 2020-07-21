function animaScroll(){
    var topo = $(document).scrollTop();
    var offset = $(window).height() * 3/4;
    $(".index-warren").each(function(){
      var itemTopo = $(this).offset().top;
      if(topo > itemTopo - offset){
        $(this).addClass("index-warren-active");  
      }else{
        $(this).removeClass("index-warren-active");
      }
      
    });
  }

  $(document).ready(function(){
    animaScroll();

    $("#programs").mouseover(function(){
        $("#menu-dropdown").addClass("menu-dropdown-show");
    });
    $("#programs").mouseleave(function(){
        $("#menu-dropdown").removeClass("menu-dropdown-show");
    });
  
    $(document).scroll(function(){
      animaScroll();
    });

  });

  