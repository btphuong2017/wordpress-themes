const webpack = require('webpack');
module.exports = new webpack.ProvidePlugin({
    $: "jquery",
    jquery: "jQuery",
    "window.jQuery": "jquery"
});