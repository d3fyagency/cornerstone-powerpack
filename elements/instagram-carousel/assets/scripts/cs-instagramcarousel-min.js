jQuery(document).ready(function($){var e=!1,t=null,i=function(){var e=window,t="inner";"innerWidth"in window||(t="client",e=document.documentElement||document.body);var i={width:e[t+"Width"],height:e[t+"Height"]},n=$("#wpadminbar").height();return n&&(i.height-=n),i},n=function(e){var t=parseInt(e,10);return isNaN(t)?0:t};$(window).resize(function(){this.csppResizeTo&&clearTimeout(this.csppResizeTo),this.csppResizeTo=setTimeout(function(){$(this).trigger("csppResizeEnd")},250)}),setTimeout(function(){$(".d3fy-instagram-carousel").removeClass("loading")},2500),t=function(){var t=i(),a=e;$(".d3fy-instagram-carousel").each(function(){var i=$(this),s=n(i.attr("data-d3fy-carousel-visible-mobile")),o=n(i.attr("data-d3fy-carousel-visible-desktop")),c=n(i.attr("data-d3fy-minwidth-desktop")),r=t.width>=c?o:s,d=n(i.attr("data-cycle-carousel-visible"));a&&r!==d&&(i.cycle("destroy"),e=!1),e||(i.attr("data-cycle-carousel-visible",r),i.cycle())}),e=!0},t(),$(window).bind("csppResizeEnd",function(){t()})});