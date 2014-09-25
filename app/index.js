'use strict';
var util = require('util');
var exec = require('child_process').exec;
var spawn = require('child_process').spawn;
var path = require('path');
var yeoman = require('yeoman-generator');
var yosay = require('yosay');
var chalk = require('chalk');
var async = require('async');

var SpontaneousCombustionGenerator = yeoman.generators.Base.extend({
  initializing: function () {
    this.pkg = require('../package.json');
  },

  prompting: function () {
    var done = this.async();

    this.log(yosay(
      "Congratulations, you've opted for spontaneous combustion. Ignition in 5, 4, 3..."
    ));

    var prompts = [{
      name: "PROJECTNAME",
      message: "What is your project's name?"
    },{
      name: "PUBLISHER",
      message: "What's this project's client's name?"
    },{
      name: "DESCRIPTION",
      message: "Give the project a brief description."
    }];

    this.prompt(prompts, function (props) {
      this.PROJECTNAME  = props.PROJECTNAME;
      this.PUBLISHER    = props.PUBLISHER;
      this.DESCRIPTION  = props.DESCRIPTION;
      this.GITREPO      = props.GITREPO;

      done();
    }.bind(this));
  },

  writing: function () {
      this.directory('', '');

      var context = this;

      this.template("package.json", "package.json", context);
      this.template("bower.json", "bower.json", context);
      this.template("config.php", "config.php", context);
      this.template(".gitignore", ".gitignore", context);
  },

  install: function() {
      this.log(chalk.bgYellow.black("Project filestructure initialised."));
      
      this.installDependencies();
  },

  end: function () {
        this.log(chalk.bgYellow.black("Boom, and the project is ready."));
        this.log("\nYou should:\n\n- setup a git repo\n- run `gulp` whenever you're editing.");
        this.log("\nThat's all folks, get cracking ;)\n\n");
        return;
    }
});

module.exports = SpontaneousCombustionGenerator;
