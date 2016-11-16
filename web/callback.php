<?php
$accessToken = getenv('LINE_CHANNEL_ACCESS_TOKEN');
//ƒ†[ƒU[‚©‚ç‚ÌƒƒbƒZ[ƒWŽæ“¾
$json_string = file_get_contents('php://input');
$jsonObj = json_decode($json_string);
$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
//ƒƒbƒZ[ƒWŽæ“¾
$text = $jsonObj->{"events"}[0]->{"message"}->{"text"};
//ReplyTokenŽæ“¾
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};
//ƒƒbƒZ[ƒWˆÈŠO‚Ì‚Æ‚«‚Í‰½‚à•Ô‚³‚¸I—¹
if($type != "text"){
	exit;
}

if ($text == '‚Í‚¢') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "Çó‚ð‹³‚¦‚Ä‰º‚³‚¢i“ª‚ª’É‚¢‚È‚Çj"
			];

//ƒŒƒXƒ|ƒ“ƒXƒf[ƒ^ì¬
} else if ($text == '“ª’É' or $text == '“ª‚ª‚¢‚½‚¢' or $text == '“ª‚ª’É‚¢')@ {
  $response_format_text = [
    "type" => "template",
    "altText" => "“ª’É",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "“ª’É",
      "text" => "‚Ç‚ñ‚ÈŠ´‚¶‚Å‚·‚©?",
      "actions" => [
          [
            "type" => "message",
            "label" => "“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É",
            "text" => "“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É"
          ],
          [
            "type" => "message",
            "label" => "”­”M‚ð”º‚¤“ª’É",
            "text" => "”­”M‚ð”º‚¤“ª’É"
          ],
          [
            "type" => "message",
            "label" => "•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É",
            "text" => "•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É"
          ],
          [
            "type" => "message",
            "label" => "‘¤“ª•”‚Ìˆ³k",
            "text" => "‘¤“ª•”‚Ìˆ³k"
          ]
      ]
    ]
  ];
} else if ($text == '‚¢‚¢‚¦') {
  exit;
//“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É
} else if ($text == '“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É') {
  $response_format_text = [
    "type" => "template",
    "altText" => "“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É",
      "text" => "Š³ŽÒ‘œ‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "40`60‘ã/‚ŒŒˆ³",
            "text" => "4060‚ŒŒˆ³"
          ],
          [
            "type" => "message",
            "label" => "Š³ŽÒ‘œ–³‚µ",
            "text" => "Š³ŽÒ‘œ–³‚µ"
          ],
          [
            "type" => "message",
            "label" => "’†”NˆÈ~‚Ì—«",
            "text" => "’†”NˆÈ~‚Ì—«"
          ],
          [
            "type" => "message",
            "label" => "50ÎˆÈã‚Ì—«",
            "text" => "50ÎˆÈã‚Ì—«"
          ]
      ]
    ]
  ];
//“Ë‘R‚ÌŒƒ‚µ‚¢“ª’É

//”­”M‚ð”º‚¤“ª’É
} else if ($text == '”­”M‚ð”º‚¤“ª’É') {
  $response_format_text = [
    "type" => "template",
    "altText" => "”­”M‚ð”º‚¤“ª’É",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "”­”M‚ð”º‚¤“ª’É",
      "text" => "Š³ŽÒ‘œ‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "40`60‘ã/‚ŒŒˆ³",
            "text" => "4060‚ŒŒˆ³"
          ],
          [
            "type" => "message",
            "label" => "Š³ŽÒ‘œ–³‚µ",
            "text" => "Š³ŽÒ‘œ–³‚µ"
          ],
          [
            "type" => "message",
            "label" => "’†”NˆÈ~‚Ì—«",
            "text" => "’†”NˆÈ~‚Ì—«"
          ],
          [
            "type" => "message",
            "label" => "50ÎˆÈã‚Ì—«",
            "text" => "50ÎˆÈã‚Ì—«"
          ]
      ]
    ]
  ];
//”­”M‚ð”º‚¤“ª’É

