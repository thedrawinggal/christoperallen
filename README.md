# components
## component stylesheets
any component abstracted into a seperate `.php` file should have its own stylesheet. common component stylesheets should be imported directly into `bundle.scss`, while components unique to a single page should be imported into the corresponding page level stylesheet, and the page level stylesheet should then be imported into `bundle.scss`.

## gulp
this theme uses a number of gulp tasks to help with development. if you haven't used gulp before, you will need to add the gulp-cli to your machine:

`npm install --global gulp-cli`

---

## install
navigate to the `cltv8-base-theme` directory, and install the required node modules:

`npm install`

## running the project locally
run the project at the `cltv8-base-theme` directory level:

`npm run start`

this will open a browswer at `localhost:3000` that will refresh on change with browsersync. the browsersync proxy is set to `localhost:8888` by default.

## building for production
when you are ready to build for production, at the `cltv8-base-theme` directory level -

clean the `dist` directory:

`gulp clean`

rebuild the `dist` directory with the production build scripts:

`npm run build`
