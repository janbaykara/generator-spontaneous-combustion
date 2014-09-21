# Project Boilerplate
- Built on AngularJS + Foundation
- Developed with NPM, Bower, Gulp and SASS
- A general-purpose boilerplate for building all sorts of things.

### Configuration & Development Pointers

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