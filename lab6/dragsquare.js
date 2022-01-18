/*
File: dragsquare.js
Name: Erik Cohen
Class: CS 325, January 2022
Lab: 6
Due date: Sat, January 15 at 11:59pm
*/
"use strict";
function randInt(min, max) {
    return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function randomColor(){
    let hex = Math.floor(Math.random()*16777215).toString(16);
    return '#' + hex;
}

function initializeSquare(area){
    let square = document.createElement("div");
    square.setAttribute("class", "rectangle");
    const rand_x = randInt(0,748);
    const rand_y = randInt(0,248);
    square.style.backgroundColor = randomColor();
    square.style.left = rand_x + "px";
    square.style.top = rand_y + "px";
    area.append(square);
    return square;
}

window.onload = function(){
    let click = false;
    const body = document.body;
    const area = document.getElementById("rectanglearea");
    let square = initializeSquare(area);
    square.onmousedown = function(){
        click = true;
        console.log("press");
    }
    body.onmouseup = function(){
        click = false;
        console.log("depress");
    }
    area.addEventListener('mousemove', e => {
        if (click){
            let x = e.movementX;
            let y = e.movementY;
            let left = square.style.left;
            let top = square.style.top;
            square.style.left = (parseInt(left.substring(0,left.length-2)) + x) + "px";
            square.style.top = (parseInt(top.substring(0,top.length-2)) + y) + "px";
        }
    });
}
