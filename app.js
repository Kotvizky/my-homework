var bs = require("browser-sync").create();


// Start a Browsersync proxy
bs.init({
    proxy: "http://homeworks"
});

bs.watch(['homework4/*.php', 'homework4/tpl/*.*']).on('change', bs.reload);