//•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É
} else if ($text == '•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É') {
  $response_format_text = [
    "type" => "template",
    "altText" => "•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É",
      "text" => "Š³ŽÒ‘œ‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "40`60‘ã/‚ŒŒˆ³",
            "text" => "4060‚ŒŒˆ³"
          ],
          [
            "type" => "message",
            "label" => "Š³ŽÒ‘œ–³‚µ",
            "text" => "Š³ŽÒ‘œ–³‚µ"
          ],
          [
            "type" => "message",
            "label" => "’†”NˆÈ~‚Ì—«",
            "text" => "’†”NˆÈ~‚Ì—«"
          ],
          [
            "type" => "message",
            "label" => "50ÎˆÈã‚Ì—«",
            "text" => "50ÎˆÈã‚Ì—«"
          ]
      ]
    ]
  ];
//•Ð‘¤«‚ÌŒƒ‚µ‚¢“ª’É

//‘¤“ª•”‚Ìˆ³k
} else if ($text == '‘¤“ª•”‚Ìˆ³k') {
  $response_format_text = [
    "type" => "template",
    "altText" => "‘¤“ª•”‚Ìˆ³k",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "‘¤“ª•”‚Ìˆ³k",
      "text" => "Š³ŽÒ‘œ‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "40`60‘ã/‚ŒŒˆ³",
            "text" => "4060‚ŒŒˆ³"
          ],
          [
            "type" => "message",
            "label" => "Š³ŽÒ‘œ–³‚µ",
            "text" => "Š³ŽÒ‘œ–³"
          ],
          [
            "type" => "message",
            "label" => "’†”NˆÈ~‚Ì—«",
            "text" => "’†”NˆÈ~—«"
          ],
          [
            "type" => "message",
            "label" => "50ÎˆÈã‚Ì—«",
            "text" => "50ÎˆÈã—«"
          ]
      ]
    ]
  ];
//‘¤“ª•”‚Ìˆ³k

//4060‚ŒŒˆ³
} else if ($text == '4060‚ŒŒˆ³') {
  $response_format_text = [
    "type" => "template",
    "altText" => "4060‚ŒŒˆ³",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "4060‚ŒŒˆ³",
      "text" => "•t‚·‚éÇó‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "ˆ«SEšq“f^ˆÓŽ¯áŠQ^‘ƒÇó(-)",
            "text" => "A1"
          ],
          [
            "type" => "message",
            "label" => "ˆÓŽ¯áŠQ^ˆ«SEšq“f",
            "text" => "A2"
          ],
          [
            "type" => "message",
            "label" => "Ž‹–ìEŽ‹—ÍáŠQ^–Ñ—l[ŒŒ^‘ÎŒõ”½ŽËÁŽ¸",
            "text" => "A3"
          ],
          [
            "type" => "message",
            "label" => "‘¤“ª•”‚Ì“{’£^‘ÌŠ²‹Ø“÷’É^‘ÌdŒ¸­",
            "text" => "A4"
          ]
      ]
    ]
  ];
//4060‚ŒŒˆ³

//Š³ŽÒ‘œ–³
} else if ($text == 'Š³ŽÒ‘œ–³') {
  $response_format_text = [
    "type" => "template",
    "altText" => "Š³ŽÒ‘œ–³",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "Š³ŽÒ‘œ–³",
      "text" => "•t‚·‚éÇó‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "ˆ«SEšq“f^ˆÓŽ¯áŠQ^‘ƒÇó(-)",
            "text" => "A1"
          ],
          [
            "type" => "message",
            "label" => "ˆÓŽ¯áŠQ^ˆ«SEšq“f",
            "text" => "A2"
          ],
          [
            "type" => "message",
            "label" => "Ž‹–ìEŽ‹—ÍáŠQ^–Ñ—l[ŒŒ^‘ÎŒõ”½ŽËÁŽ¸",
            "text" => "A3"
          ],
          [
            "type" => "message",
            "label" => "‘¤“ª•”‚Ì“{’£^‘ÌŠ²‹Ø“÷’É^‘ÌdŒ¸­",
            "text" => "A4"
          ]
      ]
    ]
  ];
//Š³ŽÒ‘œ–³

//’†”NˆÈ~—«
} else if ($text == '’†”NˆÈ~—«') {
  $response_format_text = [
    "type" => "template",
    "altText" => "’†”NˆÈ~—«",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "’†”NˆÈ~—«",
      "text" => "•t‚·‚éÇó‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "ˆ«SEšq“f^ˆÓŽ¯áŠQ^‘ƒÇó(-)",
            "text" => "A1"
          ],
          [
            "type" => "message",
            "label" => "ˆÓŽ¯áŠQ^ˆ«SEšq“f",
            "text" => "A2"
          ],
          [
            "type" => "message",
            "label" => "Ž‹–ìEŽ‹—ÍáŠQ^–Ñ—l[ŒŒ^‘ÎŒõ”½ŽËÁŽ¸",
            "text" => "A3"
          ],
          [
            "type" => "message",
            "label" => "‘¤“ª•”‚Ì“{’£^‘ÌŠ²‹Ø“÷’É^‘ÌdŒ¸­",
            "text" => "A4"
          ]
      ]
    ]
  ];
