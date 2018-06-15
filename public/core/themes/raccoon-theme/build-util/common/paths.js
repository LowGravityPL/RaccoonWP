const path        = require("path");
const projectRoot = path.resolve(__dirname, "../../");

module.exports = {
	rootPath:   projectRoot,
	outputPath: path.join(projectRoot, "dist"),
	sourcePath: path.join(projectRoot, "assets")
};