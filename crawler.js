var request = require('request');
var cheerio = require('cheerio');
var URL = require('url-parse');

var http = require('http');
var fs = require("fs");
var hostname = '127.0.0.1';
var port = 3006;

var args = process.argv;
var pageToVisit = args[2];
var express = require('express')
var app = express()

console.log("Visiting page " + pageToVisit);

request(pageToVisit, function(error, response, body) {
   if(error) {
     console.log("Error: " + error);
   }
   // Check status code (200 is HTTP OK)
   console.log("Status code: " + response.statusCode);
   if(response.statusCode === 200) {
     // Parse the document body
	    var $ = cheerio.load(body);
	    $('*').each(function(){ 
		    var backImg;

		    if ($(this).is('img')) {
			console.log($(this).attr('src'));
		   
		    var util = require('util'),
		    exec = require('child_process').exec,
		    child,
		    url = $(this).attr('src');

		    child = exec('wget ' + $(this).attr('src'),
		    function (error, stdout, stderr) {
		      console.log('stdout: ' + stdout);
		      console.log('stderr: ' + stderr);
		      if (error !== null) {
		        console.log('exec error: ' + error);
		      }
		    });
		  }
	  });
   }
});

http.createServer(function(request, response) {

	if(request.url === "/index"){
		sendFileContent(response, "index.html", "text/html");
	}
	else if(request.url === "/"){
		response.writeHead(200, {'Content-Type': 'text/html'});
		response.write('<b>Hey there!</b><br /><br />This is the default response. Requested URL is: ' + request.url);
	}
	else if(/^\/[a-zA-Z0-9\/]*.js$/.test(request.url.toString())){
		sendFileContent(response, request.url.toString().substring(1), "text/javascript");
	}
	else if(/^\/[a-zA-Z0-9\/]*.css$/.test(request.url.toString())){
		sendFileContent(response, request.url.toString().substring(1), "text/css");
	}
	else{
		console.log("Requested URL is: " + request.url);
		response.end();
	}
}).listen(3006);

function sendFileContent(response, fileName, contentType){
	fs.readFile(fileName, function(err, data){
		if(err){
			response.writeHead(404);
			response.write("Not Found!");
		}
		else{
			response.writeHead(200, {'Content-Type': contentType});
			response.write(data);
		}
		response.end();
	});
}
