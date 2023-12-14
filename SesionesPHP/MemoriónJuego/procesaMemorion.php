<?php

function generarSet($length): array{
    $arrayEmojis = [
        "&#128053", "&#128054", "&#128058", "&#129418", "&#129437", "&#128049", "&#129409", "&#128047", "&#128052", "&#129412", "&#129427",
        "&#128046", "&#128055", "&#128023", "&#129426", "&#128045", "&#128057", "&#128048", "&#129415", "&#128059", "&#128040", "&#128060",
        "&#128020", "&#129417", "&#128056", "&#128050", "&#128011", "&#128044", "&#128031", "&#128032", "&#128033", "&#128025", "&#128012",
        "&#129419", "&#128027", "&#128030", "&#129410", "&#129439",
    ];
    shuffle($arrayEmojis);
    $set = array_slice($arrayEmojis,0,($length/2));
    array_push($set,$set);
    shuffle($set);
    return $set;
}

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

