/*
File: catchsquare.js
Name: Erik Cohen
Class: CS 325, January 2022
Lab: 6
Due date: Sat, January 15 at 11:59pm
*/
"use strict";
var stop = false;
function randInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}
function randomColor(){
    let hex = Math.floor(Math.random()*16777215).toString(16);
    return '#' + hex;
}
function change_Square(square){
    const rand_x = randInt(0,748);
    const rand_y = randInt(0,248);
    square.style.backgroundColor = randomColor();
    square.style.left = rand_x + "px";
    square.style.top = rand_y + "px";
}
function initializeSquare(area){
    let square = document.createElement("div");
    square.setAttribute("id", "gameobj")
    square.setAttribute("class", "square");
    change_Square(square);
    area.append(square);
    return square;
}
function update_square(square){
    let left = parseInt(square.style.left.substring(0,square.style.left.length-2));
    let top = parseInt(square.style.top.substring(0,square.style.top.length-2));
    let x = randInt(left - 60, left + 60);
    let y = randInt(top - 60, top + 60);
    if(x<0){
        x = 0;
    }
    if(x>748){
        x=748;
    }
    if(y>248){
        y=248;
    }
    if(y<0){
        y=0
    }
    square.style.left = x + "px";
    square.style.top =  y + "px";
}
function check(start, allottedTime, square){
    let endTime = Date.now();
    if(endTime-start > allottedTime){
        square.innerText = "Game Over";
        stop = true;
    };
}

window.onload = function(){
    let allottedTime = 3000;
    let caughtSquares = 0;
    const score = document.getElementById("result");
    const area = document.getElementById("rectanglearea");
    setTimeout(function(){
        let start = Date.now();
        let square = initializeSquare(area);
        var intervalID = setInterval(update_square, 500, square);
        var game = setInterval(check, 100, start, allottedTime, square);
        square.onmousedown = function(){
            if (!stop){
                allottedTime = (allottedTime - 100);
                caughtSquares += 1;
                change_Square(square);
                score.innerText=caughtSquares;
                start = Date.now();
            };
        };
    },5000);
}
