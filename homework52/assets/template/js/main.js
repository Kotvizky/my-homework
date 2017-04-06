var link = window.location.pathname;
if (link != "/") link=link.split("/")[1];
$("#navbar [href= '" + link + "']").parent().addClass("active");
