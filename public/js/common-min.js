!function(t){function a(t,e){for(var n=!0,i=t.length,o=0;i>o;o++)0===t[o].css("width")&&(n=!1);n?e():setTimeout(function(){a(t,e)},100)}var e=t(".nav_bar"),n=t(".nav_list"),i=t("[data-main]");e.css({left:i.data("left")+"px",width:i.css("width")}),n.on("mouseover",function(a){var n=a.target;if("a"===n.nodeName.toLowerCase()){var i=t(n).data("left")+"px",o=t(n).css("width");e.animate({left:i,width:o},"normal")}return!1}),n.on("mouseleave",function(a){var n=a.target;if("a"===n.nodeName.toLowerCase()){var i=t("[data-main]"),o=i.data("left")+"px",r=i.css("width");e.animate({left:o,width:r},"normal")}});var o=t(".title_mor"),r=t(".title_yth");a([o,r],function(){o.animate({top:"12px"},1500),r.animate({top:"107px"},1500),t(".title_3").animate({opacity:1},1500)})}(jQuery);