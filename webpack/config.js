// ---------------
// @Webpack Config
// ---------------

// --------------------
// @Loading Depenencies
// --------------------
const path = require('path');
const manifest = require('./manifest');
const rules = require('./rules');
const plugins = require('./plugins');
const devServer = require('./devServer');
// ------------------
// @Entry Point Setup
// ------------------
const entry = {
    main: path.join(manifest.paths.input, manifest.entries.main),
    // vendor: manifest.entries.vendor
};

// -------------
// @Output Setup
// -------------
const output = {
    path: manifest.paths.output,
    publicPath: '../',
    filename: '[name].js'
}

// ---------------
// @Path Resolving
// ---------------
const resolve = {
    extensions: ['.webpack-loader.js', '.web-loader.js', '.loader.js', '.js'],
    modules: [
        path.join(__dirname, '../node_modules'),
        path.join(manifest.paths.input, '')
    ],
};

// ---------------
// @Watch Options
// ---------------
const watchOptions = {
    aggregateTimeout: 300,
    poll: 1000,
    ignored: ['node_modules']
};

// -----------------------------------------------------------------------------------
// @Optimization
// @Auto Import All File From Node_modules Folder Are Imported In Main.js To Vendor.js
// -----------------------------------------------------------------------------------
const optimization = {
    splitChunks: {
        chunks: 'all',
        cacheGroups: {
            vendors: {
                priority: 1,
                test: /[\\/]node_modules[\\/]/
            }
        },
        minChunks: 1,
        minSize: 0,
        name: 'vendor'
    }
};

// -----------------
// @Exporting Module
// -----------------
const config = {
    mode: manifest.IS_PRODUCTION ? 'production' : 'development',
    devtool: manifest.IS_PRODUCTION ? false : 'inline-source-map',
    context: path.join(manifest.paths.input, manifest.entries.main),
    watch: !manifest.IS_PRODUCTION,
    watchOptions,
    entry,
    output,
    module: {
        rules,
    },
    resolve,
    plugins,
    optimization,
    devServer
};
module.exports = config;