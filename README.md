<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Excel2WhatsApp
A tool to send daily WhatsApp messages to customers based on data from an Excel file.

## Description
Excel2WhatsApp is a Laravel-based application designed to automate the process of sending daily WhatsApp messages to customers. Users can upload an Excel file containing customer phone numbers and messages, which are then stored in a MySQL database. The system runs a daily command to send these messages via Twilio, and users can monitor the status of each message (whether it was sent successfully or failed) through detailed reports.

## Features
- Excel file upload: Easily upload an Excel file with customer data (phone numbers and messages).
- Automated daily message sending: A scheduled task sends WhatsApp messages to customers daily.
- Message status reporting: Track the success or failure of each message and view error details.
- Authentication: Secure access via Laravel Sanctum for user login and token-based authentication.
- Twilio integration: Sends WhatsApp messages using the Twilio API.

## 🛠 Skills
- Laravel: PHP framework for building the web application.
- MySQL: Relational database to store customer and message data.
- Maatwebsite Excel package: For handling Excel file uploads and parsing.
- Twilio: API service for sending WhatsApp messages.
- Laravel Sanctum: For user authentication and API token management.



