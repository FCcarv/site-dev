module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": "eslint:recommended",
    "overrides": [
    ],
    "parserOptions": {
        "ecmaVersion": "latest",
        "sourceType": "module"
    },
    "rules": {
        semi: ['error', 'always'],//coloca (;) no final
        quotes: ['error', 'doble','single'],//aspas duplas
        indent: ['error', 2],//identaçao 
        'comma-spacing': ['error', { before: false, after: true }]
    }
}
