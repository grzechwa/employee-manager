/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global module */

module.exports = function (grunt) {
    // Project configuration.
    grunt.initConfig({
	    pkg: grunt.file.readJSON("package.json"),
		autoprefixer: {
            options: {
              // Task-specific options go here. 
            },
            dist: {
               src: 'css/style.css',
               dest: 'css/styleprefixed.css'
            }
          },
        less: {
            develop : {
              options: {
       
              },
              files: {
              "res/css/main.css": "res/less/main.less"
              }
          }
        }
    });
    
    grunt.loadNpmTasks("grunt-autoprefixer");
    grunt.loadNpmTasks("grunt-contrib-less");
    
    grunt.registerTask("default", ['autoprefixer', 'less']);
};
