function on_load() 
{
    $('.mainMenuItem').click(function()
    {
        var currMMI = $(this);
        var currSML =  $(get_submenuList_class(currMMI));

        if(currMMI.hasClass("clicked"))
        {
            currMMI.removeClass("clicked");


            if(currSML.length)
            {
                currSML.slideUp(300);
                currMMI.find('.mainlinebox').toggle();
                currMMI.find('.mainopenlinebox').toggle();    
            }
        }   
        else
        {
            $('.mainMenuItem').each(function()
            {
                var currMMI = $(this)
                if(currMMI.hasClass("clicked"))
                {
                    var currSML = $(get_submenuList_class(currMMI))
                    currMMI.removeClass("clicked");

                    if(currSML.length)
                    {
                        currSML.slideUp(300);
                        currMMI.find('.mainlinebox').toggle();
                        currMMI.find('.mainopenlinebox').toggle();                        
                    }
                }
            });

            currMMI.addClass("clicked");

            if(currSML.length)
            {
                currMMI.find('.mainlinebox').toggle();
                currMMI.find('.mainopenlinebox').toggle();
                currSML.slideDown(300);
            }
        }

    });
}

function get_submenuList_class(mainMenuItemClass)
{
    return ('.' + 'sub' + $(mainMenuItemClass).attr("class").split(/\s+/)[1]);
}