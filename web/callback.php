<?php
$accessToken = getenv('LINE_CHANNEL_ACCESS_TOKEN');
//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string);
$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
//メッセージ取得
$text = $jsonObj->{"events"}[0]->{"message"}->{"text"};
//ReplyToken取得
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
//メッセージ以外のときは何も返さず終了
if($type != "text"){
	exit;
}

//返信データ作成
if ($text == 'はい') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "症状を教えて下さい（頭が痛いなど）"
			];
else if ($text == 'いいえ') {
  exit;
} 
//症状取得
 else if ($text == '頭痛' or $text == '頭がいたい' or $text == '頭が痛い')　 {
  $response_format_text = [
    "type" => "template",
    "altText" => "頭痛",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "頭痛",
      "text" => "どんな感じですか?",
      "actions" => [
          [
            "type" => "message",
            "label" => "突然の激しい頭痛",
            "text" => "突然の激しい頭痛"
          ],
          [
            "type" => "message",
            "label" => "発熱を伴う頭痛",
            "text" => "発熱を伴う頭痛"
          ],
          [
            "type" => "message",
            "label" => "片側性の激しい頭痛",
            "text" => "片側性の激しい頭痛"
          ],
          [
            "type" => "message",
            "label" => "側頭部の圧縮",
            "text" => "側頭部の圧縮"
          ]
      ]
    ]
  ];
} 
else if ($text == '質問' or $text == 'インプレッション' or $text == 'インプレッション教えて' or $text == 'インプレッション知りたい') {
  $response_format_text = [
    "type" => "template",
    "altText" => "インプレッションが知りたい？（はい／いいえ）",
    "template" => [
        "type" => "confirm",
        "text" => "インプレッションが知りたい？",
        "actions" => [
            [
              "type" => "message",
              "label" => "はい",
              "text" => "はい"
            ],
            [
              "type" => "message",
              "label" => "いいえ",
              "text" => "いいえ"
            ]
        ]
    ]
  ];
}
$post_data = [
	"replyToken" => $replyToken,
	"messages" => [$response_format_text]
	];
$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $accessToken
    ));
$result = curl_exec($ch);
curl_close($ch);