( function($) {
  $ = jQuery;
  function getSubmenuListClass(mainMenuItemClass)
  {
    return $('.' + 'sub' + $(mainMenuItemClass).attr("class").split(/\s+/)[1]);
  }

  function hlTextToggle(highlight, textSpan)
  {
    if(highlight)
    {
      textSpan.css("font-weight", "700");
    }
    else
    {
      textSpan.css("font-weight", "500");
    }
  }

  function getMaxMenuItemCount()
  {
    var count = 0;
    var subMenuLengths = [];
    $('.mainMenuItem').each(function()
    {
      count++;
      subMenuLengths.push(getSubmenuListClass($(this)).children().length);
    });
    count += Math.max.apply(Math, subMenuLengths);
    return count;
  }

  // ---------------------------------------------------------------------
  var menuItemHeight = $('.mainMenuList').height()/getMaxMenuItemCount();
  $('.mainMenuItem').height(menuItemHeight);
  $('.subMenuItem').height(menuItemHeight);
  selectorIndent = (menuItemHeight-10)/4; // 10 is the height of the arrow

  $('.mainMenuItem').click(function()
  {
    var currMMI = $(this);
    var currSML = getSubmenuListClass(currMMI);
    var currMLB = currMMI.find('.mainLineBox');
    var currMOLB = currMMI.find('.mainOpenLineBox');

    if(currMMI.hasClass("clicked"))
    {
      currMMI.removeClass("clicked");
      if (currSML.length !== 0) 
      {
        currSML.slideUp(300);
        currMLB.show();
        currMOLB.hide();
      }

      // move selectorArrow
      topL = currMMI.offset().top + selectorIndent;
      $('#selector').animate({ top: topL}, 200);
    }
    else // if the MMI was not clicked
    {
      var prevSMLheight = 0;
      var prevSMLisAbove = false; 
      $('.mainMenuItem').each(function() // close all other MMI
      {
        var iterMMI = $(this);
        if(iterMMI.hasClass("clicked"))
        {
          var currSML = getSubmenuListClass(iterMMI);
          var currMLB = iterMMI.find('.mainLineBox');
          var currMOLB = iterMMI.find('.mainOpenLineBox');
          iterMMI.removeClass("clicked");
          prevSMLheight = currSML.height();

          if (currSML.length !== 0)
          {
            currSML.slideUp(300);
            currMOLB.hide();
            currMLB.show();
          }

          $('.subMenuItem').each(function()
          {
            var currSMI = $(this);
            var currSMT = currSMI.find('.subMenuText');

            if(currSMI.hasClass("clicked"))
            {
              currSMI.removeClass("clicked");
              hlTextToggle(false, currSMT);
            }
          });

          if(iterMMI.index() < currMMI.index())
            prevSMLisAbove = true;
        }
      });

      currMMI.addClass("clicked");
      if (currSML.length !== 0) {
        currMOLB.show();
        currMLB.hide();
        currSML.slideDown(300);
      }

      // move selectorArrow
      if(prevSMLisAbove)
        topL = currMMI.offset().top - prevSMLheight + selectorIndent;
      else
        topL = currMMI.offset().top + selectorIndent;

      $('#selector').animate({ top: topL}, 200);
    }
  });

  $('.subMenuItem').click(function()
  {
    var currSMI = $(this);
    var currSMT = currSMI.find('.subMenuText');

    if(currSMI.hasClass("clicked"))
    {
      currSMI.removeClass("clicked");
      hlTextToggle(false, currSMT);
    }
    else
    {
      $('.subMenuItem').each(function()
      {
        var currSMI = $(this);
        var currSMT = currSMI.find('.subMenuText');

        if(currSMI.hasClass("clicked"))
        {
          currSMI.removeClass("clicked");
          hlTextToggle(false, currSMT);
        }
      });

      currSMI.addClass("clicked");
      hlTextToggle(true, currSMT);

      //move selectorArrow
      topL = currSMI.offset().top + selectorIndent;
      $('#selector').animate({ top: topL}, 200);
    }
  });
})();
