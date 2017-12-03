var express = require('express');
var app = express();
var url = require('url');
var req = require('request');
var Twitter = require('twitter');
var bodyParser = require('body-parser');
var multer = require('multer'); // v1.0.5
var upload = multer(); // for parsing multipart/form-data
var client = new Twitter ({
	consumer_key: 'fZ9uchvmhnMMORpGxAlws2kdr',
	consumer_secret: 'dgwRhe9sqZkqPsCH1EqifYArEnzo8wQfJVqo6mO7rmiqQp8HbB',
	access_token_key: '861032918042292224-PgnjAIHNfgpqrU97kQHjCgvSwt6sg2r',
	access_token_secret: 'WXMCw7NzSJgwShEb8zM8zg2gVAr104jVH1JbcO695ArBa'
});
var jsonChunk = "JSON not set yet";
var hashtag = "hashtag not set yet";
var clientResponse =" not set";
app.set('port', (process.env.PORT || 5000));

app.use(express.static(__dirname + '/public'));
app.use(bodyParser.json()); // for parsing application/json
app.use(bodyParser.urlencoded({ extended: true })); // for parsing application/x-www-form-urlencoded
// views is directory for all template files
app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');

app.get('/', function(request, response) {
	response.render('pages/disect')
});

app.post('/requestdata', setSearchParameters, handleSearch);



app.listen(app.get('port'), function() {
  console.log('Node app is running on port', app.get('port'));
});

function search(callback) {
	client.get('search/tweets', {q: hashtag, lang: 'en', count: 10}, function(error, tweets, response) {
		jsonChunk = response.body;
		console.log(jsonChunk);
		callback();
	});
}

function handleSearch(request, response) {	
	search(sendResponse);
}

function sendResponse() {
	clientResponse.send(jsonChunk);
}

function setSearchParameters(request, response, next) {
	clientResponse = response;
	hashtag = request.body.hashtag;
	next();
}