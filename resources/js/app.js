import "preline";
import 'flowbite';
import $ from 'jquery';
import 'select2';
import 'select2/dist/css/select2.min.css';

window.$ = $;
window.jQuery = $;


document.addEventListener("livewire:navigating", () => {
    // Mutate the HTML before the page is navigated away...
    initFlowbite();
});

document.addEventListener("livewire:navigated", () => {
    // Reinitialize Flowbite components
    initFlowbite();
});