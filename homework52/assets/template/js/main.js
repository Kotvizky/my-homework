

var action = $("#navbar").data("action");
//console.log(action);
$("#navbar [href= '" + action + "']").parent().addClass("active");
