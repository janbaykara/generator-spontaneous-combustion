# generator-spontaneous-combustion
- A general-purpose Yeoman generator for building all sorts of things.
- SCSS-styled, Foundation-frameworked, AngularJS-wired, PHP-infrastructued

### Environment requirements

Before you get cracking...

1. Install **NodeJS + NPM**:
  - ` $ curl https://raw.githubusercontent.com/creationix/nvm/v0.16.1/install.sh | bash `
  - ` $ nvm install v0.11.13 `
  - ` $ nvm alias default v0.11.13 `
2. Install **Yo**:
  - ` $ npm install -g yo `
3. Install **Bower**:
  - ` $ npm install -g bower `
4. Install **Gulp**
  - ` $ npm install -g gulp `

### Installation via Yo
1. ` $ npm install -g generator-spontaneous-combustion `
2. ` $ cd ~/your/project/dir `
3. ` $ yo spontaneous-combustion ` 

### Config & Dev

Run `gulp` in the project directory whenever developing.

#### Files & Directories

- `config.php`
  - Global definitions, project strings, file URLs and HTML scaffolding templates.

- `/public`
  - The files here are what the front-end will see; they're built by Gulp from our `img`/`js`/`scss` files at the project root.

#### Find-in-file code convention
  - ` #   `: Prefix for find-in-file dev note comments
  - ` ??? `: Reconsider this codeblock in future
  - ` >>> `: Extend/expand this
  - ` <<< `: Reduce/contract this
  - ` +++ `: Add functionality
  - ` --- `: Remove functionality
  - ` !!! `: Fix incorrect functionality / error / glitch

### Notes/To Dos

- [X] Setup yeoman generator
- [ ] Gulp improvements: http://yeoman.io/blog/performance-optimization.html
- [ ] RequireJS implementation
- [ ] Better SCSS concat & sourcemaps
- [ ] PHP -> HTML gulp task 
