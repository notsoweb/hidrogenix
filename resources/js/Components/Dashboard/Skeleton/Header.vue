<script setup>
import { onMounted, reactive, ref } from 'vue';
import { router, Link} from '@inertiajs/vue3';
import { darkMode, theme, verifyDarkMode } from '@/darkMode';

import NotificationController from '@/Controllers/NotificationController';

import Dropdown         from '../../../Components/Dashboard/Dropdown.vue';
import DropdownLink     from '@/Components/Dashboard/DropdownLink.vue';
import NotificationLink from '@/Components/Dashboard/Skeleton/Header/NotificationLink.vue';
import GoogleIcon       from '@/Components/Shared/GoogleIcon.vue';

// Eventos
const emit = defineEmits([
  'open'
]);

// Propiedades
const props = defineProps({
  sidebar: Boolean
});

// Controladores
const notificationCtl = NotificationController;

// Variables de controladores
const notificationCounter = ref(notificationCtl.counter);
const notifications = ref(notificationCtl.notifications);

// Otras variables
const userId = router.page.props.user.id;

// 
const darkModeStatus = ref(theme);

// Métodos
const logout = () => {
  router.post(route('logout'), {}, {
    onBefore: () => {
      notificationCtl.stop();
    }
  });
};

onMounted(()=>{
  notificationCtl.start(userId);
});
</script>

<template>
    <header
      class="fixed px-2 w-[calc(100vw)] bg-page  md:bg-transparent transition-all duration-300 z-50"
      :class="{'md:w-[calc(100vw-16rem)]':sidebar,'md:w-[calc(100vw)]':!sidebar}"
    >
      <div class="my-2 flex px-6 items-center justify-between h-[2.75rem] rounded-lg bg-primary dark:bg-primary-dark text-white z-20 ">
          <GoogleIcon
            :title="$t('menu')"
            class="text-2xl mt-1 z-50"
            name="list"
            @click="emit('open')"
            outline
          />
        <div class="flex w-fit justify-end items-center h-14 header-right">
          <ul class="flex items-center space-x-2">
            <li v-if="darkModeStatus == 'light'">
              <GoogleIcon
                :title="$t('notifications.title')"
                class="text-xl mt-1"
                name="light_mode"
                @click="darkMode(true)"
              />
            </li>
            <li v-else>
              <GoogleIcon
                :title="$t('notifications.title')"
                class="text-xl mt-1"
                name="dark_mode"
                @click="darkMode(false)"
              />
            </li>
            <li class="pr-2">
              <div class="relative">
                <Dropdown align="right" width="72">
                  <template #trigger>
                      <GoogleIcon
                        :title="$t('notifications.title')"
                        class="text-xl mt-1"
                        name="notifications"
                      />
                    <span class="absolute top-1 -right-2 text-xs">
                      {{notificationCounter}}
                    </span>
                  </template>
                  <template #content>
                      <div class="block px-4 py-2 text-xs">
                          <p class="text-center font-bold text-black">{{$t('notifications.title')}}</p>
                      </div>
                      <div class="w-full">
                        <template v-for="notification in notifications">
                          <NotificationLink
                            as="button"
                            :icon="notification.data.icon"
                            :readAt="notification.read_at"
                            @click="notificationCtl.show(notification.id)"
                          >
                            <span class="truncate">
                              {{notification.data.message}}
                            </span>
                          </NotificationLink>
                        </template>
                        <template v-if="notifications.length < 1">
                          <NotificationLink
                            as="button"
                            icon="notifications"
                          >
                            <span class="truncate">
                              {{ $t('noRecords') }}
                            </span>
                          </NotificationLink>
                        </template>
                      </div>
                      <div class="border-t border-gray-100" />
                      <Link :href="route('dashboard.notifications.index')" class="inline-flex w-full py-1 justify-center bg-primary dark:bg-primary-dark hover:bg-secondary dark:bg-secondary-dark text-white transition">
                          {{$t('show.all')}}
                      </Link>
                  </template>
                </Dropdown>
              </div>
            </li>
            <li>
              <div class="relative">
                <Dropdown align="right" width="48">
                  <template #trigger>
                    <div class="flex space-x-4">
                      <button
                        v-if="$page.props.jetstream.managesProfilePhotos"
                        :title="$t('users.menu')"
                        class="flex items-center space-x-4 text-sm border-2 border-transparent rounded-full focus:outline-none transition"
                      >
                          <img 
                            class="h-8 w-8 rounded-full object-cover"
                            :alt="$page.props.user.name"
                            :src="$page.props.user.profile_photo_url"
                          >
                      </button>
                    </div>
                  </template>
                  <template #content>
                      <div class="text-center block px-4 py-2 text-sm text-gray-800 border-b truncate">
                        {{ $page.props.user.name }}
                      </div>
                      <DropdownLink :href="route('profile.show')">
                           {{$t('profile')}}
                      </DropdownLink>
                      <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                          API Tokens
                      </DropdownLink>
                      <div class="border-t border-gray-100" />
                      <form @submit.prevent="logout">
                          <DropdownLink as="button">
                               {{$t('auth.logout')}}
                          </DropdownLink>
                      </form>
                  </template>
                </Dropdown>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </header>
</template>