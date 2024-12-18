# Klaro UI

The Klaro consent manager custom UI for the California Digital Library.

View sample at https://cdlib.github.io/klaro-ui

## Requirements

- Git
- Node version 20 or above
- NPM version 10 or above
- Klaro source and a valid config file

## Installation

1. Follow the steps in [Getting Started](https://klaro.org/docs/getting-started) within the Klaro documentation.

2. Within the `src` URL of the Klaro script (after the config script), replace the URL ending in **klaro.js** with the "no CSS" version:

```
https://cdn.kiprotect.com/klaro/v0.7/klaro-no-css.js
```

3. From your CLI, install Klaro UI into your application as a dependency:

```
npm install https://github.com/cdlib/klaro-ui --save
```

The module **klaro-ui** is now installed in your application's **node_modules** folder.

4. From your bundler/build tool, source the `klaro-ui` stylesheet from the klaro-ui module:

```
/node_modules/klaro-ui/dist/klaro-ui.css
```

## Appearance

Klaro UI doesn't include any typefaces. The Klaro text will include the font defined for the document.

The Klaro UI default stylesheet renders a light colored theme when a user's system appearance is set to light colors and a dark colored theme when set to dark colors.

For only the light colored theme, use **klaro-ui-light.css** within **klaro-ui/dist**.

For only the dark colored theme, use **klaro-ui-dark.css** within **klaro-ui/dist**.
