/* 
 * Author: Cody Chase
 * Date: Feb 11, 2016
 * Name: loadJSONDoc.js
 * The function defined in this file loads an external JSON file
 * and returns the JSON object defined in the file.
 */

//create a function that loads JSON with the file name needed
function loadJSON(file) {
    var xmlHttp;

    //create an XMLHttpRequest object
    if (window.XMLHttpRequest) {
        xmlHttp = new XMLHttpRequest();
    }
    else {
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    //define an asynchronous request
    xmlHttp.open("GET", file, false);
    xmlHttp.send();
    return JSON.parse(xmlHttp.responseText);
}