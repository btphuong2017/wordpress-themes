// --------------
// @Rules Images
// --------------
module.exports = {
    test: /\.(png|svg|jpg|jpeg|gif|ico)$/,
    use: [{
        loader: 'url-loader',
        options: {
            name: '[hash]-[name].[ext]',
            limit: '8000',
            outputPath: 'images/',
            publicPath: 'images/'
        }
    }]
};