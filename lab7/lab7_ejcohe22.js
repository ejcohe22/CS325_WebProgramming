/*
File: lab7_ejcohe22.js
Name: Erik Cohen
Class: CS 325, January 2022
Lab: 6
Due date: Sat, January 15 at 11:59pm
*/

"use strict;"
function validatePassword(password) {
    let valid = true;
    // If password contains both lower and uppercase characters
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)){
            $("#case").css("color","green");
        }else{
            $("#case").css("color","red");
            valid = false;
        }
        // If it has numbers and characters
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)){
            $("#alphanum").css("color","green");
        }else{
            $("#alphanum").css("color","red");
            valid = false;
        }
        // If it has one special character
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)){
            $("#special").css("color","green");
        }else{
            $("#special").css("color","red");
            valid = false;
        }
        // If it has at least 8 characters
        if (password.match(/.{8,}/)){
            $("#length").css("color","green");
        }else{
            $("#length").css("color","red");
            valid = false;
        }
    return valid;
}

$(document).ready(function(){

    // set property on multiple elements (all elements required)
    //https://api.jquery.com/prop/
    $("input").prop('required',true);
    $("select").prop('required',true);

    // password reveal button
    $("#reveal").click(function(){
        if('password' == $('#password').attr('type')){
            $('#password').prop('type', 'text');
       }else{
            $('#password').prop('type', 'password');
       }
    });

    // adapted from https://stackoverflow.com/questions/52069794/how-to-check-password-validation-dynamically-using-jquery-javascript
    $('#password').keyup(function() {
        validatePassword($('#password').val());
    })

    $("#ranger-form").submit(function() {
        //succesful submission message
        if(validatePassword($('#password').val())){
            alert("Congrats " + $("#first").val() + " " 
            + $("#last").val() + "! You have chosen the " 
            + $("#select").val() + " " + $(".series:checked").val() 
            + " ranger. We will stay in touch at " + $("#email").val());
            return true;
        }
        alert("Your form was invalid");
        return false;

    });
});
