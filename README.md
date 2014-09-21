# Project Boilerplate
- Built on AngularJS + Foundation
- Developed with NPM, Bower, Gulp and SASS
- A general-purpose boilerplate for building all sorts of things.

### Environment requirements

Before you get cracking with the project, you need to do a one-off check for a few minor bits and bobs.

If you haven't already:
1. Install **NodeJS + NPM**:
  ` $ curl https://raw.githubusercontent.com/creationix/nvm/v0.16.1/install.sh | bash `
2. Install **Yo**:
  ` $ npm install -g yo `
  (an automagical boilerplate generator tool)
3. Install **Bower**:
  ` $ npm install -g bower `
  (a webdev package manager for things like *AngularJS*, *Foundation*; and...)
4. Install **Gulp**
  ` $ npm install -g gulp `
  (a webdev task runner watch the files in the project directory and automatically run tasks to compile SASS, optimise images, uglify files and all sorts of other magic.)

### Installation

#### Method 1: Git Clone
1. Clone this boilerplate to your project directory
2. In terminal, we need to install the common dependencies specified in `package.json` and `bower.json`
  - ` $ cd ~/your/project/dir `
  - ` $ sudo npm install `
  - ` $ bower install `
3. Now that all our dependencies are installed, we can start up Gulp and get working:
  - ` $ gulp `
  - (NB: Run this in the project directory whenever you're developing)

#### Method 2: Yo Generator
1. ` $ npm install -g generator-spontaneous-combustion `
2. ` $ cd ~/your/project/dir `
3. ` $ yo spontaneous-combustion ` 

### Configuration & Development Pointers

Run `gulp` in the project directory whenever developing.

#### Files & Directories

- `config.php`
  - All of the global definitions like project strings, file URLs and HTML scaffolding template are held here.

- `public`
  - The files here are what the front-end will see; they're built by Gulp from our `img`/`js`/`scss` files at the project root.

- `node_modules`
  - The files that NPM installs to make Gulp, Bower, etc. run. It's frickin' huge, so don't push it to a production environment.

#### Find-in-file codes
  - ` #   `: Prefix for find-in-file dev note comments
  - ` ??? `: Reconsider this codeblock in future
  - ` >>> `: Extend/expand this
  - ` <<< `: Reduce/contract this
  - ` +++ `: Add functionality
  - ` --- `: Remove functionality
  - ` !!! `: Fix incorrect functionality / error / glitch

### Notes/To Dos
- Setup yeoman generator
- Gulp improvements: http://yeoman.io/blog/performance-optimization.html
- RequireJS implementation
- Better SCSS concat & sourcemaps
- PHP -> HTML gulp task 