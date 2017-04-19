# ServiceLayer4CodeIgniter
[![Build Status](https://travis-ci.org/acerest/ServiceLayer4CodeIgniter.svg?branch=master)](https://travis-ci.org/acerest/ServiceLayer4CodeIgniter)

The service layer for CodeIgniter(CI)

Suitable for API applications

Updated to ***`CI 3.1.4`***

## What's This

This is a service layer for CI.

Because of the development pattern in CI, we can only use Model-View-Controller to build applications. But many of us just use it to develop API server or other server without VIEW, then the question is there will be many businesses logic or services logic in the Controller layer even in the Model layer. It's really hard to reuse code.

By **CodeMysophobia** , I do need clearly code everytime and everywhere, so, I decided to make another layer to solve this problem.

## What's Difference

Model layer: Represents your data structures. Typically your model classes will contain functions that help you retrieve, insert, and update information in your database(the same as CI). **At last but not least. Do not include any logic or data-check.** 

Controller Layer: Operate and format I/O, only call Service Layer to handle data and get the result in the callback.

Service Layer: Build the main logic of one feature, this layer can call other service in the same layer. **Focus on one thing. Do not include any businesses logic.**

## How to Use

1. New files ***`MY_Service.php`*** and ***`MY_Loader.php`*** in 'core/'
2. New directory ***`services`*** in 'application/'
3. New Service Layer file in the folder in 2
4. Enjoy!

## Changelog

#### Ver 0.9.0.0

2017.4.17 - Init project.

#### Ver 0.9.1.0

2017.4.19 - Add Travis CI & PHPUnit

## About

Author: Rick Lu



