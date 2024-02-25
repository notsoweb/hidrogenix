/**
 * Crea una nueva cookie
 * @param {*} cname Nombre
 * @param {*} cvalue Valor
 * @param {*} exdays Duración en días
 */
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/**
 * Retorna una cookie 
 * @param {*} cname Nombre
 * @returns 
 */
function getCookie(cname) {
  let name = cname + "=";

  let decodedCookie = decodeURIComponent(document.cookie);

  let ca = decodedCookie.split(';');

  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  
  return "";
}

/**
 * Verifica si una cookie existe
 */
function checkCookie(name) {
  let cookie = getCookie(name);
  
  if (cookie != "") {
    return cookie;
  }

  return false;
}

export {
    checkCookie,
    getCookie,
    setCookie
}