/**
 * Permite convertir las fechas en el formato preestablecido deseado
 */
const format = 'sv-SE';

/* Obtiene la fecha actual en el formato deseado */
const getDate = (value = null) => {
    const date = (value)
        ? new Date(value)
        : new Date();

    return date.toLocaleDateString(format)
}

/* Obtiene la horaa actual en el formato deseado */
const getTime = (value = null) => {
    const date = (value)
        ? new Date(value)
        : new Date();
    return date.toLocaleTimeString(format)
}

export { getDate, getTime };