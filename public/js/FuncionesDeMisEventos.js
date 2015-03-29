function Asistencia()
{
	$A=document.getElementById('asistencia').value;
		if ($A=="si") 
		{
			document.getElementById('AsistenciaAdultos').disabled="";
			document.getElementById('AsistenciaNiños').disabled="";
			document.getElementById('aceptar').disabled="";
		};
		if ($A=='no') 
		{
			document.getElementById('AsistenciaAdultos').disabled="true";
			document.getElementById('AsistenciaNiños').disabled="true";
			document.getElementById('aceptar').disabled="";
		};
		if ($A=='indeterminado') 
		{
			document.getElementById('AsistenciaAdultos').disabled="true";
			document.getElementById('AsistenciaNiños').disabled="true";
			document.getElementById('aceptar').disabled="true";
		};
}

function AsignaIDEvento(idevento)
{
	document.getElementById('iddelevento').value=idevento;
	document.getElementById('iddelevento2').value=idevento;
}
function VerEvento(idevento)
    {
        window.location.href="/Evento/"+idevento;
    }