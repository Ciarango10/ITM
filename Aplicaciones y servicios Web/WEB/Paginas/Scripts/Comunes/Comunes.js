function FormatoMiles(Valor) {
    return "$ " + Intl.NumberFormat('es-CO').format(Valor);
}
function FechaHoy() {
    let now = new Date();
    return now.toISOString().split('T')[0];
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
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