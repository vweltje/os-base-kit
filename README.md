# OS Base Theme

Wordpress default theme & components for [Oddessey Solutions](http://oddesseysolutions.nl).

#### Dependencies

- [Laravel-mix](https://laravel.com/docs/6.x/mix): for compiling assets (js & scss)
- [Ftp](https://www.npmjs.com/package/ftp): for uploading files to remote
- [Fs](https://nodejs.org/docs/latest/api/fs.html): to monitor file changes
- [Node](https://nodejs.org/en/)
- [npm](https://docs.npmjs.com/getting-started/installing-node)

## Development

```
npm run watch
```

This will start webpack which will compiles our assets and uploads changed files to the remote server (if required).
Changes code in `sources/`, all files will be compiled automatically and copy to the root directory of the theme.

If running for the first time. there is a one time setup to run through:

## Setting up local environment

You will need to have a local server with database running.
I recommend using [Laravels Valet](https://laravel.com/docs/5.8/valet), but basically anything allowing you to run php and have a mysql database will do the trick! Just make sure your PHP version is at least 7.1 or higher.

## Installation:

- Clone or download the repo into your theme folder
- Open terminal and `cd` to this directory
- Run the install: `npm install`
- (optional) set your ftp details in `webpack.mix.js`
- When it has finished, run `npm run watch`
- Start coding

## Plugins

### Advanced Custom Fields Pro (ACF)

For custom fields on pages and post types [Advanced Custom Fields Pro](https://www.advancedcustomfields.com/pro/) is used. Add your copy of ACF pro to the plugin folder.

### Custom Post Type UI

To provide our site with custom post types and taxonomies the plugin [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/) is used. You can install this plugin inside the plugin tab on the admin page.

## Inspired by

- [wp-flex-kit](https://github.com/thriveweb/wp-flex-kit)
- [flex-with-benefits](https://github.com/Jinksi/flex-with-benefits)
