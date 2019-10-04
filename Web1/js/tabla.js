document.addEventListener("DOMContentLoaded", function () {

    "use strict";

    function irArriba() {
        function Subir() {
            window.scrollTo(0, top);
        }
        let Arriba = document.getElementsByClassName("irarriba");
        for (let i = 0; i < Arriba.length; i++) {
            Arriba[i].addEventListener("click", Subir);
        };
    }

    function Comprobar() {
        let inputNombre = document.getElementById('nombre');
        let inputEmail = document.getElementById('email');
        let inputComentario = document.getElementById("comentario").value;
        let texto = "Hubo error en: ";
        let genericError = false;
        let checking;
        if (Errores(inputNombre) == false) {
            texto = texto.concat("*Nombre ");
            genericError = true;
        }
        if (Errores(inputEmail) == false) {
            texto = texto.concat("*Email ");
            genericError = true;
        }
        if (Errores(inputComentario) == false) {
            texto = texto.concat("*Comentario ");
            genericError = true;
        }
        checking = inputState();
        if (checking == false) {
            texto = texto.concat("*Ingrese el texto ");
            genericError = true;
        }
        if (genericError == false) {
            alert("Su comentario fue enviado con éxito. Gracias por su tiempo!");
            location.reload();
        } else {
            alert(texto);
        }
    }

    function Errores(comprobado) {
        if (comprobado.value == "") {
            return false;
        } else {
            return true;
        }
    }

    function inputState() {
        let checkboxname = document.getElementById("Robot").value;
        let algo = document.getElementById("captcha").innerHTML;
        if (checkboxname === algo) {
            return true;
        } else {
            return false;
        }
    }

    /////aca cargo contenido del index desde un archivo en el servidor
    let ctn = "index-content.html";
    fetch(ctn).then(
        function (response) {
            response.text().then(
                function (texto) {
                    document.querySelector("#content").innerHTML = texto;
                    irArriba();
                }
            )
        });
    ////
    document.getElementById("history").addEventListener("click", function () {
        let ctn = "historia-content.html";
        fetch(ctn, {

            "method": 'GET',
            "mode": 'cors',
            "headers": {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }

        }).then(
            function (response) {
                response.text().then(
                    function (texto) {
                        document.querySelector("#content").innerHTML = texto;
                        irArriba();
                    }
                )
            });
    })

    document.getElementById("contact").addEventListener("click", function () {
        let ctn = "contacto-content.html";
        fetch(ctn, {

            "method": 'GET',
            "mode": 'cors',
            "headers": {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }

        }).then(
            function (response) {
                response.text().then(
                    function (texto) {
                        document.querySelector("#content").innerHTML = texto;
                        irArriba();
                        let subirComentario = document.getElementById("SubirComentario");
                        subirComentario.addEventListener("click", Comprobar);
                    }
                )
            });
    })

    document.getElementById("index").addEventListener("click", function () {
        let ctn = "index-content.html";
        fetch(ctn, {

            "method": 'GET',
            "mode": 'cors',
            "headers": {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }

        }).then(
            function (response) {
                response.text().then(
                    function (texto) {
                        document.querySelector("#content").innerHTML = texto;
                        irArriba();
                    }
                )
            });
    });
    document.getElementById("tipos").addEventListener("click", function () {//carga el html de tipos en el html index
        let ctn = "tipos-content.html";
        fetch(ctn, {

            "method": 'GET',
            "mode": 'cors',
            "headers": {
                'Content-Type': 'application/json',
                'Access-Control-Allow-Origin': '*'
            }

        }).then(
            function (response) {
                response.text().then(
                    function (texto) {
                        document.querySelector("#content").innerHTML = texto;
                        irArriba();
                        //ESTO TRAE DEL SERVER LOS ELEMENTOS PARA  LA TABLA 
                        let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                        let cerveza = fetch(url).then(function (response) {
                                return response.json()
                            })
                            .then(function (json) {
                                function porDefault() {
                                    let max = json.estilos;
                                    let tabla = document.getElementById("tabla-cerveza");
                                    for (let i = 0; i < max.length; i++) {
                                        agregarFila(json.estilos[i]);
                                    }
                                    let opciones = document.getElementById("input-select");
                                    for (let i = 0; i < max.length; i++) {
                                        let result = json.estilos[i].thing.nombre;
                                        let opt = document.createElement("option");
                                        opt.value = result;
                                        opt.innerHTML = result;
                                        opciones.appendChild(opt);
                                        let opcionesE = document.getElementById("input-editar");
                                        let opte = document.createElement("option");
                                        opte.value = result;
                                        opte.innerHTML = result;
                                        opcionesE.appendChild(opte);
                                    }


                                }

                                function crearOpcionVista() { //esto crea una opcion para q se vea en la lista para borrar
                                    let result = document.getElementById("input-nombre").value;
                                    let opciones = document.getElementById("input-select");
                                    let opcionesE = document.getElementById("input-editar");
                                    let opte = document.createElement("option");
                                    opte.value = result;
                                    opte.innerHTML = result;
                                    opcionesE.appendChild(opte);

                                    //console.log(opciones);    
                                    // console.log(result);
                                    let opt = document.createElement("option");
                                    opt.value = result;
                                    opt.innerHTML = result;
                                    opciones.appendChild(opt);
                                    // console.log(opt);

                                }

                                function eliminarOpcionVista() {
                                    let eleccion = document.getElementById("input-select");
                                    let eleccione = document.getElementById("input-editar");

                                    for (let i = 0; i < eleccion.options.length; i++) {
                                        if (eleccion.options[i].value == eleccion.value) {
                                            eleccion.remove(i);
                                            eleccione.remove(i);
                                        }
                                    }
                                }
                                ///////BORRADO DE ELEMENTOS DEL SERVER
                                document.getElementById("borrar").addEventListener("click", function () {
                                    let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                                    fetch(url)
                                        .then(function (response) {
                                            return response.json()
                                        })
                                        .then(function (json) {
                                            let filaBorrar = document.getElementById("input-select").value;
                                            let encontrado = false;
                                            let i = 0;
                                            while (!encontrado && i < json.estilos.length) {
                                                if (json.estilos[i].thing.nombre == filaBorrar) {
                                                    encontrado = true;
                                                } else {
                                                    i++;
                                                }
                                            }
                                            if (encontrado) {
                                                // borrarFilaVista(json.estilos[i]);
                                                let idServer = json.estilos[i]._id;
                                                let r = fetch(url + "/" + idServer, {
                                                    "method": "DELETE",
                                                });
                                            }
                                            borrarFilaVista();
                                            eliminarOpcionVista();
                                        });
                                });
                                document.getElementById("editar").addEventListener("click", function () {
                                    let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                                    fetch(url)
                                        .then(function (response) {
                                            return response.json()
                                        })
                                        .then(function (json) {
                                            let filaEditar = document.getElementById("input-select").value;
                                            let encontrado = false;
                                            let i = 0;

                                            while (!encontrado && i < json.estilos.length) {
                                                if (json.estilos[i].thing.nombre == filaEditar) {
                                                    encontrado = true;
                                                } else {
                                                    i++;
                                                }
                                            }
                                            let nombre = document.getElementById("input-nombre");
                                            let porcentaje = document.getElementById("input-porcentaje");
                                            let ibu = document.getElementById("input-ibu");
                                            let amargor = document.getElementById("input-amargor");
                                            let og = document.getElementById("input-og");
                                            let data = {
                                                "thing": {
                                                    "nombre": nombre.value,
                                                    "porcentaje": porcentaje.value,
                                                    "ibu": ibu.value,
                                                    "amargor": amargor.value,
                                                    "og": og.value
                                                } //////////////////////////
                                            }; //aca le doy los datos;
                                            if (encontrado) {
                                                let idServer = json.estilos[i]._id;
                                                let r = fetch(url + "/" + idServer, {
                                                    "method": "PUT",
                                                    "headers": {
                                                        "Content-Type": "application/json"
                                                    },
                                                    "body": JSON.stringify(data)
                                                });
                                            };

                                            borrarFilaVista();
                                            eliminarOpcionVista();
                                            agregaFilaVista(); ///////////
                                            LimpiarInputs();
                                        });

                                })

                                ////ESTO EDITA LAS FILAS Y LAS ENVIA AL SERVER BTN EDITAR 
                                document.getElementById("ver").addEventListener("click", function () {
                                    let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                                    fetch(url)
                                        .then(function (response) {
                                            return response.json()
                                        })
                                        .then(function (json) {
                                            let filaEditar = document.getElementById("input-editar").value;
                                            let encontrado = false;
                                            let i = 0;

                                            while (!encontrado && i < json.estilos.length) {
                                                if (json.estilos[i].thing.nombre == filaEditar) {
                                                    encontrado = true;
                                                } else {
                                                    i++;
                                                }
                                            }
                                            document.getElementById("input-nombre").setAttribute("value", json.estilos[i].thing.nombre);
                                            document.getElementById("input-porcentaje").setAttribute("value", json.estilos[i].thing.porcentaje);
                                            document.getElementById("input-ibu").setAttribute("value", json.estilos[i].thing.ibu);
                                            document.getElementById("input-amargor").setAttribute("value", json.estilos[i].thing.amargor);
                                            document.getElementById("input-og").setAttribute("value", json.estilos[i].thing.og);

                                        });
                                })


                                function borrarFilaVista() {
                                    let tabla = document.getElementById("tabla-cerveza");
                                    let filaBorrar = document.getElementById("input-select").value;
                                    for (let i = 0; i < tabla.rows.length; i++) {
                                        if (filaBorrar == tabla.rows[i].cells[0].innerHTML) {
                                            tabla.deleteRow(i);
                                        }
                                    }
                                }

                                function LimpiarInputs() {
                                    document.getElementById("input-nombre").setAttribute("value", "");
                                    document.getElementById("input-porcentaje").setAttribute("value", "");
                                    document.getElementById("input-ibu").setAttribute("value", "");
                                    document.getElementById("input-amargor").setAttribute("value", "");
                                    document.getElementById("input-og").setAttribute("value", "");
                                }

                                function agregaFilaVista() {
                                    let nombre = document.getElementById("input-nombre");
                                    let porcentaje = document.getElementById("input-porcentaje");
                                    let ibu = document.getElementById("input-ibu");
                                    let amargor = document.getElementById("input-amargor");
                                    let og = document.getElementById("input-og");
                                    let newCerveza = {
                                        "nombre": nombre.value,
                                        "porcentaje": porcentaje.value,
                                        "ibu": ibu.value,
                                        "amargor": amargor.value,
                                        "og": og.value
                                    }
                                    agregarFilaVista(newCerveza);
                                    crearOpcionVista();
                                }
                                ////aca agrega fila a la vista de la tabla(carga optimista)
                                function agregarFilaVista(object) {
                                    let tabla = document.getElementById("tabla-cerveza");
                                    let max = tabla.rows[0].cells.length;
                                    console.log(tabla.rows[0].cells.length);
                                    let newRow = tabla.insertRow(tabla.rows.length);
                                    for (let i = 0; i < max; i++) {
                                        let newcelda = newRow.insertCell(i);
                                        let newText = document.createTextNode(object.nombre);
                                        switch (i) {
                                            case 0:
                                                newcelda.appendChild(newText);

                                                break;
                                            case 1:
                                                newText = document.createTextNode(object.porcentaje);
                                                newcelda.appendChild(newText);
                                                break;
                                            case 2:
                                                newText = document.createTextNode(object.ibu);
                                                newcelda.appendChild(newText);

                                                break;
                                            case 3:
                                                newText = document.createTextNode(object.amargor);
                                                newcelda.appendChild(newText);

                                                break;
                                            case 4:
                                                newText = document.createTextNode(object.og);
                                                newcelda.appendChild(newText);

                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                }
                                ///aca toma los datos del server y los pinta en la tabla
                                function agregarFila(object) {
                                    let tabla = document.getElementById("tabla-cerveza");
                                    let max = tabla.rows[0].cells.length;
                                    let newRow = tabla.insertRow(tabla.rows.length);
                                    for (let i = 0; i < max; i++) {
                                        let newcelda = newRow.insertCell(i);
                                        let newText = document.createTextNode(object.thing.nombre);
                                        switch (i) {
                                            case 0:
                                                newcelda.appendChild(newText);

                                                break;
                                            case 1:
                                                newText = document.createTextNode(object.thing.porcentaje);
                                                newcelda.appendChild(newText);
                                                break;
                                            case 2:
                                                newText = document.createTextNode(object.thing.ibu);
                                                newcelda.appendChild(newText);

                                                break;
                                            case 3:
                                                newText = document.createTextNode(object.thing.amargor);
                                                newcelda.appendChild(newText);

                                                break;
                                            case 4:
                                                newText = document.createTextNode(object.thing.og);
                                                newcelda.appendChild(newText);

                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                }

                                //////////////////////////////////////////////////////////////////////////////
                                //////ACA ESTA EL Q MANDA LO INGRESADO POR LOS INPUTs  SERVER BTN ENVIAR
                                document.querySelector("#btn-Agregar").addEventListener("click", async function () {
                                    agregaFilaVista();
                                    let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                                    let nombre = document.getElementById("input-nombre");
                                    let porcentaje = document.getElementById("input-porcentaje");
                                    let ibu = document.getElementById("input-ibu");
                                    let amargor = document.getElementById("input-amargor");
                                    let og = document.getElementById("input-og");
                                    let newCerveza = {
                                        "thing": {
                                            "nombre": nombre.value,
                                            "porcentaje": porcentaje.value,
                                            "ibu": ibu.value,
                                            "amargor": amargor.value,
                                            "og": og.value
                                        }
                                    };
                                    let r = await fetch(url, {
                                        "method": "POST",
                                        "headers": {
                                            'Content-Type': 'application/json'
                                        },
                                        "body": JSON.stringify(newCerveza)
                                    });
                                    let html = await r.text();
                                    console.log(html);
                                    LimpiarInputs();
                                })

                                ///este boton envia 3 juntos 
                                document.getElementById("btn-Agregar3").addEventListener("click", async function () {
                                    for (let i = 0; i < 3; i++) {
                                        agregaFilaVista();
                                        let url = "https://web-unicen.herokuapp.com/api/groups/5/estilos";
                                        let nombre = document.getElementById("input-nombre");
                                        let porcentaje = document.getElementById("input-porcentaje");
                                        let ibu = document.getElementById("input-ibu");
                                        let amargor = document.getElementById("input-amargor");
                                        let og = document.getElementById("input-og");
                                        let newCerveza = {
                                            "thing": {
                                                "nombre": nombre.value,
                                                "porcentaje": porcentaje.value,
                                                "ibu": ibu.value,
                                                "amargor": amargor.value,
                                                "og": og.value
                                            }
                                        };
                                        let r = await fetch(url, {
                                            "method": "POST",
                                            "headers": {
                                                'Content-Type': 'application/json'
                                            },
                                            "body": JSON.stringify(newCerveza)
                                        });
                                        let html = await r.text();
                                        //console.log(html);
                                    }
                                })
                                ///////////////


                                document.getElementById("input-filtrar").addEventListener("click", function () {
                                    this.value = "";
                                })

                                document.getElementById("filtrar").addEventListener("click", function () {
                                    let tabla = document.getElementById("tabla-cerveza");
                                    let inputCampo = document.getElementById("input-campo").value;
                                    //console.log(inputCampo);
                                    let inputFiltrar = document.getElementById("input-filtrar").value;

                                    for (let i = tabla.rows.length - 1; i > 0; i--) {
                                        switch (inputCampo) {
                                            case "nombre":
                                                if (tabla.rows[i].cells[0].innerHTML != inputFiltrar) {
                                                    tabla.deleteRow(i);

                                                }
                                                break;
                                            case "porcentaje":
                                                if (tabla.rows[i].cells[1].innerHTML != inputFiltrar) {
                                                    tabla.deleteRow(i);

                                                }
                                                break;
                                            case "ibu":
                                                if (tabla.rows[i].cells[2].innerHTML != inputFiltrar) {
                                                    tabla.deleteRow(i);

                                                }
                                                break;
                                            case "amargor":
                                                if (tabla.rows[i].cells[3].innerHTML != inputFiltrar) {
                                                    tabla.deleteRow(i);

                                                }
                                                break;
                                            case "og":
                                                if (tabla.rows[i].cells[4].innerHTML != inputFiltrar) {
                                                    tabla.deleteRow(i);

                                                }
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                    document.getElementById("mostrarT").addEventListener("click", function () {
                                        for (let i = tabla.rows.length - 1; i > 0; i--) {
                                            tabla.deleteRow(i);
                                        }
                                        porDefault();
                                    })
                                });


                                porDefault();

                            })
                    }
                )
            });
    })



})