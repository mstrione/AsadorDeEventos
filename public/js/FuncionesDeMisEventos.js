function Asistencia()
{
	$A=document.getElementById('asistencia').value;
		if ($A=="no") 
		{
			document.getElementById('AsistenciaAdultos').disabled="";
		};
}

function AsignaIDEvento(idevento)
{
	document.getElementById('iddelevento').value=idevento;
}