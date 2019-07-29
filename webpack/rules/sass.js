// --------------
// @Rules SASS
// --------------
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
module.exports = {
    test: /\.(scss|sass|css)/,
    use: [{
            loader: MiniCssExtractPlugin.loader,
            options: {
                publicPath: '../',
                hmr: process.env.NODE_ENV === 'development'
            },
        },
        {
            loader: 'css-loader'
        },
        {
            loader: 'sass-loader'
        }
    ]
};