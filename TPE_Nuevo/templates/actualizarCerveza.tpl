{include file="header.tpl"}
{include file="loginsolo.tpl"}


<form action="/tpe/tpe-web2/TPE_Nuevo/" method="POST">
    <label for="input-id_cerveza">id</label>
    <input type="text" name="id_cerveza" value="{$cerveza->id_cerveza}" id="id_cerveza" disabled>
    <label for="input-nombre">Nombre</label>
    <input type="text" name="nombre" value="{$cerveza->nombre}" id="input-nombre">
    <label for="input-porcentaje">%</label>
    <input type="text" name="graduacion_porcentaje" value="{$cerveza->graduacion_porcentaje}" id="input-porcentaje">
    <label for="input-ibu">IBU</label>
    <input type="text" name="ibu" value="{$cerveza->ibu}" id="input-ibu">
    <label for="input-amargor">Amargor</label>
    <input type="text" name="amargor" value="{$cerveza->amargor}" id="input-amargor">
    <label for="input-og">O.G.</label>
    <input type="text" name="original_gravity" value="{$cerveza->original_gravity}" id="input-og">
     <label for="input-familia">Familia</label>
    <input type="text" name="id_familia" value="{$cerveza->id_familia}" id="input-familia">
     <input type="submit" value="Actualizar">
</form>

{include file="footer.tpl"}