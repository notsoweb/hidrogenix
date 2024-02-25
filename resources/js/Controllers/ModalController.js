import { ref } from 'vue';

/**
 * Controlador simple de las bandejas
 */
class ModalController
{
    // Modals
    confirmModal   = ref(false);
    destroyModal   = ref(false);
    editModal      = ref(false);
    noteModal      = ref(false);
    manyNotesModal = ref(false);
    showModal      = ref(false);

    // Models
    modelModal     = ref({});
    
    constructor() {}

    /**
     * Controla el cambio entre show y edit
     */
    switchShowEditModal = () => {
        this.showModal.value = !this.showModal.value
        this.editModal.value = !this.editModal.value
    };

    /**
     * Controla el switch de eliminar
     */
    switchShowModal = (model) => {
        this._setModel(model);
        this.showModal.value = !this.showModal.value
    };

    /**
     * Controla el switch de eliminar
    */
   switchEditModal = (model) => {
        this._setModel(model);
        this.editModal.value = !this.editModal.value
    };

    /**
     * Controla el switch de eliminar
     */
    switchDestroyModal = (model) => {
        this._setModel(model);
        this.destroyModal.value = !this.destroyModal.value
    };

    /**
     * Controla el switch de nota
     */
    switchNoteModal = () => {
        this.noteModal.value = !this.noteModal.value
    };

    /**
     * Controla el switch de notas aplicadas a muchos
     */
    switchManyNotesModal = () => {
        this.manyNotesModal.value = !this.manyNotesModal.value
    };

    /**
     * Controla el switch de nota
     */
    switchConfirmModal = () => {
        this.confirmModal.value = !this.confirmModal.value
    };

    /**
     * Guarda el modelo
     */
    _setModel = (model) => {
        if(model) {
            this.modelModal.value = model;
        }
    }
}

export default ModalController;