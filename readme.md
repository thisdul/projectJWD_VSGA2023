# **DATA RUTE PENERBANGAN**

Aplikasi Daftar Rute Penerbangan adalah aplikasi yang membantu user untuk membuat daftar rute penerbangan. Dengan aplikasi ini, user dapat membuat dan menampilkan informasi rute penerbangan berupa Maskapai, Bandara Asal Penerbangan, Bandara Tujuan, Harga Tiket, Pajak dan Total harga tiket. Aplikasi ini dibuat dengan bahasa pemrograman PHP dan Bootsrap sebagai library. Data yang digunakan diambil dari file data.json. file json tersebut berisikan data lama dari daftar rute penerbangan.

Ketentuan tarif pajak sebagai berikut:

- Sumber pajak berasal dari bandara asal dan bandara tujuan
- Masing-masing bandara mempunyai tarif pajak tersendiri
- Total pajak diambil dari jumlah pajak bandara asal dan bandara tujuan
- Berikut rincian pajak masing-masing bandara

Rincian Pajak masing-masing bandara:

| No  | Bandara Asal              | Pajak |
| --- | ------------------------- | ----- |
| 1.  | Soekarno-Hatta (CGK)      | 50000 |
| 2.  | Husein Sastranegara (BDO) | 30000 |
| 3.  | Abdul Rachman Saleh (MLG) | 40000 |
| 4.  | Juanda (SUB)              | 40000 |

<hr>

| No  | Bandara Tujuan            | Pajak |
| --- | ------------------------- | ----- |
| 1.  | Ngurah Rai (DPS)          | 80000 |
| 2.  | Hasanuddin (UPG)          | 70000 |
| 3.  | Inanwatan (INX)           | 90000 |
| 4.  | Sultan Iskandarmuda (BTJ) | 70000 |

<br>
<hr>

## Features

- Penginputan Data Nama Maskapai
- Penginputan Data Asal Bandara & Tujuan Bandara (berupa Select)
- Penginputan Harga Tiket
- Tabel Daftar Rute Penerbangan

## Tech

Aplikasi Daftar Rute Penerbangan Dibangun dengan :

- [Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Visual Studio Code](https://code.visualstudio.com/) Visual Studio Code, also commonly referred to as VS Code,Features include support for debugging, syntax highlighting, intelligent code completion, snippets, code refactoring, and embedded Git.
- [XAMPP](https://www.apachefriends.org/) XAMPP is a free and open-source cross-platform web server solution stack package developed by Apache Friends
- [PHP](https://www.php.net/) PHP is a general-purpose scripting language geared toward web development
- [HTML](https://html.com/) The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser.

## Requirement

- XAMPP 7.4.9 OR LATER
- PHP 7.2 or Later

## Structure

📦projectjwd
┣ 📂data
┃ ┗ 📜data.json
┣ 📂library
┃ ┗ 📜logo.png
┣ 📜index.php
┗ 📜readme.md

## Credits

[Fadhilah Nur Amaliah - Github](https://github.com/)
