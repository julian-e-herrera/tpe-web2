{include file="header.tpl"}
<section>
         <table id="tabla-cerveza">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Graduación %alc</th>
                        <th>Ibu</th>
                        <th>Amargor</th>
                        <th>O.G.</th>
                        <th>VER</th>
                        <th>ACTUALIZAR</th>
                        <th>BORRAR</th>
                    </tr>
                </thead>
                <tbody>
                 {foreach from=$familia item=cerveza}
                    <tr>
                     <td>{$cerveza->nombre}</td>
                     <td>{$cerveza->graduacion_porcentaje}</td>
                     <td>{$cerveza->ibu}</td>
                     <td>{$cerveza->amargor}</td>
                     <td>{$cerveza->original_gravity}</td>
                     <td><small><a href="cervezas/{$cerveza->id_cerveza}">VER</a></small></td>
                     <td><small><a href="cervezas/{$cerveza->id_cerveza}">ACTUALIZAR</a></small></td>
                     <td><small><a href="cervezas/{$cerveza->id_cerveza}">BORRAR</a></small></td>
                    </tr>

                 {/foreach}
                </tbody>
            </table>    
 </section>
             {include 'templates/filtro_familia.tpl'}
 <section>
  <h1>HISTORIA</h1>
  {include 'historia.tpl'}
 </section>       
{include file="footer.tpl"}