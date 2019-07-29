module.exports = {
    test: /\.(otf|woff|woff2|eot|ttf|otf)$/,
    use: [{
        loader: 'url-loader',
        options: {
            name: '[name].[ext]',
            outputPath: 'fonts/',
            publicPath: 'fonts/'
        }
    }]
}