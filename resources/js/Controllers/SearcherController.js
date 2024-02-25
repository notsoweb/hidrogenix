import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

/**
 * Controlador simple de las bandejas
 */
class SearcherController
{
    query = ref('');
    
    constructor(route, params) {
        this.route = route;
        this.params = params;
    }

    /**
     * Búsqueda simple
     */
    search = (q = '', params) => {
        this.query.value = q;
        router.get(this._getRoute(), {
            q,
            ...params
        }, {preserveState: true});
    };

    /**
     * Paginación simple
     */
    withPagination = (page, params) =>  {
        router.get(this._getRoute(), {
            page,
            ...params
        }, {preserveState: true});
    }

    /**
     * Búsqueda con paginación en tablas
     */
    searchWithPagination = (page, params) =>  {
        router.get(page, {
            q: this.query.value,
            ...params
        }, {preserveState: true});
    }

    /**
     * Búsqueda con páginación en bandejas
     */
    searchWithInboxPagination = (page, params) =>  {
        router.get(page, {
            q: this.query.value,
            ...params
        }, {preserveState: true});
    }

    /**
     * Obtiene la ruta segun los parametros
     */
    _getRoute = () => {
        return (this.params)
            ? route(this.route, this.params)
            : route(this.route);
    }
}

export default SearcherController;