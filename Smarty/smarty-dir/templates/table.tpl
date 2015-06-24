<html> 
<body> 
<h2> Codice dei comuni della provincia dell'Aquila </h2>

<br>

<b>Risultati in forma di Table:</b> <br>

<table cellpadding=1 cellspacing=0 border=0 width=60%>
{section name=nr loop=$results} 
    <tr {if $smarty.section.nr.iteration is odd} bgcolor="#ccc" {/if}>
        <td> 
             {$smarty.section.nr.iteration}
	</td>
	<td>
             {$results[nr].codice}
	</td>
        <td> 
             {$results[nr].comune}
	</td>
        <td> 
             {$results[nr].provincia}
	</td> 
    </tr> 
 
{sectionelse} 
   <tr>
        <td align="center">
	    <b> nessun risultato </b>
	<td>
   </tr>
{/section} 
     
</table>
 
</body> 
</html> 