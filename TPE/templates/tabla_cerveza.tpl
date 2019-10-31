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
                 {foreach from=$cervezas item=cerveza}
            
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
 </section>

    <section>
            <div id="beerHistory">
                <p>La historia de la cerveza es la descripción cronológica, desde su origen, de la evolución de una de
                    las
                    bebidas
                    fermentadas más antiguas de la humanidad.1​ Se produce la cerveza mediante la fermentación
                    alcohólica de los
                    cereales ayudada por la acción de diversas levaduras. Los ingredientes básicos que intervienen en la
                    elaboración
                    de esa bebida son: el agua, los cereales (generalmente malta de cebada o trigo), las levaduras y
                    (recientemente
                    en su historia) el lúpulo (Humulus lupulus L.).2​ La combinación de la calidad, cantidad y especie
                    de cada
                    uno
                    de estos ingredientes produce una gran variedad de tipos de cerveza. A través de su evolución,
                    dependiendo
                    de la
                    época que se trate, la región y de la cultura, se ha considerado una bebida bien de carácter social,
                    con
                    cualidades refrescantes, o con características nutritivas. Las primeras cervezas eran de tipo ale,
                    es decir,
                    de
                    fermentación a temperatura ambiente causada por la levadura Saccharomyces cerevisiae (sin empleo de
                    lúpulo),
                    responsable igualmente de las fermentaciones del pan y el vino. Posteriormente, ya en el siglo xv d.
                    C. se
                    comienza a fermentar en la zona baja de las cubas. El efecto de una nueva levadura (Saccharomyces
                    pastorianus)
                    necesita menores temperaturas y se busca de forma natural en el fondo de cuevas: surge así la
                    cerveza tipo
                    lager. En el mismo siglo se incluye el lúpulo en algunas de las cervezas. Su popularidad y agradable
                    sabor
                    hace
                    que esta nueva cerveza (lager), esté en oposición con la clásica (ale). Su producción necesitará el
                    advenimiento
                    de las máquinas de vapor y la introducción de los sistemas de refrigeración fundamentados en los
                    compresores.

                    Uno de los hitos importantes en la fabricación de cerveza fue el inicio de la capacidad de cultivar
                    las
                    levaduras fermentativas, este hito fue alcanzado en las primeras décadas del siglo xx d. C..
                    Anteriormente a
                    estas fechas, el mosto de la cerveza se inoculaba con las fermentaciones precedentes, siendo el
                    proceso poco
                    eficiente e impredecible. En 1883 el micólogo danés Emil Christian Hansen, de los laboratorios de
                    Carlsberg,
                    ideó un método para emplear cultivos unicelulares en la producción de levaduras.3​ La utilización de
                    cultivos
                    puros de levaduras se adoptó de inmediato en todo el mundo. Primero en las cervezas de tipo lager y
                    posteriormente en las ale. La investigación en el terreno de la microbiología aplicada a los
                    mecanismos de
                    las
                    levaduras permitió la aparición de nuevos tipos de cervezas desconocidos hasta la fecha. Las
                    cervezas tipo
                    lager
                    (concretamente las pale lager) suponen, a comienzos del siglo xxi d. C., casi un 90 % de la
                    producción
                    mundial.

                    Durante la Revolución Industrial la producción de cerveza tuvo que pasar de ser artesanal, y
                    orientada
                    exclusivamente al consumo doméstico, a ser producida a escala industrial y orientada a las masas.4​
                    A este
                    incremento de la producción mundial contribuyeron, por una parte, las mejoras tecnológicas aplicadas
                    a la
                    industria y el aumento en el conocimiento de los procesos microbiológicos existentes en la
                    producción de la
                    cerveza y, por otra, la constante urbanización de las clases sociales. En el siglo xx d. C. la
                    producción
                    cervecera mundial se encontraba en manos de compañías multinacionales (algunas como Anheuser-Busch
                    InBev) y
                    varios miles de pequeños productores, que van desde los denominados brewpubs hasta cerveceras
                    regionales
                    (aludiendo al término terroir). La cerveza se consume en cientos de variedades en locales hosteleros
                    como:
                    bares, tabernas, pubs, biergartens y festivales especiales, así como celebraciones diversas a lo
                    largo del
                    mundo. Una de las últimas innovaciones del siglo xxi d. C. l son las microcervecerías</p>
            </div>
        </section>
        {include file="historia.tpl"}
        <div class="arriba">
            <button class="irarriba" type="button"><i class="fas fa-angle-double-up"></i></button>
        </div>
    </article>
    <script type="text/javascript" src="js/arriba.js"></script>
    <script src="js/tabla.js"></script>
    