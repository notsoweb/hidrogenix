<script setup>
import Item            from '@/Components/Dashboard/Help/Item.vue';
import PageHeader      from '@/Components/Dashboard/PageHeader.vue';
import Log             from '@/Components/Dashboard/Logs/Item.vue';
import Table           from '@/Components/Dashboard/Table.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';

defineProps({
    users: String
});
</script>

<template>
  <DashboardLayout :title="$t('changelogs.title')">
    <PageHeader />
    <div class="w-full">
      <div class="mt-4">
        <p
          v-text="$t('changelogs.description')"
        />
      </div>
    </div>
    <div class="w-full">
      <Table :items="{total:1}">
        <template #head>
          <th
            class="table-item"
            v-text="$t('version')"
          />
          <th
            class="table-item"
            v-text="$t('description')"
          />
        </template>
        <template #body>
          <!-- <Item version="1.y.z">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-01-01</p>
              <ul class="list-disc list-inside text-left">
                <Log type="UPDATE" text=""/>
              </ul>
            </div>
          </Item> -->
          <Item version="1.2.5">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-12-20</p>
              <ul class="list-disc list-inside text-left">
                <Log type="UPDATE" text="Reestructurar componente selectable."/>
                <Log type="FIX" text="Falta de referencia a computed en componente Textarea."/>
              </ul>
            </div>
          </Item>
          <Item version="1.2.4">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-11-26</p>
              <ul class="list-disc list-inside text-left">
                <Log type="UPDATE" text="Mostrar nombre del rol en vez de su código al editar roles de usuario."/>
              </ul>
            </div>
          </Item>
          <Item version="1.2.3">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-09-14</p>
              <ul class="list-disc list-inside text-left">
                <Log type="FIX" text="Sincronización de roles de los usuarios."/>
              </ul>
            </div>
          </Item>
          <Item version="1.2.2">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-09-11</p>
              <ul class="list-disc list-inside text-left">
                <Log type="DOC" text="Actualización de la documentación"/>
                <Log type="UPDATE" text="Actualización de dependencias NOTSOWEB."/>
              </ul>
            </div>
          </Item>
          <Item version="1.2.1">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-09-09</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Separar en un archivo de configuración los colores de la página."/>
                <Log type="FIX" text="Posicionamiento del copyright en el menú cuando este esta lleno."/>
              </ul>
            </div>
          </Item>
          <Item version="1.2.0">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-08-30</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Modo oscuro."/>
                <Log type="FIX" text="Colores de determinados elementos."/>
                <Log type="UPDATE" text="Transiciones al modo oscuro."/>
                <Log type="UPDATE" text="Globalización del tiempo de las transiciones."/>
                <Log text="Preservar el estado de menú. (Recuerda si quedo abierto o cerrado)"/>
                <Log text="Actualización automática de la aplicación por medio de webhook. (Probado solo con gitea)"/>
              </ul>
            </div>
          </Item>
          <Item version="1.1.0">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-06-21</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Modo oscuro."/>
                <Log type="FIX" text="Paginación en tablas."/>
                <Log type="FIX" text="Colores de determinados elementos."/>
              </ul>
            </div>
          </Item>
          <Item version="1.0.7">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-06-09</p>
              <ul class="list-disc list-inside text-left">
                <Log type="FIX" text="Desbordamiento de diseño."/>
              </ul>
            </div>
          </Item>
          <Item version="1.0.5">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-05-18</p>
              <ul class="list-disc list-inside text-left">
                <Log type="UPDATE" text="Mejora del script de cambio de permisos de archivos." />
                <Log type="UPDATE" text="Mejoras visuales en tablas." />
              </ul>
            </div>
          </Item>
          <Item version="1.0.4">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-04-19</p>
              <ul class="list-disc list-inside text-left">
                <Log type="UPDATE"  text="Mejoras en el sistema de notificaciones." />
              </ul>
            </div>
          </Item>
          <Item version="1.0.3">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-04-14</p>
              <ul class="list-disc list-inside text-left">
                <Log text="DELETE: Depuración de controladores no utilizados." />
                <Log text="UPDATE: Las notificaciones en tiempo real puede activarse y desactivarse desde el .env (requiere compilación)." />
              </ul>
            </div>
          </Item>
          <Item version="1.0.2">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-03-27</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Generar contraseñas aleatorias para los usuarios sembrados." />
              </ul>
            </div>
          </Item>
          <Item version="1.0.1">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-03-21</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Refactorización de código." />
                <Log text="Documentación de código." />
              </ul>
            </div>
          </Item>
          <Item version="1.0.0">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2023-03-20</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Versión estable." />
                <Log text="Historial de notificaciones." />
              </ul>
            </div>
          </Item>
          <Item version="0.1.0">
            <div class="flex flex-col w-full justify-start items-start">
              <p class="font-bold">2022-11-14</p>
              <ul class="list-disc list-inside text-left">
                <Log text="Inicio del proyecto." type="INIT" />
                <Log text="Sistema de usuarios básico." />
                <Log text="Sistema básico de usuarios." />
                <Log text="Sistema básico de roles." />
                <Log text="Sistema básico de notificaciones." />
              </ul>
            </div>
          </Item>
        </template>
      </Table>
    </div>
  </DashboardLayout>
</template>
