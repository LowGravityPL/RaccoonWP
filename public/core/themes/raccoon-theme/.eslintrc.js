module.exports = {
	"extends":       "eslint:recommended",
	"env":           {
		"browser": true,
		"es6":     true,
	},
	"parserOptions": {
		"ecmaVersion": 6,
		"sourceType":  "module",
	},
	"rules":         {
		"linebreak-style": ["error", "unix"],
		"semi":            ["error", "always"],
		"comma-dangle":    ["error", "always"],
		"no-console":      "warn",
		"no-alert":        "warn",
	}
};