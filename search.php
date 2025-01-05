<?php
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);
$phone = $data['phone'] ?? '';

$apiKey = ''; /*api ключ*/

$phone = preg_replace('/[^0-9]/', '', $phone);

if (strlen($phone) == 10) {
    $phone = '7' . $phone;
} elseif (strlen($phone) == 11 && $phone[0] == '8') {
    $phone = '7' . substr($phone, 1);
}

try {
    $url = "https://api.apilayer.com/number_verification/validate?number={$phone}";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "apikey: {$apiKey}"
    ]);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        throw new Exception('Curl error: ' . curl_error($ch));
    }
    
    curl_close($ch);

    $data = json_decode($response, true);

    error_log('API Response: ' . print_r($data, true));

    if (isset($data['valid'])) {
        if ($data['valid']) {
            $response = [
                'Номер' => formatPhone($phone),
                'Оператор' => $data['carrier'] ?? 'Неизвестно',
                'Регион' => $data['location'] ?? 'Неизвестно',
                'Страна' => $data['country_name'] ?? 'Россия',
                'Тип номера' => $data['line_type'] ?? 'Неизвестно',
                'Код страны' => $data['country_code'] ?? 'RU'
            ];
        } else {
            $response = [
                'error' => 'Номер телефона недействителен'
            ];
        }
    } else {
        if (isset($data['error'])) {
            $response = [
                'error' => 'Ошибка API: ' . ($data['error']['info'] ?? 'Неизвестная ошибка')
            ];
        } else {
            $response = [
                'error' => 'Неожиданный ответ от API'
            ];
        }
    }
} catch (Exception $e) {
    $response = [
        'error' => 'Произошла ошибка при получении данных: ' . $e->getMessage()
    ];
}


try {
    $defCode = substr($phone, 1, 3);
    $regionInfo = getRegionByDef($defCode);
    if ($regionInfo && !isset($response['error'])) {
        $response['Детальный регион'] = $regionInfo;
    }
} catch (Exception $e) {
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);

function formatPhone($phone) {
    return '+' . substr($phone, 0, 1) . ' (' . substr($phone, 1, 3) . ') ' . 
           substr($phone, 4, 3) . '-' . substr($phone, 7, 2) . '-' . substr($phone, 9, 2);
}

function getRegionByDef($def) {
    $defCodes = [
        '495' => 'Москва',
        '499' => 'Москва',
        '903' => 'Москва и область',
        '905' => 'Москва и область',
        '906' => 'Москва и область',
        '909' => 'Москва и область',
        '926' => 'Москва и область',
        '929' => 'Москва и область',
        '969' => 'Москва и область',
        '999' => 'Москва и область',
        '812' => 'Санкт-Петербург',
        '911' => 'Санкт-Петербург и область',
        '921' => 'Санкт-Петербург и область',
        '931' => 'Санкт-Петербург и область',
        '981' => 'Санкт-Петербург и область',
        '920' => 'Воронежская область',
        '923' => 'Новосибирская область',
        '927' => 'Самарская область',
        '937' => 'Волгоградская область',
        '902' => 'Уральский регион',
        '904' => 'Северо-Западный регион',
        '908' => 'Южный регион',
        '912' => 'Пермский край',
        '913' => 'Сибирский регион',
        '914' => 'Дальневосточный регион',
        '918' => 'Краснодарский край',
        '919' => 'Ростовская область',
    ];

    return $defCodes[$def] ?? null;
} 