/* Author: Cody Chase
 * Date: 2/18/2016
 * Name: statecapitals.js
 * Description: this is the javascript file for the application.
 */

/*
 * variable for game duration in minutes.
 * This variable can be freely customized.
 */
var gameDuration = 5;

var score = 0;  //player's score
var count = -1;  //the number of States that have been played
var randomArray = generateRandomArray(0, 49); //an array of randoms with no repeat
var states = generateStatesArray(); //the array that stores all 50 states

//reference variable to a XMLHttpRequest object
var xmlHttp = createXmlHttpRequestObject();

//DOM objects
var objStart;
var objSkip;
var objState;
var objCapital;
var objTimer;
var objScore;

//this function creates a XMLHttpRequest object. It should work with most types of browsers.
function createXmlHttpRequestObject()
{
    // add your code here to create a XMLHttpRequest object compatible to most browsers
    if (window.ActiveXObject) {
        
        return new ActiveXObject("Microsoft.XMLHTTP");
        
    }
    
    //this is what shows up if the first statment isnt true
    else if (window.XMLHttpRequest) {
        return new XMLHttpRequest();
        return false;
    }

}

/*
 * This function makes asynchronous HTTP request using the XMLHttpRequest object.
 * It passes state and capital to a server script for processing.
 * This function is invoked when a keystroke is detected.
 */
function process(state, capital) {
    
    //add your code here to process ajax requests and handle server's responses
    xmlHttp.open("GET", "statecapitals.php?state=" + state + "&capital=" + capital, true);
    
    //handle responose
    xmlHttp.onreadystatechange = function () {
        
        if (xmlHttp.readyState === 4 && xmlHttp.status === 200) {
            
// extract server’s response
            response = xmlHttp.responseText;
            
//parse JSON object
            responseJson = JSON.parse(response);
            
//use the variable capital to get the response and handle it for the capital
            var capital = responseJson.capital;
            
        }
        
        
        

        /*This statement says that if you are correct with the capital then it will add
         * 2 points to the score on the page. changes the value of score every time.
         */
        if (capital === 1) {
            score = score + 2;
            objScore.innerHTML = score;
            showState();
        }
    };


    xmlHttp.send(null)
}



//initial actions to take when the page load
window.onload = function () {
    
    //initialize DOM object variables
    objStart = document.getElementById('start');
    objSkip = document.getElementById('skip');
    objState = document.getElementById('state');
    objCapital = document.getElementById('capital');
    objTimer = document.getElementById('timer');
    objScore = document.getElementById('score');

    //disable autocomplete feature provided by a browser.
    objCapital.setAttribute("autocomplete", "off");

    //place the focus into the textbox
    objCapital.focus();

    //disable these elements
    objState.disabled = true;
    objCapital.disabled = true;
    objSkip.disabled = true;

    //create the XMLHttpRequest object
    //xmlHttp = createXmlHttpRequestObject();

    //generaate an array of randoms between 0 and 49
    //randomArray = generateRandomArray(0, 49);
    //console.log(randomArray);
    //generate the array containing all 50 states
    //states = ;
    //console.log(states.length);
    //display the timer
    if (gameDuration < 10)
        objTimer.innerHTML = "0" + gameDuration + ":00";
    else
        objTimer.innerHTML = gameDuration + ":00";
};

/******************************************************************************
 * Display a new state. If all 50 states have been displayed,
 * it shows a message and enables some fields and disables other fields.
 *****************************************************************************/
function showState() {
    count++; //increments the counter
    if (count > 49) {  //All 50 states have been displayed.
        stopGame();
    }
    else { //display next state
        objState.value = states[randomArray[count]];
        //console.log(states.length);
        objCapital.value = '';
        objCapital.focus();
    }
}
/******************************************************************************
 *Handle keystrokes. Onlye the letter keys and enter key are handled. Other
 *keys are ignored. If a letter key is pressed, the process function is called.
 *****************************************************************************/
function handleKeyUp(e) {
    // get the event for different browsers
    e = (!e) ? window.event : e;

    //If a letter key is pressed, retrieve state and capital and then call the process function
    if (e.keyCode >= 65 && e.keyCode <= 90) {
        var state = trim(objState.value);
        var capital = trim(objCapital.value);
        process(state, capital);
        return;
    }

    // the Enter key is pressed, skip to next state.
    if (e.keyCode === 13) {
        showState();
        return;
    }
}

/******************************************************************************
 * This function is called when a game starts. When the game starts, some fields
 * need to be disabled, and others need to be enabled.
 * It starts the timer and displays a state.
 ****************************************************************************/
var seconds;
var minutes;
var timer;

//Let's start the game
function startGame() {
    toggleControls();

    //Initialize variables
    minutes = gameDuration;
    seconds = 0;
    score = 0;
    count = -1;

    //stop existing timer
    clearInterval(timer);

    //start the timer
    timer = setInterval("displayTimer()", 1000);

    //display a state
    showState();
}

/******************************************************************************
 * This function is called when the game is over.
 *****************************************************************************/
function stopGame() {
    toggleControls();
    objState.value = '';

    //stop the current timer
    clearInterval(timer);
}

//toggle controls
function toggleControls() {
    objState.disabled = !objState.disabled;
    objCapital.disabled = !objCapital.disabled;
    objStart.disabled = !objStart.disabled;
    objSkip.disabled = !objSkip.disabled;
}

/******************************************************************************
 * The following code creates and displays a countdown timer.
 *****************************************************************************/
function displayTimer() {
    if (minutes === 0 && seconds === 0) {
        //time is up. stop the timer and the game
        stopGame();
    }
    else {
        if (seconds === 0) {
            seconds = 60;
            minutes--;
        }
        seconds--;
    }
    //display a leading 0 if minutes or seconds have only one digit.
    strSeconds = (seconds < 10) ? ("0" + seconds) : seconds;
    strMinutes = (minutes < 10) ? ("0" + minutes) : minutes;
    objTimer.innerHTML = strMinutes + ":" + strSeconds;
}

/*******************************************************************************
 * This function stores all 50 states in an array.
 ******************************************************************************/

function generateStatesArray() {
    return new Array(
            "Alaska",
            "Alabama",
            "Arkansas",
            "Arizona",
            "California",
            "Colorado",
            "Connecticut",
            "Delaware",
            "Florida",
            "Georgia",
            "Hawaii",
            "Iowa",
            "Idaho",
            "Illinois",
            "Indiana",
            "Kansas",
            "Kentucky",
            "Louisiana",
            "Massachusetts",
            "Maryland",
            "Maine",
            "Michigan",
            "Minnesota",
            "Missouri",
            "Mississippi",
            "Montana",
            "North Carolina",
            "North Dakota",
            "Nebraska",
            "New Hampshire",
            "New Jersey",
            "New Mexico",
            "Nevada",
            "New York",
            "Ohio",
            "Oklahoma",
            "Oregon",
            "Pennsylvania",
            "Rhode Island",
            "South Carolina",
            "South Dakota",
            "Tennessee",
            "Texas",
            "Utah",
            "Virginia",
            "Vermont",
            "Washington",
            "Wisconsin",
            "West Virginia",
            "Wyoming"
            );
}

//generate an array of randoms with no repeat
function generateRandomArray(min, max) {
    var o = [];
    while (max >= min) {
        o.push(max--);
    }

    for (var j, x, i = o.length; i; j = parseInt(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x)
        ;
    return o;
}

/* A home-made trim function that removes leading and
 * trailing whitespace characters from a string
 */
function trim(str) {
    return str.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}