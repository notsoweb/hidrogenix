import { ref } from 'vue';

/**
 * Controlador simple de las bandejas
 */
class InboxController
{
    inboxIdSelected = ref([]);
    inboxNumberSelected = ref([]);
    selectAll = ref(false);
    
    constructor() {}

    /**
     * Selecciona todas las opciones visibles
     */
    onSelectAll = (elements) => {
        this.inboxIdSelected.value = [];
        this.inboxNumberSelected.value = [];

        this.selectAll.value = !this.selectAll.value;
    
        if(this.selectAll.value) {
            elements.data.forEach(element => {
                this.inboxIdSelected.value.push(element.id);
                this.inboxNumberSelected.value.push(element.number);
            });
        }
    }

    /**
     * Selecciona solo una opcion
     */
    onSelectOne = (invoice) => {
        this.inboxIdSelected.value.push(invoice.id);
        this.inboxNumberSelected.value.push(invoice.number);
    }

    /**
     * Permite que siempresea solo una opcion seleccionada
     */
    onlyOne = (invoice) => {
        this.clear();
        this.onSelectOne(invoice);
    }

    /**
     * Quita la seleccion
     */
    onUnselectOne = (invoice) => {
        this.inboxIdSelected.value = this.inboxIdSelected.value.filter(element => {
            return element !== invoice.id;
        });

        this.inboxNumberSelected.value = this.inboxNumberSelected.value.filter(element => {
            return element !== invoice.number;
        });
    }

    /**
     * Retorna todos los IDs de los elementos seleccionados
     */
    getIdSelections = () => {
        return this.inboxIdSelected.value;
    }

    /**
     * Trata al ID como si fueran muchos
     * 
     * Si no se pasa mimgun ID, se devolveran todos los elementos seleccionados almacenados
     */
    getAsMany = (id) => {
        return (id) ? [ id ] : this.getIdSelections();
    }

    /**
     * Retorna todos los numeros de las facturas/seleccionadas
     */
    getNumberSelections = () => {
        return this.inboxNumberSelected.value;
    }

    /**
     * Limpia los valores seleccionados
     */
    clear = () => {
        this.inboxIdSelected.value = [];
        this.inboxNumberSelected.value = [];
        this.selectAll.value = false;
    }

    /**
     * Limpia los valores seleccionados con una notificacion de exito
     */
    clearWithSuccess = (message) => {
        this.clear();

        Notify.success(message);
    }
}

export default InboxController;