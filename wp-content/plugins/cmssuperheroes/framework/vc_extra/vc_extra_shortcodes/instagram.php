<?php
// Cover Boxes
vc_map ( array(
		"name" => "Instagram",
		"base" => "cshero-instagram",
		"icon" => "cs_icon_for_vc",
		"category" => __ ( 'CS Hero', CSCORE_NAME ),
		"description" => __ ( "", CSCORE_NAME ),
		"params" => array(
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Title", CSCORE_NAME ),
				"param_name" => "title",
				"value" => "",
				"description" => __ ( "Title.", CSCORE_NAME )
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Username", CSCORE_NAME ),
				"param_name" => "username",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Client ID", CSCORE_NAME ),
				"param_name" => "client_id",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Columns", CSCORE_NAME ),
				"param_name" => "columns",
				"value" => array(1,2,3,4,6),
				"std" =>""
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Limit Items", CSCORE_NAME ),
				"param_name" => "numbers",
				"value" => ""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Size", CSCORE_NAME ),
				"param_name" => "size",
				"value" => array("thumbnail","large"),
				"std" =>""
			),
			array(
				"type" => "dropdown",
				"class" => "",
				"heading" => __ ( "Target", CSCORE_NAME ),
				"param_name" => "target",
				"value" => array("_self","_blank"),
				"std" =>""
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Link Text", CSCORE_NAME ),
				"param_name" => "link",
				"value" => ""
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => __ ( "Class", CSCORE_NAME ),
				"param_name" => "el_class",
				"value" => ""
			)
		)
) );