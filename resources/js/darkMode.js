import { ref } from 'vue';

const mainPage = document.getElementById('main-page');
const theme = ref('');

const statusTheme = () => localStorage.theme === 'dark' || (!('theme' in localStorage));

const verifyDarkMode = () => {
    (statusTheme())
        ? mainPage.classList.add('dark')
        : mainPage.classList.remove('dark')
}

const darkMode = (active = true) => {
    theme.value = (active)
        ? 'dark'
        : 'light'

    localStorage.theme = theme.value;

    verifyDarkMode();
}

const bootTheme = () => darkMode(statusTheme());

export {
    bootTheme,
    darkMode,
    theme,
    verifyDarkMode
}