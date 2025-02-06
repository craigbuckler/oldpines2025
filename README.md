# Old Pines Hotel & Restaurant website

This repository is the source code for the 2025 release of the [Old Pines Hotel & Restaurant website](https://www.oldpines.co.uk/).

This is a static site built using [Publican](https://publican.dev/) and [esbuild](https://esbuild.github.io/). Configuration is defined in `publican.config.js` which constructs the site in the `./build/` directory.


## Development build

Build in development mode and watch for file changes with style hot reloading:

```bash
npm start
```


## Production build

Build minified files for production deployment:

```bash
npm run build
```


## Docker testing

To test the site in Apache and PHP, run a build then start a Docker container:

```bash
npm run docker:up
```

Terminate the container with:

```bash
npm run docker:dn
```
