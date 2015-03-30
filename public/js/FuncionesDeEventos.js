function AsignaIdItem(iditem,nombre)
{
	document.getElementById('ItemAllevar').defaultValue=nombre;
	document.getElementById('iditem').defaultValue=iditem;

}

function AsignaIdItem2(iditem,nombre)
{
	document.getElementById('ItemAAsignar').defaultValue=nombre;
	document.getElementById('iditem2').defaultValue=iditem;

}
function AsignaIdItem3(iditemok,nombre)
{
	document.getElementById('ItemAEliminar').defaultValue=nombre;
	document.getElementById('iditemeliminar').defaultValue=iditemok;
}
function cerrarinvitaciones()
{
	if(document.getElementById("EstadoDeLalista").checked==true)
	{
		document.getElementById('labellista').style.display="";
		document.getElementById('containercuentas').style.display="";
	}
	else
	{
		document.getElementById('labellista').style.display="none";
		document.getElementById('containercuentas').style.display="none";
	}
		
}