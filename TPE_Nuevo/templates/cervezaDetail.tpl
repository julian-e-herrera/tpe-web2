{include 'templates/header.tpl'}
<section>
<table id="tabla-cerveza">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Graduación %alc</th>
                    <th>Ibu</th>
                    <th>Amargor</th>
                    <th>O.G.</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                     <td>{$cerveza->nombre}</td>
                     <td>{$cerveza->graduacion_porcentaje}</td>
                     <td>{$cerveza->ibu}</td>
                     <td>{$cerveza->amargor}</td>
                     <td>{$cerveza->original_gravity}</td>
                    </tr>
            </tbody>
</table> 
</section>
{include 'templates/historia.tpl'}
 </article>
{include 'templates/footer.tpl'}
    <script type="text/javascript" src="js/arriba.js"></script>
    <script src="js/tabla.js"></script>
</body>

</html>