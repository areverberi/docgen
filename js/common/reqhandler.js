//put in vals all the stuff that's not table or kind (eg, where, join, etc)
function richiesta(tb, tp, v, section){
	$.post("/gestionet.php", {tab:tb, tipo:tp, vals:v}, function(data){visualizza(data, section)}, "json");
}
