<?php
// ملف لتخزين البيانات
$dataFile = 'content.json';

if (!file_exists($dataFile)) {
    $initialData = [
        "hero_title" => "PROFESSIONELE BOUW EN RENOVATIEDIENSTEN",
        "phone" => "+32 483 404 778",
        "services" => [
            "badkamer" => ["title" => "Badkamerrenovatie", "desc" => "Wilt u uw badkamer volledig vernieuwen?"],
            "tegelwerk" => ["title" => "Professionele Tegelwerken", "desc" => "Hoogwaardige tegelwerken..."]
        ]
    ];
    file_put_contents($dataFile, json_encode($initialData, JSON_PRETTY_PRINT));
}

$content = json_decode(file_get_contents($dataFile), true);
?>
