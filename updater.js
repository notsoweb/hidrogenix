/**
 * Dependencias
 */
const env = require('dotenv')
const util = require('util')
const express = require('express')
const { exec } = require('child_process');
const Pusher = require("pusher");

/**
 * Importar configuraciones
 */
env.config()
const notifySettings = {
  appId: process.env.PUSHER_APP_ID,
  key: process.env.PUSHER_APP_KEY,
  secret: process.env.PUSHER_APP_SECRET,
  cluster: process.env.PUSHER_APP_CLUSTER,
  host: process.env.PUSHER_HOST,
  port: process.env?.PUSHER_PORT ?? 80,
  forceTLS: (process.env.PUSHER_SCHEME == 'https') ? true : false,
  useTLS: (process.env.PUSHER_SCHEME == 'https') ? true : false,
  enableStats: false,
  enabledTransports: ['ws', 'wss'],
}

/**
 * Iniciar objetos
 */
const app    = express()
const shell  = util.promisify(exec)
const client = new Pusher(notifySettings);

/**
 * Configuraciones
 */
app.use(express.json());

/**
 * Rutas
 */
app.get('/', async(req, res) => {
    res.send({
        status: 200,
        message: 'Welcome'
    })
})

app.post('/update', async(req, res) => {
  const body   = req.body;
  const branch = process.env?.REPOSITORY_BRANCH ?? 'main'
  const ref    = `refs/heads/${branch}`

  if(body.ref == ref) {
    notify({message: 'Iniciando actualización.'})
    notify({message: 'Descargando cambios...'})
    
    exec(`git pull origin ${branch}`, async(error, stdout, stderr) => {
      if (error) {
        console.error(`error: ${error.message}`);
        return;
      }
    
      if (stderr) {
        console.error(`stderr: ${stderr}`);
  
        notify({message: 'Copilando aplicación...'})
  
        await shell(`npm run build`)
  
        notify({message: 'Actualización terminada, recargue la página.'})
  
        return;
      }
    });
  
    res.send({
        'status':200,
        'message':'Init process'
    });
  } else {
    res.send({
      'status':200,
      'message':'No ref match'
  });
  }

});

app.listen(process.env?.REPOSITORY_WATCHER_PORT ?? 3001, '127.0.0.1', () => {
    console.log(`Server started`)
});

function notify({
  channel = 'private-notifications',
  event = 'App\\Events\\GlobalNotification',
  message = 'Success.',
  type = 'success'
}) {
  if(process.env.PUSHER_NOTIFICATIONS == 'true') {
    try {
      client.trigger(channel, event, { message, type, timeout: 15 }).then((e) => {
        
      });
    } catch (error) {
      console.error(error);
    }
  }
}
