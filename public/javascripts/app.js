function on_load()
{
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
            topL = currMMI.offset().top;
            $('.selectorArrow').animate({ top: topL}, 200);
            $('.selector').animate({ top: topL}, 200);
        }
        else
        {
            $('.mainMenuItem').each(function()
            {
                var currMMI = $(this);

                if(currMMI.hasClass("clicked"))
                {
                    var currSML = getSubmenuListClass(currMMI);
                    var currMLB = currMMI.find('.mainLineBox');
                    var currMOLB = currMMI.find('.mainOpenLineBox');
                    currMMI.removeClass("clicked");
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
                }
            });

            currMMI.addClass("clicked");
            if (currSML.length !== 0) {
                currMOLB.show();
                currMLB.hide();
                currSML.slideDown(300);
            }

            // move selectorArrow
            topL = currMMI.offset().top;
            $('.selectorArrow').animate({ top: topL}, 200);
            $('.selector').animate({ top: topL}, 200);
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
            topL = currSMI.offset().top;
            $('.selectorArrow').animate({ top: topL}, 200);
            $('.selector').animate({ top: topL}, 200);
        }
    });

    $('.selectorArrow').click(function()
    {
        $(this).removeClass('selectorArrow');
        $(this).addClass('selector');
    });

    $('.selector').click(function()
    {
        $(this).removeClass('selector');
        $(this).addClass('selectorArrow');
    });
}

function getSubmenuListClass(mainMenuItemClass)
{
    return $('.' + 'sub' + $(mainMenuItemClass).attr("class").split(/\s+/)[1]);
}

function hlTextToggle(highlight, textSpan)
{
    if(highlight)
    {
        //textSpan.html("~&nbsp;&nbsp;" + textSpan.html() + "&nbsp;&nbsp;~");
        textSpan.css("font-weight", "700");
    }
    else
    {
        //textSpan.html(textSpan.html().replace("&nbsp;&nbsp;~", "")
        //                            .replace("~&nbsp;&nbsp;", ""));
        textSpan.css("font-weight", "500");        
    }
}


