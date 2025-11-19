
    $(document).ready(function() 
    {
		"use strict";
        $('.tabs').tabs();
        
        jQuery.getScript('https://quanticalabs.com/.tools/EnvatoItems/js/getItems.js',function() { });
		if(document.referrer.toLowerCase().indexOf('themeforest.net')!=-1)
		{
			$('.tabs').tabs("option", "active", 8);
			$('.ui-state-default:not(".ui-state-active")').css("display", "none");
		}
    });

