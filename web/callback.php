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
	  $response_format_text = [
		    	"type" => "text",
			"text" => "じゃあ何がしたいの？"
			];
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
 else if ($text == 'C1' or $text == 'C2' or $text == 'C3' or $text == 'C4') {
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
            "label" => "高血圧/高齢者",
            "text" => "K2"
          ],
          [
            "type" => "message",
            "label" => "典型的な患者像なし",
            "text" => "K3"
          ],
          [
            "type" => "message",
            "label" => "中年以降の女性",
            "text" => "K4"
          ]
      ]
    ]
  ];
}
 else if ($text == 'C5' or $text == 'C6' or $text == 'C7' or $text == 'C8' or $text == 'C9') {
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
            "label" => "50代以上の女性",
            "text" => "K5"
          ],
          [
            "type" => "message",
            "label" => "精神的ストレス/睡眠不足",
            "text" => "K6"
          ],
          [
            "type" => "message",
            "label" => "若年女性",
            "text" => "K7"
          ],
          [
            "type" => "message",
            "label" => "感冒後",
            "text" => "K8"
          ]
      ]
    ]
  ];
}
//患者像

//不随症状
 else if ($text == 'K1' or $text == 'K2' or $text == 'K3' or $text == 'K4' or $text == 'K5' or $text == 'K6' or $text == 'K7' or $text == 'K8') {
  $response_format_text = [
    "type" => "template",
    "altText" => "付随する症状",
    "template" => [
      "type" => "carousel",
      "columns" => [
          [
            "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
            "title" => "付随する症状",
            "text" => "付随する症状は?",
            "actions" => [
              [
                  "type" => "message",
                  "label" => "巣症状(-)",
                  "text" => "I1"
              ],
              [
                  "type" => "message",
                  "label" => "巣症状",
                  "text" => "I2"
              ],
              [
                  "type" => "message",
                  "label" => "髄膜刺激症状",
                  "text" => "I3"
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
                  "label" => "対光反射消失",
                  "text" => "I4"
              ],
              [
                  "type" => "message",
                  "label" => "側頭部の怒張・硬結",
                  "text" => "I5"
              ],
              [
                  "type" => "message",
                  "label" => "嘔吐(-)",
                  "text" => "I6"
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
                  "label" => "閃輝性暗点(発作前)",
                  "text" => "I7"
              ],
              [
                  "type" => "message",
                  "label" => "結膜充血・眼裂狭小",
                  "text" => "I8"
              ],
              [
                  "type" => "message",
                  "label" => "嗅覚障害",
                  "text" => "I9"
              ]
            ]
          ]
      ]
    ]
  ];
}
//不随症状
//Impression
else if ($text == 'I1') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【くも膜下出血】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I2') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【脳出血】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I3') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【髄膜炎】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I4') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【急性緑内障発作】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I5') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【側頭動脈炎】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I6') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【緊張型頭痛】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I7') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【片頭痛】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I8') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【群発頭痛】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'I9') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【急性副鼻腔炎】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
//Impression
//頭痛
//呼吸困難
 else if ($text == '呼吸困難' or $text == '息が苦しい' or $text == '呼吸がしにくい' or $text == '息切れ' or $text == '息苦しい') {
  $response_format_text = [
    "type" => "template",
    "altText" => "呼吸困難",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "呼吸困難",
      "text" => "患者像は?",
      "actions" => [
          [
            "type" => "message",
            "label" => "突発性",
            "text" => "S1"
          ],
          [
            "type" => "message",
            "label" => "発作性",
            "text" => "S2"
          ],
          [
            "type" => "message",
            "label" => "急性",
            "text" => "S3"
          ],
          [
            "type" => "message",
            "label" => "慢性",
            "text" => "S4"
          ]
      ]
    ]
  ];
}
//S1
 else if ($text == 'S1') {
  $response_format_text = [
    "type" => "template",
    "altText" => "突発性",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "突発性",
      "text" => "胸痛",
      "actions" => [
          [
            "type" => "message",
            "label" => "胸痛(+)",
            "text" => "T1"
          ],
          [
            "type" => "message",
            "label" => "胸痛(-)",
            "text" => "II3"
          ]
      ]
    ]
  ];
}
//S2
 else if ($text == 'S2') {
  $response_format_text = [
    "type" => "template",
    "altText" => "発作性",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "発作性",
      "text" => "作時",
      "actions" => [
          [
            "type" => "message",
            "label" => "労作時",
            "text" => "II4"
          ],
          [
            "type" => "message",
            "label" => "夜間～朝の非労作時",
            "text" => "II5"
          ]
      ]
    ]
  ];
}
//S3
 else if ($text == 'S3') {
  $response_format_text = [
    "type" => "template",
    "altText" => "急性",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "急性",
      "text" => "因子",
      "actions" => [
          [
            "type" => "message",
            "label" => "冠危険因子(+)",
            "text" => "II6"
          ],
          [
            "type" => "message",
            "label" => "その他(最初の選択肢)",
            "text" => "呼吸困難"
          ]
      ]
    ]
  ];
}
//S4
 else if ($text == 'S4') {
  $response_format_text = [
    "type" => "template",
    "altText" => "慢性",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "慢性",
      "text" => "呼吸",
      "actions" => [
          [
            "type" => "message",
            "label" => "起座呼吸(+)",
            "text" => "II7"
          ],
          [
            "type" => "message",
            "label" => "起座呼吸(-)",
            "text" => "II8"
          ]
      ]
    ]
  ];
}
//T1
 else if ($text == 'T1') {
  $response_format_text = [
    "type" => "template",
    "altText" => "3rd",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/iki.jpg",
      "title" => "症状",
      "text" => "症状",
      "actions" => [
          [
            "type" => "message",
            "label" => "長期臥床後",
            "text" => "II1"
          ],
          [
            "type" => "message",
            "label" => "呼吸音左右差(+)",
            "text" => "II2"
          ]
      ]
    ]
  ];
}
else if ($text == 'II1') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【肺塞栓症】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II2') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【気胸】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II3') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【過換気症候群】【気道内異物】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II4') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【COPD】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II5') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【気管支喘息】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II6') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【急性冠症候群】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II7') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【うっ血性心不全】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
else if ($text == 'II8') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impressionは【重症筋無力症】【貧血】です。
詳細は【レビューブック内科・外科2016-2017】を参照ください。
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}
//呼吸困難

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