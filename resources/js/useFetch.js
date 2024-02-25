const getToken = () => {
    return document.head.querySelector("[name~=csrf-token][content]").content;
}

/**
 * Fetch personalizado para recibir respuestas y errores desde laravel
 * 
 * Es necesario enviar la información con las funciones successFetch o errorFetch
 * provistas en el controlador padre en laravel.
 */
export default async function useFetch(url, data = {}, method = 'get') {
    let response = null;

    let options = (method == 'get') ?
        {
            method: method,
            cache: 'no-cache'
        } : {
            method: method,
            cache: 'no-cache',
            credentials: "same-origin",
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": getToken()
            },
            body: JSON.stringify(data)
        }

    await fetch(url, options)
        .then((res) => res.json())
        .then((res) => {
            if(res.status != 200) {
                Notify.error(res.message);
                throw new Error(res.message);
            } else {
                response = res;
            }
        });
    
    return response;
}