function on_load() 
{
    $('.mainMenuItem').click(function()
    {
        var currMMI = $(this);
        var currSML =  get_submenuList_class(currMMI);

        var currMLB = currMMI.find('.mainLineBox');
        var currMOLB = currMMI.find('.mainOpenLineBox');

        if(currMMI.hasClass("clicked"))
        {
            currMMI.removeClass("clicked");

            if(currSML.length != 0)
            {
                currSML.slideUp(300);
                currMLB.show();
                currMOLB.hide();
            }
        }
        else
        {
            $('.mainMenuItem').each(function()
            {
                var currMMI = $(this)

                var currMLB = currMMI.find('.mainLineBox');
                var currMOLB = currMMI.find('.mainOpenLineBox');

                if(currMMI.hasClass("clicked"))
                {
                    var currSML = get_submenuList_class(currMMI)
                    currMMI.removeClass("clicked");

                    if(currSML.length != 0)
                    {
                        currSML.slideUp(300);
                        currMLB.show();
                        currMOLB.hide();                       
                    }
                }
            });

            currMMI.addClass("clicked");

            if(currSML.length != 0)
            {
                currMOLB.show();
                currMLB.hide();
                currSML.slideDown(300);
            }
        }

    });
}

function get_submenuList_class(mainMenuItemClass)
{
    return $('.' + 'sub' + $(mainMenuItemClass).attr("class").split(/\s+/)[1]);
}