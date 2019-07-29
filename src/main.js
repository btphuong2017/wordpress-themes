// -------------
// @Import SCSS
// -------------
import './main.scss';

// ------------------------
// @Import Utility Plugins
// ------------------------
import 'bootstrap';

// ---------------
// @Import Modules 
// ---------------
import { test, testJquery } from './js/test';

// ----------------------------------
// @Check Document Content Load State
// ----------------------------------
function ready(fn) {
    if (document.readyState != 'loading') {
        fn();
    } else {
        document.addEventListener('DOMContentLoaded', fn);
    }
}

// -------------
// Main JS
// -------------
ready(() => {
    console.log('Loaded');
    test('wordpress');
    testJquery();
});