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
} else if ($text == 'いいえ') {
  exit;
} 
//症状取得
// else if ($text == '頭痛' or $text == '頭がいたい' or $text == '頭が痛い') {
// 	  $response_format_text = [
// 		    	"type" => "text",
// 			"text" => "どんな感じですか?"
// 			];
// }
//頭痛
 else if ($text == '頭痛' or $text == '頭がいたい' or $text == '頭が痛い') {
  $response_format_text = [
    "type" => "template",
    "altText" => "頭痛",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
            "title" => "どんな感じですか?",
            "text" => "どんな感じですか?(症状)",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "突然の激しい頭痛",
                  "text" => "C1"
              ],
              [
                  "type" => "message",
                  "label" => "突然の頭痛",
                  "text" => "C2"
              ],
              [
                  "type" => "message",
                  "label" => "発熱を伴う頭痛",
                  "text" => "C3"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
            "title" => "どんな感じですか?",
            "text" => "どんな感じですか?(症状)",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "片側性の激しい頭痛",
                  "text" => "C4"
              ],
              [
                  "type" => "message",
                  "label" => "側頭部の圧痛を伴う拍動性の頭痛",
                  "text" => "C5"
              ],
              [
                  "type" => "message",
                  "label" => "絞めつけられる感じの頭痛",
                  "text" => "C6"
              ]
            ]
          ],
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
            "title" => "どんな感じですか?",
            "text" => "どんな感じですか?(症状)",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "歩行や階段昇降により憎悪",
                  "text" => "C7"
              ],
              [
                  "type" => "message",
                  "label" => "片側眼周囲から側頭部にかけての高度な頭痛",
                  "text" => "C8"
              ],
              [
                  "type" => "message",
                  "label" => "前屈で悪化する持続性の頭痛",
                  "text" => "C9"
              ]
            ]
          ]
      ]
    ]
  ];
}
//頭痛
//患者像
 else if ($text == 'C1' or $text == 'C2' or $text == 'C3' or $text == 'C4' or $text == 'C5') {
  $response_format_text = [
    "type" => "template",
    "altText" => "患者像",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "患者像",
      "text" => "患者像は?",
      "actions" => [
          [
            "type" => "message",
            "label" => "40～60代/高血圧",
            "text" => "K1"
          ],
          [
            "type" => "message",
            "label" => "患者像無し",
            "text" => "K2"
          ],
          [
            "type" => "message",
            "label" => "中年以降の女性",
            "text" => "K3"
          ],
          [
            "type" => "message",
            "label" => "50歳以上の女性",
            "text" => "K4"
          ]
      ]
    ]
  ];
}
//患者像
//最初のレスポンス
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