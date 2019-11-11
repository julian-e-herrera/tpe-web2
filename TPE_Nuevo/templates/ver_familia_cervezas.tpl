{include file="header.tpl"}
{include file="loginsolo.tpl"}

<section>
         <table id="tabla-familia">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Caracteristicas</th>
                        <th>Familia</th>
                        <th>Ejemplos</th>
                        <th>VER</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                     <td>{$familia->nombre}</td>
                     <td>{$familia->caracteristicas}</td>
                     <td>{$familia->id_familia}</td>
                     <td> 
                         {foreach from=$cervezas item=cerveza}
                         {if {$cerveza->id_familia} eq {$familia->id_familia}}
                         <ol><small><a href="/tpe/tpe-web2/TPE_Nuevo/cerveza/{$cerveza->id_cerveza}">{$cerveza->nombre}</a></small></ol>
                         {/if} 
                          {/foreach}
                     </td>  
                     <td><small><a href="/tpe/tpe-web2/TPE_Nuevo/" target="_parent" rel="noopener noreferrer">Volver</a></small></td>
                     
                    </tr>

                </tbody>
            </table>    
 </section>
             {include 'templates/filtro_familia.tpl'}
 <section>
  <h1>HISTORIA</h1>
  {include 'historia.tpl'}
 </section>       
{include file="footer.tpl"}