import { ref } from "vue";

/**
 * Debido a la propia naturaleza reactiva de vue, hay datos que solo existen mientras se
 * este en un componente o pagina.
 * 
 * Este elemento permite mantener datos en todas las paginas siempre y cuando no se recargue la pagina.
 */
class SessionFresh {
    layout = false;
    header = false;
    sidebar = ref(true);

    constructor() {}

    isLayoutInitialized() {
        return this.init;
    }

    isHeaderInitialized() {
        return this.header;
    }

    startLayout() {
        this.init = true;
    }

    startHeader() {
        this.header = true;
    }

    stop() {
        this.layout = false;
        this.header = false;
    }

    switchSidebar() {
        this.sidebar.value = !this.sidebar.value;
    }

    getSidebar() {
        return this.sidebar;
    }
}

export { SessionFresh }