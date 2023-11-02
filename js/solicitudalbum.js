function calcularCostes(numPaginas, numFotos) {
    let costePaginas = 0;
    if (numPaginas <= 4){
        costePaginas = numPaginas * 0.10;
    }
    else if (numPaginas <= 11){
        costePaginas = (4 * 0.10) + ((numPaginas - 4) * 0.08);
    }
    else{
        costePaginas = (4 * 0.10) + (7 * 0.08) + ((numPaginas - 11) * 0.07);
    }

    const costeBNLowDpi = costePaginas;
    const costeBNHighDpi = (costePaginas + (numFotos * 0.02)).toFixed(2);
    const costeColorLowDpi = (costePaginas + (0.05 * numFotos)).toFixed(2);
    const costeColorHighDpi = (costePaginas + (0.05 * numFotos) + (0.02 * numFotos)).toFixed(2);

    return {
        costeBNLowDpi,
        costeBNHighDpi,
        costeColorLowDpi,
        costeColorHighDpi
    };
}

function crearTabla(){
    const contenedor = document.querySelector('.tabla_calculada_div');

    //Creamos elementos de la tabla
    const tabla = document.createElement('table');
    const encabezado = tabla.createTHead();
    const filaEncabezado = encabezado.insertRow();

    //Creamos encabezado de la tabla
    const headers = ['', '', 'Blanco y negro', 'Color'];
    for (let i = 0; i < headers.length; i++) {
        const celda = document.createElement('th');
        celda.textContent = headers[i];
        if (i > 1) celda.colSpan = '2';
        filaEncabezado.appendChild(celda);
    }

    //Creación del subencabezado
    const subFilaEncabezado = encabezado.insertRow();
    const subHeaders = ['Número de páginas', 'Número de fotos', '150-300 dpi', '450-900 dpi', '150-300 dpi', '450-900 dpi'];
    for (let i = 0; i < subHeaders.length; i++) {
        const celda = document.createElement('th');
        celda.textContent = subHeaders[i];
        subFilaEncabezado.appendChild(celda);
    }

    // Crear el cuerpo de la tabla
    const tbody = document.createElement('tbody');
    tabla.appendChild(tbody);

    // Iterar para crear las filas y columnas
    for (let i = 1; i <= 15; i++) {
        const fila = tbody.insertRow();
        const numPaginas = i;
        const numFotos = i * 3;
        const costes = calcularCostes(numPaginas, numFotos);

        const datosFila = [
            numPaginas, 
            numFotos, 
            costes.costeBNLowDpi.toFixed(2), 
            costes.costeBNHighDpi,
            costes.costeColorLowDpi, 
            costes.costeColorHighDpi
        ];
        
        for (let j = 0; j < datosFila.length; j++) {
            const celda = fila.insertCell();
            celda.textContent = datosFila[j];
        }
    }

    // Agregar la tabla al contenedor
    contenedor.appendChild(tabla);
}

// Llamar a la función para crear la tabla
document.addEventListener('DOMContentLoaded', (event) => {
    crearTabla();
});
