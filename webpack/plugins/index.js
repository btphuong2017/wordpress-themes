const manifest = require('../manifest');
const plugins = [];
plugins.push(
    require('./cleanWebpackPlugin'),
    require('./miniCssExtractPlugin'),
    require('./uglifyjsWebpackPlugin'),
    require('./jquery')
);
module.exports = plugins;