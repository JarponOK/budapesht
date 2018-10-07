const path = require('path');

module.exports = {
  entry: './src/index.jsx',
  output: {
    path: path.resolve(__dirname, 'static'),
    filename: 'bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
        },
      },
    ],
  },
  resolve: {
    modules: [path.join(__dirname, 'node_modules'), 'node_modules'],
    extensions: ['.webpack.js', '.web.js', '.js', '.jsx', '.ts', '.tsx'],
  },
};
