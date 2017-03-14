<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/14
 * Time: 9:48
 */
header('Content-type:text/html;charset=utf-8');

//私钥
$private_key = "-----BEGIN RSA PRIVATE KEY-----
MIICXQIBAAKBgQDbHqVytV9dnIrfCS9dzDVZz+qM6LtU46cdqbGvvX0Xz4CtsiT+
TqU3m8eC9BwTd0jY8bWjatYqEn716H77JcIJpmvO6ZJc4JYxvyJx6BEj6TQ4ZGYl
CA/wT08s9TKwd+PjkEht9A51hvCuUiyHPzMXAiL0a9tghPVd5rcDHlXb5wIDAQAB
AoGBANhrD2wZWYSi7cJWVxMkc3kuUvIzl3rDkrZIeXgjBp9y0hw8fC80zBf9Y3Oi
2Owc/7VOHmG2TqqlNAJ7TJePdnGvEG5yzHuMH6/uRPS4A+gDndM8U/sZBUYaZjbr
5M8vg6wL3yQ2awAbXu7pwLEvxVmuvhv+0jOFnqLpTRlki3ZpAkEA+Y00pTwikCEt
N+dkFGbhzZfH6bFNIkUOCrkDMgru1IargO/ggllk4fVLe7WBMWwh/0X9oTeTjLi7
Es856QMdpQJBAODIIeu7/cL3wp6Bigg7V25OSD+7uSjlCpoPSUNZIjZ6HJQsFCnU
RHsEDeD1f88g7i9AGI0htYiJXCgwd6GE9ZsCQGoCUhrfMM+JSGw3H4yLJ+DuWT4s
01d7fjuP3IulmU8u5iwfun+k+fYC/c3PjNIx3T9TvCqAMW3WC6Ix5afWawECQA6p
n2TUL3pvVPen9YwR6uMcIiReJ3becfGYu6uz/cJV9tVHhs0vtoPbwNgCy6KEQGU+
phtWrpPIegV5G+SiWq8CQQCoH+ic1j9b1DzENUb206w7KpcIhm629iUWUgBTrnlC
LzOA6xwY78V7cAUdzhTycAxhmWq/1FBlCCKtuZHVHnE/
-----END RSA PRIVATE KEY-----";

$hex_encrypt_data = trim($_POST['password']); //十六进制数据
$encrypt_data = pack("H*", $hex_encrypt_data);//对十六进制数据进行转换
openssl_private_decrypt($encrypt_data, $decrypt_data, $private_key);

echo '解密后的数据：' . $decrypt_data;

/*
//私钥

$priKey = 'MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBAKwDevlt9Q9HwcjnNjXxvrd41KlKOy/HEWU/77O4wrFpwm4vxSk+HGSct3DIrAeNmgnd/UBjPro5KAGZOBnXtfgu3vxQKeJT6bqJkgT2Bg8uvRSUPVJCgqErOFlemkT67BazOMxjt0pgRSFvP1WXTVaP2qUiCZEQ6FVKAD4MISArAgMBAAECgYB5h8/3sJ9ml10rs2fSvyTu/djKbt7YR75bmcuiX9R2gnFTZj7Xf8GRuEPG1JDumTYO6J+IQVZNPhqs3nMLlyNBt8ofEPqDEnNu2soAiCrs5G2Rtd50b7OsGAa2ZzxshvkinWNPKnTKVpzn6YB/wmUgBU/ISRTJ/hl16EOCh6jmMQJBAN9XqU/+1bm8kEL9PL7sJbNrL+dQIvmwbWhzr16zTEwQTMOngKyixJ1VO+20/LaLcZWcN/DjjTCABd/xIPpLrDMCQQDFKm+HWYHoMMYU4jM5Zg9TC6pqhlNCbeCyouF2/lfMXhxEjoL/uSpvPaO7sKegD14BjGmX7xpKfGyHzTpdp0QpAkEArg7AahKdeCInf72iEN0zSI/ZhnkiuNsxePzniHNNm938JWMuWdyERGV/zfKGHLGx9LoJstd0Wn77lRpz6/z7lwJBAKEkdLC/k+/sZQhOc6U259Fs2GRl0oiZeysk+nchmyp5xEq32xMcCDWQwFA3KlkkFiXX17mIfwlftegr8Mb4XTkCQFEA4M5sddL3fSq81DFycvTE/Swwy1W4r4KHfnKBfAOPtu3gj3tRqukP0I+gJ1TgpKTp41jLI5UlQfAcTVVB5PU=';
$privateKey = "-----BEGIN RSA PRIVATE KEY-----\n" .
            wordwrap($priKey, 64, "\n", true) .
            "\n-----END RSA PRIVATE KEY-----";

//公钥
$pubKey = 'MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCsA3r5bfUPR8HI5zY18b63eNSpSjsvxxFlP++zuMKxacJuL8UpPhxknLdwyKwHjZoJ3f1AYz66OSgBmTgZ17X4Lt78UCniU+m6iZIE9gYPLr0UlD1SQoKhKzhZXppE+uwWszjMY7dKYEUhbz9Vl01Wj9qlIgmREOhVSgA+DCEgKwIDAQAB';

$publicKey = "-----BEGIN PUBLIC KEY-----\n" .
                wordwrap($pubKey, 64, "\n", true) .
                "\n-----END PUBLIC KEY-----";

$pi_key = openssl_pkey_get_private($privateKey);//这个函数可用来判断私钥是否是可用的，可用返回资源

$pu_key = openssl_pkey_get_public($publicKey);//这个函数可用来判断公钥是否是可用的

//print_r($pi_key);echo "\n";
//print_r($pu_key);echo "\n";

$data = '123456';
$encrypted = "";
$decrypted = "";

echo "source data:",$data,"\n";

echo "private key encrypt:\n";

openssl_private_encrypt($data, $encrypted, $pi_key);//私钥加密

$encrypted = base64_encode($encrypted);//加密后的内容通常含有特殊字符，需要编码转换下，在网络间通过url传输时要注意base64编码是否是url安全的

echo $encrypted,"\n";

echo "public key decrypt:\n";

openssl_public_decrypt(base64_decode($encrypted),$decrypted,$pu_key);//私钥加密的内容通过公钥可用解密出来

echo $decrypted,"\n";

echo "<br/>---------------------------------------<br/>";

echo "public key encrypt:\n";

openssl_public_encrypt($data, $encrypted, $pu_key);//公钥加密
$encrypted = base64_encode($encrypted);
echo $encrypted,"\n";


openssl_private_decrypt(base64_decode($encrypted), $decrypted, $pi_key);//私钥解密
echo "private key decrypt:\n";
echo $decrypted,"\n";
*/