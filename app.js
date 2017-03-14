var bs = require("browser-sync").create();


// Start a Browsersync proxy
bs.init({
    proxy: "http://homeworks/homework3.php"
});

bs.watch('*.php').on('change', bs.reload);