function myFunction(){

window.open("http://www.w3schools.com");

document.getElementById('body').className = 'possible';
};
setTimeout(function(){
    document.getElementById('possible').className = 'sa';
}, 5000);
var name;
// navigator.appName
alert(
navigator.appName
);
var p={
"firstName": ”Leslie",
"lastName": ”Carr",
"age": 43,
"address": {
"streetAddress": "21 Foo Str”, "city": "New York"
},
"powers": [1, 2, 4, 8, 16, 32]
}
alert(p.age);