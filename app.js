function on_load() 
{
	resetMenuItemSizes(menuItemCount = getmenuItemCount());

	$('.mainMenuItem').click(function(){
		$(this).children('.subMenuItem').show();
		classname = '.' + $(this).attr("class").split(/\s+/)[1]
		resetMenuItemSizes(menuItemCount += getSubMenuCount(classname));
	});
}

function resetMenuItemSizes(menuItemCount)
{
	var heightPercent = 100/menuItemCount + '%';

	$('.mainMenuItem, .subMenuItem').animate({
   		height: heightPercent
	}, {
    	duration: 400
	});
}

function getmenuItemCount()
{
	var count = 0;

	$('.mainMenuitem').each(function(i, obj)
	{
		count++; // for the menu item itself
		$(this).children('.subMenuItem').each(function(i, obj) 
		{
			if($(this).css('display') != "none")
				count++;
		}); // for its submenus
	});

	return count;
}

function getSubMenuCount(menuItemClass)
{
	return $(menuItemClass).children('.subMenuItem').children('li').length
}

