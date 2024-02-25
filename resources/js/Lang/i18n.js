import { createI18n } from 'vue-i18n';
import en from './en.js';
import es from './es.js';

const lang = document.documentElement.lang;

const messages = {
    en,
    es
}

const i18n = createI18n({
  locale: lang,
  fallbackLocale:lang,
  messages
});

const t = (text) => {
  return i18n.global.t(text);
}

export {i18n, t};