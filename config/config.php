<?php
define('DEV', true);                       // In development or live? Development = true | Live = false
define('DOMAIN', 'http://localhost'); // Domain (used to create links in emails)
define('ROOT_FOLDER', 'public');           // Name of document root folder (e.g. public, content, htdocs)

// DOC_ROOT is created because the download code has several versions of the sample site
// On a live site a single forward slash / would indicate the document root folder
$this_folder   = substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']));
$parent_folder = dirname($this_folder);
define("DOC_ROOT", $parent_folder . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR);

/// Database settings
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBNAME", "stylist_commerce");


// SMTP server settings
$email_config = [
 'server'      => 'smtp.gmail.com',
 'port'        => '587',
 'username'    => 'manomoumi@gmail.com',
 'password'    => 'mgkiflwaauvandfg',
 'security'    => 'tls',
 'admin_email' => 'manomoumi@gmail.com',
 'debug'       => (DEV) ? 2 : 0,
];

// File upload settings
define('MEDIA_TYPES', ['image/jpeg', 'image/png', 'image/gif',]); // Allowed file types
define('FILE_EXTENSIONS', ['jpeg', 'jpg', 'png', 'gif',]);       // Allowed file extensions
define('MAX_SIZE', '5242880');                                    // Max file size
// DO NOT EDIT:
define('UPLOADS', dirname(__DIR__, 1) . DIRECTORY_SEPARATOR . ROOT_FOLDER . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR); // Image upload folder
