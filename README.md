# Klaro UI

The Klaro consent manager and custom UI for the California Digital Library.

View sample at https://cdlib.github.io/klaro-ui

## Installation

Klaro UI can be installed as-is for the Matomo service only, or customized for Matomo and additional services.

### Update Tracking Code

All installation options require modifying the tracking `<script>` tag of each service requiring user consent. This allows Klaro to enable tracking scripts when a user clicks "Allow all Cookies" or disable them when "Allow only necessary cookies" is clicked.

1. Locate the tracking code for each service in your site or app. For Wordpress sites, see Installing as a Wordpress Plugin section below.

2. For the Matomo service, change the begining of the `<script>` tag from this:
```
<script>
```
Or this:
```
<script type="application/javascript">
```
To this:
```
<script type="text/plain" data-type="application/javascript" data-name="matomo-tracking">
```

For tracking scripts other than Matomo, the `data-name` attribute above will be what is defined in a custom klaro configuration. See [Installing for Matomo and Additional Services](https://github.com/cdlib/klaro-ui/tree/dev?tab=readme-ov-file#installing-for-matomo-and-additional-services) below for more information.

### Installing for Matomo Service Only

If Matomo is the only service needed with Klaro, then Klaro UI can be installed as a Wordpress plugin or a Node module without any additional configuration.

#### Installing as a Wordpress Plugin

The following steps assume the Wordpress site is using the [Connect Matomo](https://wordpress.org/plugins/wp-piwik) plugin and that it is set using a manual tracking code.

1. From the Plugins page in Wordpress, locate the **Connect Matomo** plugin and click Settings.

2. Click the Enable Tracking tab. The text area with the Matomo script appears.

3. Update the tracking code `<script>` tag using the example provided in the [Update Tracking Code](https://github.com/cdlib/klaro-ui/tree/dev?tab=readme-ov-file#update-tracking-code) section above.

4. Click the Save Changes button.

5. Download the plugin file **klaro-ui-wordpress-plugin.zip** from the [latest release](https://github.com/cdlib/klaro-ui/releases) page.

6. Install the plugin and activate it within your Wordpress site. You will now see Klaro appear on your website as in [this sample](https://cdlib.github.io/klaro-ui).

#### Installing as a Node Module

1. From your CLI, install Klaro UI into your app or site as a dependency:

```
npm install https://github.com/cdlib/klaro-ui --save
```

The module **klaro-ui** is now installed in your app or site's **node_modules** folder. This includes three compiled stylesheets and a Klaro config JS file prebuilt for the Matomo service only.

1. From your bundler/build tool (webpack, Vite, Parcel, Rails asset pipeline, etc.), import one of the three `klaro-ui` stylesheets from within **klaro-ui/dist/**. Ignore the **klaro-ui/css/** prebuild files. The stylesheet `klaro-ui` is recommended over the other two options; see the [Appearance](https://github.com/cdlib/klaro-ui?tab=readme-ov-file#appearance) section below.

```
import 'klaro-ui/dist/css/klaro-ui.css'
```
2. Import the `klaro-config` script from within **klaro-ui/dist/**. Ignore the **klaro-ui/js/** prebuild files:
```
import 'klaro-ui/dist/js/klaro-config.js'
```

3. Update the tracking code `<script>` tag using the example provided in the [Update Tracking Code](https://github.com/cdlib/klaro-ui/tree/dev?tab=readme-ov-file#update-tracking-code) section above.

4. After relaunching your site, you should see Klaro appear on your website as in [this sample](https://cdlib.github.io/klaro-ui).

### Installing for Matomo and Additional Services

This installation option requires creating your own Klaro configuration script and using only the Klaro-UI styles.

1. Follow the steps in [Getting Started](https://klaro.org/docs/getting-started) within the Klaro documentation. You can adapt the [example Klaro config for Matomo](https://github.com/cdlib/klaro-ui/blob/main/js/klaro-config.js) used in Klaro-UI as a boilerplate for your custom Klaro instance.

2. From the [Getting Started](https://klaro.org/docs/getting-started) page, within the `src` URL of the Klaro script (after the config script), replace the URL ending in **klaro.js** with the "no CSS" version:

```
https://cdn.kiprotect.com/klaro/v0.7/klaro-no-css.js
```

3. Follow the steps for [installing Klaro UI as a node module](https://github.com/cdlib/klaro-ui?tab=readme-ov-file#installing-as-a-node-module). Skip the step for importing the `klaro-config` script.

## Verification

1. Open a browser and go to a page with Klaro UI installed.

2. Confirm that Klaro renders similar to [this sample](https://cdlib.github.io/klaro-ui).

3. Open the console in the browser's developer tools.

4. Find the output in the console matching this line:

`User consent for service matomo-tracking: false`

This confirms that the Klaro configuration is loading.

If additional services were added within a custom Klaro configuration, they will also appear like the line above in the console output.

5. From the developer tools inspector, find the Matomo tracking script. Confirm that the script's `type` attribute is `"text/plain"`. Confirm the same for other tracking scripts configured by Klaro.

6. Within the Klaro modal, click the button "Allow all cookies".

7. The Klaro modal should disappear and the following line should appear in the console:

`User consent for service matomo-tracking: true`

8. From the developer tools inspector, find the Matomo tracking script. Confirm that the Matomo script's `type` attribute is now `"application/javascript"`. Confirm the same for other tracking scripts configured by Klaro.

This confirms that Klaro is successfully enabling the tracking scripts upon user consent.

To repeat this verification, delete the `cdlib.org` cookies in your browser and reload the page.

## Appearance

Klaro UI doesn't include any typefaces. The Klaro text will use the font already defined for the document.

The default stylesheet **klaro-ui.css** renders a light colored theme when a user's system appearance is set to light colors and a dark colored theme when set to dark colors. This default appearance is recommended, as it's more accessible for users than the static light and dark themes listed below.

For only the light colored theme, use **klaro-ui-light.css** within **klaro-ui/dist/css**.

For only the dark colored theme, use **klaro-ui-dark.css** within **klaro-ui/dist/css**.
