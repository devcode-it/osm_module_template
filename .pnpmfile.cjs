// noinspection JSUnusedGlobalSymbols

function readPackage(pkg) {
  /** @type {object} */
  if (pkg.name === 'openstamanager') {
    pkg.peerDependencies = {
      ...pkg.dependencies,
      ...pkg.peerDependencies,
    }
  }
  return pkg;
}

module.exports = {
  hooks: {
    readPackage,
  },
};
