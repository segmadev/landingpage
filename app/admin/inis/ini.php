<?php
// define("ROOT", $_SERVER['DOCUMENT_ROOT']."/invest2/");
require_once "include/session.php";
require_once "include/side.php";
require_once "../consts/main.php";
require_once "include/database.php";
require_once "functions/roles.php";
$r = new roles;
$d = new database;
$admin = $d->getall("admins", "token = ?", [$adminToken]);
if(!is_array($admin)) {
    $d->message("Unable to identify admin", "error");
    exit();
}
$adminID = $admin['ID'];
define("adminID", $adminID);
require_once "../consts/general.php";
require_once "../consts/Regex.php";
require_once "../content/content.php";
$c = new content;
$route = "";
$page = "dashboard";
$script = [];
$userID = "admin";
define("ADMINROLE", $r->get_role($admin['roleID']));
if (isset($_GET['p'])) {
    $page = htmlspecialchars($_GET['p']);
}

if (isset($_GET['action'])) {
    $route = htmlspecialchars($_GET['action']);
}

$navs = [
    
 

    "Management" => [
        "title" => "Management",
        "links" => [
            "admins" => [
                "new" => [
                    "a" => "index?p=admins&action=new", 
                    "title" => "Add New Admin", 
                ],
                "list" => [
                    "a" => "index?p=admins", 
                    "title" => "Manage Admins", 
                ],
                "icon" => "ti ti-users" 
            ],
            "settings" => [
                "list" => [
                    "a" => "index?p=settings", 
                    "title" => "Manage Settings", 
                ],
                "icon" => "ti ti-settings" 
            ],

            "profile" => [
                "edit" => [
                    "a" => "index?p=profile&action=edit", 
                    "title" => "Edit profile", 
                ],
                "icon" => "ti ti-fingerprint" 
            ],
            "roles" => [
                "new" => [
                    "a" => "index?p=roles&action=new", 
                    "title" => "Create", 
                ],
                "list" => [
                    "a" => "index?p=roles", 
                    "title" => "Manage", 
                ],
                "icon" => "ti ti-key" 
            ]

        ]
    ],

    "content" => [
        "title" => "Website Content",
        "links" => [
            "content" => [
                "home" => [
                    "a" => "index?p=content&action=home", 
                    "title" => "Home Page", 
                ],
                
                "icon" => "ti ti-home" 
            ],
            "features" => [
                "new" => [
                    "a" => "index?p=fetures&action=new", 
                    "title" => "Add new feature", 
                ],
                "list" => [
                    "a" => "index?p=fetures", 
                    "title" => "Manage fetures", 
                ],
                "icon" => "ti ti-components" 
            ],

            "how_it_works" => [
                "new" => [
                    "a" => "index?p=how_it_works&action=new", 
                    "title" => "Add stage", 
                ],
                "list" => [
                    "a" => "index?p=how_it_works", 
                    "title" => "Manage stages", 
                ],
                "icon" => "ti ti-table-filled" 
            ],

            "testimonies" => [
                "new" => [
                    "a" => "index?p=testimonies&action=new", 
                    "title" => "Add new testimony", 
                ],
                "list" => [
                    "a" => "index?p=testimonies", 
                    "title" => "Manage testimonies", 
                ],
                "icon" => "ti ti-stars" 
            ],   
        ]
    ],


];