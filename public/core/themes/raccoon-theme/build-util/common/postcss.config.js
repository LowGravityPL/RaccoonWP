const autoprefixer = require('autoprefixer');
const cssnano      = require('cssnano');

module.exports = {
	plugins: [
		autoprefixer({
			browsers: [
				'> 1%',
				'last 3 versions',
				'Safari >= 8',
				'IE >= 10'
			]
		}),
		cssnano()
	]
}