{include file="header.tpl"}
{include file="loginsolo.tpl"}
{include file="tabla_cerveza.tpl"}        

<form action="actualizar/{$cerveza->id_cerveza}" method="UPDATE">
    <label for="input-id_cerveza">id</label>
    <input type="text" name="id_cerveza" placeholder="" id="id_cerveza">
    <label for="input-nombre">Nombre</label>
    <input type="text" name="nombre" placeholder="" id="input-nombre">
    <label for="input-porcentaje">%</label>
    <input type="text" name="graduacion_porcentaje" placeholder="" id="input-porcentaje">
    <label for="input-ibu">IBU</label>
    <input type="text" name="ibu" placeholder="" id="input-ibu">
    <label for="input-amargor">Amargor</label>
    <input type="text" name="amargor" placeholder="" id="input-amargor">
    <label for="input-og">O.G.</label>
    <input type="text" name="original_gravity" placeholder="" id="input-og">
     <label for="input-familia">Familia</label>
    <input type="text" name="id_familia" placeholder="" id="input-familia">
     <input type="submit" value="actualizar">
</form>

{include file="footer.tpl"}