<?php
$key = isset($_SERVER["PATH_INFO"]) ? substr($_SERVER["PATH_INFO"], 1) : '';

if ($key == "items") {
	if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		$json = file_get_contents("items");
		$json = json_decode($json, true);

		$jsonre = "";

		foreach ($json as $items) {
			foreach ($items as $item) {
				if ($item['type'] == "item") {
					if ($_GET["id"]) {
						if((string)$item['id'] == $_GET["id"]){											
							$attributes = ["name" => $item['attributes']['name']];
							$jsonre[] = ["type" => $item['type'], "id" => $item['id'], "attributes" => $attributes];
						}
					} else {
						$attributes = ["name" => $item['attributes']['name']];
						$jsonre[] = ["type" => $item['type'], "id" => $item['id'], "attributes" => $attributes];
					}
				}
			}
		}

	    $jsonre2 = "";
		$jsonre2["data"] = $jsonre;
		$jsonre2 = json_encode($jsonre2);

		print $jsonre2;

	} else {

		$json = file_get_contents("items");
		$json = json_decode($json, true);

		 $jsonre = "";
		 $id = 0;

		foreach ($json as $items) {
			foreach ($items as $item) {
				if ($item['type'] == "item") {
					$name = ["name" => $item['attributes']['name']];
					$jsonre[] = ["type" => $item['type'], "id" => $item['id'], "attributes" => $name];
					$id++;
				}
			}
		}

		$request_body = json_decode(file_get_contents('php://input'));
		$id++;

		$name = ["name" => $request_body->data->attributes->name];

		$created = ["type" => "item", "id" => $id, "attributes" => $name];	
		$jsonre[] = $created;

	    $jsonre2 = "";
		$jsonre2["data"] = $jsonre;

		file_put_contents("items", json_encode($jsonre2));

		header('HTTP/1.1 201 Created');
		header('Location: http://192.168.33.13:4200/items/' . $id);
		header('Content-type: application/vnd.api+json');

		print(json_encode(['data' => $created]));
	}
}