//’†”NˆÈ~—«

//50ÎˆÈã—«
} else if ($text == '50ÎˆÈã—«') {
  $response_format_text = [
    "type" => "template",
    "altText" => "50ÎˆÈã—«",
    "template" => [
      "type" => "buttons",
      "thumbnailImageUrl" => "https://" . $_SERVER['SERVER_NAME'] . "/head.jpg",
      "title" => "50ÎˆÈã—«",
      "text" => "•t‚·‚éÇó‚Í?",
      "actions" => [
          [
            "type" => "message",
            "label" => "ˆ«SEšq“f^ˆÓŽ¯áŠQ^‘ƒÇó(-)",
            "text" => "A1"
          ],
          [
            "type" => "message",
            "label" => "ˆÓŽ¯áŠQ^ˆ«SEšq“f",
            "text" => "A2"
          ],
          [
            "type" => "message",
            "label" => "Ž‹–ìEŽ‹—ÍáŠQ^–Ñ—l[ŒŒ^‘ÎŒõ”½ŽËÁŽ¸",
            "text" => "A3"
          ],
          [
            "type" => "message",
            "label" => "‘¤“ª•”‚Ì“{’£^‘ÌŠ²‹Ø“÷’É^‘ÌdŒ¸­",
            "text" => "A4"
          ]
      ]
    ]
  ];
//50ÎˆÈã—«

//ƒCƒ“ƒvƒŒƒbƒVƒ‡ƒ“
} else if ($text == 'A1') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impression‚Íy‚­‚à–Œ‰ºoŒŒz‚Å‚·BÚ×‚ÍuƒŒƒrƒ…[ƒuƒbƒN“à‰ÈEŠO‰È2016-2017v‚ÌJ-15‚ðŽQÆ‚­‚¾‚³‚¢B
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
} else if ($text == 'A2') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impression‚Íy”]‰Šz‚Å‚·BÚ×‚ÍuƒŒƒrƒ…[ƒuƒbƒN“à‰ÈEŠO‰È2016-2017v‚ÌJ-35‚ðŽQÆ‚­‚¾‚³‚¢B
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
} else if ($text == 'A3') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impression‚Íy‹}«—Î“àá”­ìz‚Å‚·BÚ×‚ÍuƒŒƒrƒ…[ƒuƒbƒN“à‰ÈEŠO‰È2016-2017v‚ðŽQÆ‚­‚¾‚³‚¢B
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
} else if ($text == 'A4') {
	  $response_format_text = [
		    	"type" => "text",
			"text" => "1st Impression‚Íy‘¤“ª“®–¬‰Šz‚Å‚·BÚ×‚ÍuƒŒƒrƒ…[ƒuƒbƒN“à‰ÈEŠO‰È2016-2017v‚ÌJ-32‚ðŽQÆ‚­‚¾‚³‚¢B
https://www.medilink-study.com/products/detail.php?product_id=12"
			];
}  else if ($text == 'Ž¿–â' or $text == 'ƒCƒ“ƒvƒŒƒbƒVƒ‡ƒ“' or $text == 'ƒCƒ“ƒvƒŒƒbƒVƒ‡ƒ“‚ª’m‚è‚½‚¢') {
  $response_format_text = [
    "type" => "template",
    "altText" => "ƒCƒ“ƒvƒŒƒbƒVƒ‡ƒ“‚ª’m‚è‚½‚¢Hi‚Í‚¢^‚¢‚¢‚¦j",
    "template" => [
        "type" => "confirm",
        "text" => "ƒCƒ“ƒvƒŒƒbƒVƒ‡ƒ“‚ª’m‚è‚½‚¢H",
        "actions" => [
            [
              "type" => "message",
              "label" => "‚Í‚¢",
              "text" => "‚Í‚¢"
            ],
            [
              "type" => "message",
              "label" => "‚¢‚¢‚¦",
              "text" => "‚¢‚¢‚¦"
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