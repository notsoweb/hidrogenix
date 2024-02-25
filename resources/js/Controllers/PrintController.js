import { ref } from 'vue';
import axios from 'axios';

/**
 * Controla la generación de impresiones
 */
class PrintController
{
    invoices = ref(false);
    
    constructor({route, meta, params = {}, name = "Comprobante", type='pdf'}) {
        this.route  = route;
        this.meta   = meta;
        this.params = params;
        this.name   = name;
        this.type   = type;
    }

    /**
     * Manda la orden de impresión y descarga
     */

    download = (data = {}) => {
        Notify.info('Generando archivo, espere ...');

        axios({
            url: route(this.route, this.params),
            method: 'POST',
            data: {
                meta: this.meta,
                data: data
            },
            responseType: 'blob'
        }).then((response) => {
            const href = URL.createObjectURL(response.data);

            const link = document.createElement('a');
            link.href = href;
            link.setAttribute('download', `${this.name}.${this.type}`);
            document.body.appendChild(link);
            link.click();

            document.body.removeChild(link);
            URL.revokeObjectURL(href);
            Notify.info('Archivo generado');
        }).catch(err => {
            Notify.error('Error al generar');
        });
    }
}

export default PrintController;