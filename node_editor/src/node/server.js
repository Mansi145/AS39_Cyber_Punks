var log4js = require('log4js')
  , NodeVersion = require('./utils/NodeVersion')
  ;

log4js.replaceConsole();

NodeVersion.enforceMinNodeVersion('10.13.0');

NodeVersion.checkDeprecationStatus('10.13.0', '1.8.3');

var stats = require('./stats');
stats.gauge('memoryUsage', function() {
  return process.memoryUsage().rss;
});


var npm = require("npm/lib/npm.js");

npm.load({}, function() {
  var settings = require('./utils/Settings');
  var db = require('./db/DB');
  var plugins = require("./static/js/pluginfw/plugins");
  var hooks = require("./static/js/pluginfw/hooks");
  hooks.plugins = plugins;

  db.init()
    .then(plugins.update)
    .then(function() {
      console.info("Installed plugins: " + plugins.formatPluginsWithVersion());
      console.debug("Installed parts:\n" + plugins.formatParts());
      console.debug("Installed hooks:\n" + plugins.formatHooks());

      // Call loadSettings hook
      hooks.aCallAll("loadSettings", { settings: settings });

      // initalize the http server
      hooks.callAll("createServer", {});
    })
    .catch(function(e) {
      console.error("exception thrown: " + e.message);
      if (e.stack) {
        console.log(e.stack);
      }
      process.exit(1);
    });
});
