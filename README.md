# QR Code Creator

This is a simple website built with PHP that lets you create QR codes from text or URLs.
You can save the QR code images and download them to your computer.

## Features

* Make a QR code from any text or link.
* Choose the size of the QR code.
* Choose the error correction level (L, M, Q, H).
* See the QR code on the page.
* Download the QR code as a PNG image.

## Requirements

* PHP installed on your server or computer.
* A web browser (like Chrome, Firefox, Edge).
* The [`phpqrcode`](https://sourceforge.net/projects/phpqrcode/) library to generate the QR codes.

## How to Set It Up

1. Download the `phpqrcode` library and put it in a folder called `qr_lib`.
2. Make a folder called `qr_output` where the QR codes will be saved. Make sure it can be written to by PHP.
3. Open `index.php` in your browser.

## How to Use It

1. Type your text or URL into the box.
2. Pick a size for the QR code (like 200 pixels).
3. Pick an error correction level (L, M, Q, or H).
4. Click **Generate QR Code**.
5. Your QR code will appear on the page.
6. Click **Download** to save it.

## How It Works (Simple Explanation)

* The website takes the text you enter.
* It uses the `phpqrcode` library to make a QR code image.
* The image is saved in the `qr_output` folder.
* The page shows the QR code and gives a download link.
