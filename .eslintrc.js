// eslint-disable-next-line import/no-commonjs,unicorn/prefer-module,no-undef
module.exports = {
  root: true,
  extends: [
    '@maicol07'
  ],
  rules: {
    'import/prefer-default-export': 'warn',
    'max-len': ['error', { code: 200 }],
    'consistent-return': 'off'
  }
};
