<html> 
<body> 
<h2> Codice dei comuni della provincia dell'Aquila </h2>

<br> 
 
<b>Risultati in forma di Select: </b> <br>

<select name="mys">
    {section name=nr loop=$results}
        <option value="{$results[nr].codice}">
                   {$results[nr].comune} | {$results[nr].provincia}
        </option>
    {/section}
</select>
 
</body> 
</html> 