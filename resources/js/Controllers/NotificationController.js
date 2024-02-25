import { ref } from 'vue';
import { router } from '@inertiajs/vue3';

const hasNotifications = import.meta.env.VITE_PUSHER_NOTIFICATIONS;

/**
 * Controlador simple de notificaciones en tiempo real
 */
class NotificationControllerx
{
    userId        = ref(0);
    counter       = ref(0);
    notifications = ref([]);
    started       = ref(false);

    constructor() {}

    /**
     * Retorna estado del servicio
     */
    isStarted = () => {
        return this.started.value;
    }

    /**
     * Inicia el servicio
     */
    start = (userId) => {
        if(!this.started.value && hasNotifications == 'true') {
            this.userId.value = userId;
            
            this._suscribeGLobalNotification();
            this._suscribeUserNotification((notification) => {
                Notify.flash({
                    message: notification.message,
                    type: notification.icon,
                    timeout: notification.timeout
                });
                this.getUpdates();
            });
            
            this.getUpdates();
            this.started.value = true;

            console.log('Notificaciones activas');
        }
    }

    /**
     * Detiene el servicio
     */
    stop = () => {
        if(this.started.value) {
            this._unsuscribeUserNotification();
            this._unsuscribeGlobalNotification();

            this.started.value = false;
        }
    }

    /**
     * Marcar notificación como leída
     */
    read = id => {

    }

    /**
     * Abre la página con los detalles de la notificación
     */
    show = id => {
        router.post(route('dashboard.notifications.store'), {
            id:id
        }, {
            onSuccess: () => this._subtractCounter()
        });
    }

    /**
     * Obtener notificaciones actualizadas
     */
    getUpdates = () => {
        this.counter.value = 0;

        axios.get(route('dashboard.users.notifications'))
        .then((r) => {
            r.data.notifications.forEach(e => {
                if(e.read_at == null) {
                    this._addCounter();
                }
            });

            this.notifications.value = r.data.notifications;
        })
        .catch((e) => {
            Notify.error(e.message);
        });
    }

    /**
     * Suscribe a las notificaciones especificas del usuario
     * 
     * * @param {Callback} callable Callable de la acción a detonar una vez que se recibe la notificación
     */
    _suscribeUserNotification = (callable) => {
        Echo.private(`App.Models.User.${this.userId.value}`)
        .notification(notification => {
            callable(notification)
        });
    }

    /**
     * Cierra la conexión con las notificaciones privadas del usuario
     */
    _unsuscribeUserNotification = () => {
        Echo.leave(`App.Models.User.${this.userId.value}`);
    }

    /**
     * SUscribe a las notificaciones globales
     * 
     * Estas no se almacenan, solo se muestran
     */
    _suscribeGLobalNotification = () => {
        Echo.private('notifications')
        .listen('GlobalNotification', e => Notify.info(e.message, e.timeout));
    }

    /**
     * DEtiene las notificaciones globales
     */
    _unsuscribeGlobalNotification = () => Echo.leave('notifications');

    /**
     * Agregar contador no leídos
     */
    _addCounter = () => {
        this.counter.value++;
    }

    /**
     * Restar contador no leídos
     */
    _subtractCounter = () => {
        if (this.counter.value > 0){
            this.counter.value--;
        }
    }
}

/**
 * Inicio el controlador desde el archivo, esto permite que cuando lo llame
 * en algún otro archivo, la instancia se mantenga siempre y cuando no se reinicie
 * la página web.
 */
const NotificationController = new NotificationControllerx();

export default NotificationController;