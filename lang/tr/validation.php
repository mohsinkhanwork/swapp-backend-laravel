<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Doğrulama Dil Satırları
    |--------------------------------------------------------------------------
    |
    | Aşağıdaki dil satırları, doğrulayıcı sınıfı tarafından kullanılan varsayılan
    | hata mesajlarını içerir. Bazı kuralların boyut kuralları gibi
    | birden fazla sürümü vardır. Her birini burada dilediğiniz gibi ayarlayabilirsiniz.
    |
    */

    'accepted' => ':attribute alanı kabul edilmelidir.',
    'accepted_if' => ':other :value olduğunda :attribute alanı kabul edilmelidir.',
    'active_url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'after' => ':attribute alanı :date tarihinden sonra bir tarih olmalıdır.',
    'after_or_equal' => ':attribute alanı :date tarihinden sonra veya aynı tarih olmalıdır.',
    'alpha' => ':attribute alanı sadece harfler içermelidir.',
    'alpha_dash' => ':attribute alanı yalnızca harfler, rakamlar, tireler ve alt çizgiler içerebilir.',
    'alpha_num' => ':attribute alanı yalnızca harf ve rakam içerebilir.',
    'array' => ':attribute alanı bir dizi olmalıdır.',
    'ascii' => ':attribute alanı yalnızca tek baytlık alfasayısal karakterler ve semboller içermelidir.',
    'before' => ':attribute alanı :date tarihinden önce bir tarih olmalıdır.',
    'before_or_equal' => ':attribute alanı :date tarihinden önce veya aynı tarih olmalıdır.',
    'between' => [
        'array' => ':attribute alanı :min ile :max arasında öğe içermelidir.',
        'file' => ':attribute alanı :min ile :max kilobayt arasında olmalıdır.',
        'numeric' => ':attribute alanı :min ile :max arasında olmalıdır.',
        'string' => ':attribute alanı :min ile :max karakter arasında olmalıdır.',
    ],
    'boolean' => ':attribute alanı doğru veya yanlış olmalıdır.',
    'can' => ':attribute alanı yetkisiz bir değer içeriyor.',
    'confirmed' => ':attribute alanı onayı eşleşmiyor.',
    'current_password' => 'Şifre yanlış.',
    'date' => ':attribute alanı geçerli bir tarih olmalıdır.',
    'date_equals' => ':attribute alanı :date tarihine eşit bir tarih olmalıdır.',
    'date_format' => ':attribute alanı :format formatına uymalıdır.',
    'decimal' => ':attribute alanı :decimal ondalık basamağa sahip olmalıdır.',
    'declined' => ':attribute alanı reddedilmelidir.',
    'declined_if' => ':other :value olduğunda :attribute alanı reddedilmelidir.',
    'different' => ':attribute alanı ve :other farklı olmalıdır.',
    'digits' => ':attribute alanı :digits basamaklı olmalıdır.',
    'digits_between' => ':attribute alanı :min ile :max basamak arasında olmalıdır.',
    'dimensions' => ':attribute alanı geçersiz resim boyutlarına sahiptir.',
    'distinct' => ':attribute alanı yinelenen bir değere sahiptir.',
    'doesnt_end_with' => ':attribute alanı şu değerlerden biriyle bitmemelidir: :values.',
    'doesnt_start_with' => ':attribute alanı şu değerlerden biriyle başlamamalıdır: :values.',
    'email' => ':attribute alanı geçerli bir e-posta adresi olmalıdır.',
    'ends_with' => ':attribute alanı şu değerlerden biriyle bitmelidir: :values.',
    'enum' => 'Seçilen :attribute geçersiz.',
    'exists' => 'Seçilen :attribute geçersiz.',
    'extensions' => ':attribute alanı şu uzantılardan birine sahip olmalıdır: :values.',
    'file' => ':attribute alanı bir dosya olmalıdır.',
    'filled' => ':attribute alanı bir değere sahip olmalıdır.',
    'gt' => [
        'array' => ':attribute alanı :value öğeden daha fazla olmalıdır.',
        'file' => ':attribute alanı :value kilobayttan daha büyük olmalıdır.',
        'numeric' => ':attribute alanı :value\'dan büyük olmalıdır.',
        'string' => ':attribute alanı :value karakterden daha büyük olmalıdır.',
    ],
    'gte' => [
        'array' => ':attribute alanı en az :value öğe içermelidir.',
        'file' => ':attribute alanı en az :value kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en az :value olmalıdır.',
        'string' => ':attribute alanı en az :value karakter olmalıdır.',
    ],
    'hex_color' => ':attribute alanı geçerli bir onaltılık renk olmalıdır.',
    'image' => ':attribute alanı bir resim olmalıdır.',
    'in' => 'Seçilen :attribute geçersiz.',
    'in_array' => ':attribute alanı :other içinde bulunmalıdır.',
    'integer' => ':attribute alanı bir tam sayı olmalıdır.',
    'ip' => ':attribute alanı geçerli bir IP adresi olmalıdır.',
    'ipv4' => ':attribute alanı geçerli bir IPv4 adresi olmalıdır.',
    'ipv6' => ':attribute alanı geçerli bir IPv6 adresi olmalıdır.',
    'json' => ':attribute alanı geçerli bir JSON dizisi olmalıdır.',
    'lowercase' => ':attribute alanı küçük harf olmalıdır.',
    'lt' => [
        'array' => ':attribute alanı :value\'dan daha az öğe içermelidir.',
        'file' => ':attribute alanı :value kilobayttan daha küçük olmalıdır.',
        'numeric' => ':attribute alanı :value\'dan daha az olmalıdır.',
        'string' => ':attribute alanı :value karakterden daha az olmalıdır.',
    ],
    'lte' => [
        'array' => ':attribute alanı en fazla :value öğe içermelidir.',
        'file' => ':attribute alanı en fazla :value kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en fazla :value olmalıdır.',
        'string' => ':attribute alanı en fazla :value karakter olmalıdır.',
    ],
    'mac_address' => ':attribute alanı geçerli bir MAC adresi olmalıdır.',
    'max' => [
        'array' => ':attribute alanı en fazla :max öğe içermelidir.',
        'file' => ':attribute alanı en fazla :max kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en fazla :max olmalıdır.',
        'string' => ':attribute alanı en fazla :max karakter olmalıdır.',
    ],
    'max_digits' => ':attribute alanı en fazla :max basamak içermemelidir.',
    'mimes' => ':attribute alanı şu türlerden biri olmalıdır: :values.',
    'mimetypes' => ':attribute alanı şu türlerden biri olmalıdır: :values.',
    'min' => [
        'array' => ':attribute alanı en az :min öğe içermelidir.',
        'file' => ':attribute alanı en az :min kilobayt olmalıdır.',
        'numeric' => ':attribute alanı en az :min olmalıdır.',
        'string' => ':attribute alanı en az :min karakter olmalıdır.',
    ],
    'min_digits' => ':attribute alanı en az :min basamak içermelidir.',
    'missing' => ':attribute alanı eksik olmalıdır.',
    'missing_if' => ':other :value olduğunda :attribute alanı eksik olmalıdır.',
    'missing_unless' => ':other :value olmadığında :attribute alanı eksik olmalıdır.',
    'missing_with' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'missing_with_all' => ':values mevcut olduğunda :attribute alanı eksik olmalıdır.',
    'multiple_of' => ':attribute alanı :value\'nun katı olmalıdır.',
    'not_in' => 'Seçilen :attribute geçersiz.',
    'not_regex' => ':attribute alanı biçimi geçersizdir.',
    'numeric' => ':attribute alanı bir sayı olmalıdır.',
    'password' => [
        'letters' => ':attribute alanı en az bir harf içermelidir.',
        'mixed' => ':attribute alanı en az bir büyük harf ve bir küçük harf içermelidir.',
        'numbers' => ':attribute alanı en az bir sayı içermelidir.',
        'symbols' => ':attribute alanı en az bir sembol içermelidir.',
        'uncompromised' => 'Verilen :attribute bir veri sızıntısında göründü. Lütfen farklı bir :attribute seçin.',
    ],
    'present' => ':attribute alanı mevcut olmalıdır.',
    'present_if' => ':other :value olduğunda :attribute alanı mevcut olmalıdır.',
    'present_unless' => ':other :value olmadığında :attribute alanı mevcut olmalıdır.',
    'present_with' => ':values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'present_with_all' => ':values mevcut olduğunda :attribute alanı mevcut olmalıdır.',
    'prohibited' => ':attribute alanı yasaktır.',
    'prohibited_if' => ':other :value olduğunda :attribute alanı yasaktır.',
    'prohibited_unless' => ':other :values içinde olmadığında :attribute alanı yasaktır.',
    'prohibits' => ':attribute alanı :other\'in mevcut olmasını engeller.',
    'regex' => ':attribute alanı biçimi geçersizdir.',
    'required' => ':attribute alanı gereklidir.',
    'required_array_keys' => ':attribute alanı şunlar için girişler içermelidir: :values.',
    'required_if' => ':other :value olduğunda :attribute alanı gereklidir.',
    'required_if_accepted' => ':other kabul edildiğinde :attribute alanı gereklidir.',
    'required_unless' => ':other :values içinde olmadığında :attribute alanı gereklidir.',
    'required_with' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_with_all' => ':values mevcut olduğunda :attribute alanı gereklidir.',
    'required_without' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'required_without_all' => ':values mevcut olmadığında :attribute alanı gereklidir.',
    'same' => ':attribute alanı ile :other eşleşmelidir.',
    'size' => [
        'array' => ':attribute alanı :size öğe içermelidir.',
        'file' => ':attribute alanı :size kilobayt olmalıdır.',
        'numeric' => ':attribute alanı :size olmalıdır.',
        'string' => ':attribute alanı :size karakter olmalıdır.',
    ],
    'starts_with' => ':attribute alanı şunlardan biriyle başlamalıdır: :values.',
    'string' => ':attribute alanı bir dize olmalıdır.',
    'timezone' => ':attribute alanı geçerli bir saat dilimi olmalıdır.',
    'unique' => ':attribute zaten alınmış.',
    'uploaded' => ':attribute yüklenemedi.',
    'uppercase' => ':attribute alanı büyük harf olmalıdır.',
    'url' => ':attribute alanı geçerli bir URL olmalıdır.',
    'ulid' => ':attribute geçerli bir ULID olmalıdır.',
    'uuid' => ':attribute geçerli bir UUID olmalıdır.',

    /*
    |--------------------------------------------------------------------------
    | Özel Doğrulama Dil Satırları
    |--------------------------------------------------------------------------
    |
    | Burada, kurallar için özel bir dil satırı belirtmek için
    | "attribute.rule" adlandırma kuralını kullanarak özellikler için özel doğrulama mesajlarını belirtebilirsiniz.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Özel Doğrulama Öznitelikleri
    |--------------------------------------------------------------------------
    |
    | Aşağıdaki dil satırları, yer tutucuyu daha anlamlı hale getirmek için
    | "email" yerine "E-Posta Adresi" gibi bir şey kullanarak
    | özniteliği daha ifade edici hale getirir. Bu sadece mesajımızı daha ifade edici hale getirmemize yardımcı olur.
    |
    */

    'attributes' => [],

];
